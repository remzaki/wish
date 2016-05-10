<?php
session_start();
if(isset($_SESSION['LOGIN_FLAG'])){
	header("location: ./home");
	exit();
}

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
	}
	
	public function index()
	{
		$this->load->view('header');
		
		$this->form_validation->set_message('is_unique', '%s is already in use');
		$this->form_validation->set_message('required', '%s is required');
		$this->form_validation->set_message('exact_length', 'Invalid %s');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.Username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|xss_clean');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('qlid', 'QuicklookID', 'trim|required|exact_length[8]|xss_clean');
		$this->form_validation->set_rules('qlid', 'QuicklookID', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view("register");
		}
		else
		{
			$result = $this->register_model->register_user();
			if($result === FALSE){
				$data["msg"] = "QuicklookID is either already used or unknown";
				$this->load->view("register", $data);
			}
			else{
				$data["msg"] = "Registration successful, enter Password to continue";
				$this->load->view('login', $data);
			}
		}
		
		$this->load->view('footer');
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */