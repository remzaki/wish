<?php
class Avatar extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('avatar_model');
		$this->load->model('pair_model');
		$this->load->helper('file');
	}
	
	function index()
	{
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$this->session->keep_flashdata('AvatarStatusFlag'); // FLAG USED TO LET USER STAY IN AVATAR PAGE IF SET
		
		$data['firstname'] = $this->session->userdata('Firstname');
		$data['lastname'] = $this->session->userdata('Lastname');
		
		$this->load->view('header', $data);
		
		$checkpc = $this->avatar_model->check_passcode();
		if($checkpc === FALSE)	//NEED TO SET PASSCODE
		{
			$this->form_validation->set_rules('passcode', 'Passcode', 'trim|required|matches[cpasscode]|xss_clean');
			$this->form_validation->set_rules('cpasscode', 'Confirm Passcode', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('avatar/setPC');	//PASSCODE SETUP PAGE
			}
			else
			{
				$this->avatar_model->create_passcode();
				redirect('wish/avatar');
			}
		}
		else					//PASSCODE EXISTED
		{
			if($this->session->flashdata('AvatarStatusFlag'))	//AVATAR ACCESS GRANTED
			{
				$checkcn = $this->avatar_model->check_codename();
				if($checkcn === FALSE)
				{
					$this->form_validation->set_rules('codename', 'Codename', 'trim|required|is_unique[avatar.Codename]|alpha_dash|xss_clean');
					
					if ($this->form_validation->run() === FALSE)
					{
						$this->load->view('avatar/setCN');	// CODENAME SETUP PAGE
					}
					else
					{
						$this->avatar_model->create_codename();
						$this->session->keep_flashdata('AvatarStatusFlag'); // USED IN VERIFYING IF USER ACCESSESS AVATAR PAGE
						redirect('wish/avatar');
					}
				}
				else
				{
					// GET AVATAR DETAILS
					$data = $this->avatar_model->get_avatar();
					// THIS WILL BE AVAILABLE THROUGHTOUT THE AVATAR PAGE
					
					$get = $this->input->get('g');
					switch($get)
					{
						case 'A':	//	CASE GET AVATAR PAGE
						
							$this->form_validation->set_message('required', 'No %s selected');
							$this->form_validation->set_message('exact_length', 'Invalid %s selected');
							
							$this->form_validation->set_rules('avatar', 'Avatar', 'trim|required|exact_length[7]|xss_clean');
					
							if ($this->form_validation->run() === FALSE)
							{
								$this->load->view("avatar/get$get", $data);
							}
							else
							{
								$this->avatar_model->update_avatar();					
								redirect("wish/avatar");	
							}
							
							break;
							
// --------------------------------------------------------------------------------------------------------
						
						case 'W':	//	CASE GET WISHLIST
							
							if(($data['WishItem']=="") OR ($data['WishItem']==NULL))
							{
								$this->load->view("avatar/getU", $data);
							}
							else
							{
								$this->load->view("avatar/getW", $data);
							}
							
							break;
							
// --------------------------------------------------------------------------------------------------------
						
						case 'U':	//	CASE GET WISHLIST UPDATE
							
							$this->load->view("avatar/get$get", $data);
							
							break;
							
// --------------------------------------------------------------------------------------------------------
						
						case 'M':	//	CASE GET MANITO/MANITA
							
							$this->pair_model->pair_user();		// CHECK FOR PAIRING
							$this->load->view("avatar/get$get");
							
							break;
							
// --------------------------------------------------------------------------------------------------------
							
						case 'P':	//	CASE GET PASSCODE CHANGE FORM
							
							$this->form_validation->set_rules('npasscode', 'New Passcode', 'trim|required|matches[ncpasscode]|xss_clean');
							$this->form_validation->set_rules('ncpasscode', 'Confirm Passcode', 'trim|required|xss_clean');
							
							if ($this->form_validation->run() === FALSE)
							{
								$this->load->view("avatar/getP");	//PASSCODE CHANGE PAGE
							}
							else
							{
								$this->avatar_model->change_passcode();
								redirect('wish/avatar');
							}
							
							break;
							
// --------------------------------------------------------------------------------------------------------
							
						default:	// DEFAULT AVATAR PAGE VIEWED
						
							$this->load->view('avatar');
							
					}	// END SWITCH STATEMENT
				}
			}
			else												//AVATAR ACCESS DENIED
			{
				$this->form_validation->set_rules('passcode', 'Passcode', 'trim|required|xss_clean');
				
				if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('avatar/inpPC');	// PASSCODE INPUT PAGE
				}
				else
				{
					$result = $this->avatar_model->verify_passcode();
					if($result === FALSE)	// INCORRECT PASSCODE
					{
						if(!isset($_SESSION['RETRY_COUNTER']))
						{
								$_SESSION['RETRY_COUNTER']=1;
						}
						else
						{
								$_SESSION['RETRY_COUNTER']++;
						}
						if($_SESSION['RETRY_COUNTER']==3)
						{
							redirect('wish/logout');
						}
						else
						{
							$data['msg'] = "Incorrect Avatar Passcode";
							$this->load->view('avatar/inpPC', $data);
						}
					}
					else	//CORRECT PASSCODE
					{
						unset($_SESSION['RETRY_COUNTER']);
						$this->session->set_flashdata('AvatarStatusFlag', '1');
						redirect('wish/avatar');
					}
				}
			}
		}
		
		$this->load->view('footer');
	}
	
	function do_upload(){
	
		$this->session->keep_flashdata('AvatarStatusFlag'); // FLAG USED TO LET USER STAY IN AVATAR PAGE IF SET
		
		$this->form_validation->set_message('required', '%s is required');
		$this->form_validation->set_rules('item', 'Item', 'trim|required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('link', 'Link', 'trim|prep_url|max_length[255]|xss_clean');
		$this->form_validation->set_rules('desc', 'Description', 'trim|max_length[255]|xss_clean');
		
		if ($this->form_validation->run() === FALSE)
		{
			$_SESSION["ITEM_REQ"]="<span id='message'>Item is required</span>";
			redirect('wish/avatar?g=U');
		}
		else
		{
			if(($this->input->post('link')!='') AND (!filter_var($this->input->post('link'), FILTER_VALIDATE_URL)) )	//	CHECK IF URL/LINK IS VALID
			{
				$_SESSION["INVALID_LINK"]="<span id='message'>The provided link is invalid</span>";
				$_SESSION["PREV_ITEM_VAL"]=$this->input->post('item');
				redirect('wish/avatar?g=U');
				exit();
			}

			$this->avatar_model->update_wish();	// UPDATE avatar DB for DETAILS
			
			$dirname = uniqid();				//	UNIQUE FOLDER NAME
			mkdir("./uploads/$dirname", 0444);	//	CREATE UNIQUE FOLDER
			
			$config['upload_path'] = "./uploads/$dirname/";
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['max_size']	= '2000';	// 2 Mb
			$config['max_width']  = '800';	// 800 Px
			$config['max_height']  = '600';	// 600 Px
			$config['encrypt_name']  = 'TRUE';
			$config['file_name']  = 'uploadedfile';

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				rmdir("./uploads/$dirname");	// REMOVE UNIQUE FOLDER NAME IF UPLOAD CANCELED/FAILED
				redirect('wish/avatar');
			}
			else
			{
				$upinfo = $this->upload->data();
				$info = "Source: ".$this->session->userdata('ip_address').
				"\nFileName = ".$upinfo['file_name'].
				"\nFileType = ".$upinfo['file_type'].
				"\nFilePath = ".$upinfo['file_path'].
				"\nRelativePath = ./uploads/$dirname/".
				"\nFullPath = ".$upinfo['full_path'].
				"\nRawName = ".$upinfo['raw_name'].
				"\nOriginName = ".$upinfo['orig_name'].
				"\nClientName = ".$upinfo['client_name'].
				"\nFileExtension = ".$upinfo['file_ext'].
				"\nFileSize = ".$upinfo['file_size'].
				"\nIsImage = ".$upinfo['is_image'].
				"\nImageWidth = ".$upinfo['image_width'].
				"\nImageHeight = ".$upinfo['image_height'].
				"\nImageType = ".$upinfo['image_type'].
				"\nDimension = ".$upinfo['image_size_str'];
				if ( ! write_file("./uploads/$dirname/file.info", $info))
				{
					 echo 'Unable to write the file';
				}
				
				/*	THUMB RESIZE	*/
				$config['image_library'] = 'gd2';
				$config['source_image'] = "./uploads/$dirname/".$upinfo['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				// $config['width'] = 75;
				$config['width'] = 700;
				// $config['height'] = 50;
				$config['height'] = 325;

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				/*	THUMB RESIZE	*/
				
				$this->avatar_model->update_wish("./uploads/$dirname/".$upinfo['file_name']);
				
				redirect('wish/avatar');
			}
		}
	}
	
	
	
}


/* End of file avatar.php */
/* Location: ./application/controllers/avatar.php */