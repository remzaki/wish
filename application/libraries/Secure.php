<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secure {
	
	
    function password($str) {	// FOR LOGIN/REGISTER
		$salt = 'qf3a2';
		$hash = sha1($salt.$str);
		$cut = substr($hash, 4, -4);
		$result = md5(strrev($cut));
		
		return($result);
    }
	
    function passcode($str) {	// FOR PASSCODE
		$salt = '39r0v';
		$hash = sha1($str.$salt);
		$cut = substr($hash, 4, -4);
		$result = md5(strrev($cut));
		
		return($result);
    }
	
	function pcuid($str) {	//FOR PASSCODE MAPPING
		$salt = '4cb53';
		$hash = md5($salt.$str); // md5(4cb53rc185173)
		$cut = substr($hash, 8, -8);
		$result = strrev($cut);
		
		return($result);
    }
	
	function cnuid($str) {	//FOR CODENAME MAPPING
		$salt = 'ece76';
		$hash = md5($str.$salt);
		$cut = substr($hash, 8, -8);
		$result = strrev($cut);
		
		return($result);
    }

	function activity(){	// CHECK IF USER IS ACTIVE
		$CI =& get_instance();
		
		$CI->load->helper('url');
		$CI->load->library('session');
		
		session_start();
		
		if(!isset($_SESSION['LOGIN_FLAG'])){
			header("location: ./logout");
			exit();
		}
		
		if(!($CI->session->userdata('ID'))){
			redirect('wish/logout');
		}
	}
	
}

/* End of file Secure.php */