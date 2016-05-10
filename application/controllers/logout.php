<?php
class Logout extends CI_Controller {
	
	function index()
	{
		session_start();
		unset($_SESSION['LOGIN_FLAG']);		// USED IN VERIFYING IF USER IS LOGGED IN OR NOT
		unset($_SESSION['RETRY_COUNTER']);	// USED IN RETRY ACCESS FOR PASSCODE
		$this->session->sess_destroy();		// USER DATA
		redirect('wish/login', 'refresh');	// SEND BACK TO HOME, HOME WILL REDIRECT PAGE TO LOGIN
	}
	
}