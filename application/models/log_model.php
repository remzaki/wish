<?php
class Log_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function log($act)
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date=date("m-d-Y D g:i A");
		$ip = $this->session->userdata('ip_address');
		$ua = $this->session->userdata('user_agent');
		$username1 = $this->input->post('username');
		$username2 = $this->session->userdata('Username');
		
		$data = array
		(
			"1"=>array("register", "Successfully register user"),
			"2"=>array("login", "Successfully login user"),
			"3"=>array("passcode", "Successfully create passcode"),
			"4"=>array("cpasscode", "Successfully changed passcode"),
			"5"=>array("page", "Accessed avatar page"),
			"6"=>array("codename", "Successfully create codename"),
			"7"=>array("avatar", "Updated Avatar"),
			"8"=>array("wish", "Updated Wishlist"),
			"9"=>array("pair_xup", "Failed to updated the teammates table"),
			"10"=>array("pair_err", "Failed to update the pairs table"),
			"11"=>array("pair_nf", "Pair Not Found")
		); 
		foreach($data as $var=>$val){
			if($act === $val[0]){
				$type=$var;
				$desc=$val[1];
			}
		}
		
		if(($type AND $desc) != ""){
			$data = array(
				'Type' => ($type),
				'Description' => ucfirst($act),
				'User' => ($username1.$username2),
				'Details' => ($desc),
				'IPAddress' => ($ip),
				'UserAgent' => ($ua),
				'Date' => ($date)
			);
			$this->db->insert('logs', $data);	//Insert logs
		}
		
	}
	
}

/* End of file log_model.php */
/* Location: ./application/models/log_model.php */