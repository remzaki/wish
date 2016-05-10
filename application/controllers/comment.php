<?php
class Comment extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('smiley');
		$this->load->model('wishlist_model');
	}
	
	function index()
	{
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$data['firstname'] = $this->session->userdata('Firstname');
		$data['lastname'] = $this->session->userdata('Lastname');
		$codename = $this->uri->segment(2);
		
		if(!$codename){
			redirect('wish/wishlist');
			exit();
		}
		
		$this->load->view('header', $data);
		
		$qry = $this->wishlist_model->view($codename);		// GET CODENAME DETAILS
		foreach($qry as $row){								// MAKE IT AVAILABLE FOR VIEW
			$id = $row->ID;
			$data['avatar'] = $row->Avatar;
			$data['codename'] = $row->Codename;
			$data['wishitem'] = $row->WishItem;
			$data['wishdesc'] = $row->WishDesc;
			$data['link'] = $row->Link;
			$data['upload'] = $row->Upload;
		}
		
		$data['comments'] = $this->wishlist_model->comment($codename);		// GET COMMENTS
		
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('wishlist/comments', $data);
		}
		else
		{
			$result = $this->wishlist_model->add_comment($id, $codename);
			if($result === TRUE)
			{
				redirect("wish/comment/$codename");
			}
		}

		
		$this->load->view('footer');
		
	}
	
}


/* End of file comment.php */
/* Location: ./application/controllers/comment.php */