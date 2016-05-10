<?php
session_start();
if(isset($_SESSION['LOGIN_FLAG'])){
	header("location: ./home");
	exit();
}

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}
	
	function index()
	{
		$this->load->view('header');	//PAGE HEADER
		
		$this->form_validation->set_message('required', '%s is required');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view("login");
		}
		else
		{
			$result = $this->login_model->login_user();
			if($result === FALSE)
			{
				$data['msg']="Login failed, make sure your Username and Password is correct";
				$this->load->view("login", $data);
			}
			else
			{
				//	CHECK THE AVATAR PAIR, THEN ASSIGN ONE!
				$_SESSION['LOGIN_FLAG'] = "TRUE";
				$this->session->set_userdata($result);
				redirect('wish/home');
			}
		}
		
		$this->load->view('footer');	//PAGE FOOTER
		
		$str = stripos($this->session->userdata('user_agent'), "MSIE");
		// if($str > 0){
			// echo "<p>Internet Explorer? Who ever you are thats using IE, I will find you and I will kill you!</p>";
			// echo "<p>Google Chrome and Mozilla Firefox asked me to.</p>";
			// exit();
		// }else{
			// echo "ur not using IE";
		// }
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */