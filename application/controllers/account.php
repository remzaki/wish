<?php
class Account extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('account_model');
	}
	
	function index()
	{	
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$data['username'] = $this->session->userdata('Username');
		$data['firstname'] = $this->session->userdata('Firstname');
		$data['lastname'] = $this->session->userdata('Lastname');
		$data['qlid'] = $this->session->userdata('QuicklookID');
		
		$this->load->view('header', $data);
		
		$this->form_validation->set_message('required', '%s is required');
		
		$this->form_validation->set_rules('opassword', 'Old Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('npassword', 'New Password', 'trim|required|matches[cpassword]|xss_clean');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view("account", $data);
		}
		else
		{
			$result = $this->account_model->change_password();
			if($result === FALSE)
			{
				$data['msg']="Old Password is incorrect";
				$this->load->view("account", $data);
			}
			else
			{
				redirect('wish/home#msg');
			}
		}
		
		$this->load->view('footer');	//PAGE FOOTER

	}
	
	function reset(){
		
		$this->form_validation->set_rules('qlid', 'Quicklook ID', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Admin Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('reset');
		}
		else
		{
			$result = $this->account_model->reset_password();
			if($result === FALSE)
			{
				$data['msg']="Password Reset Failed";
				$this->load->view('reset', $data);
			}
			else
			{
				$data['msg']="Password Reset successfull";
				$this->load->view('reset', $data);
			}
		}
		
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */