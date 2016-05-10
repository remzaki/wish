<?php
class Email extends CI_Controller {
	
	function index()
	{
		$this->load->library('email');
		
		$this->email->from('reimark.cogonon@gmail.com', 'Rey Mark');
		$this->email->to('rc185173@ncr.com');
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

		// echo $this->email->print_debugger();
	}
	
}