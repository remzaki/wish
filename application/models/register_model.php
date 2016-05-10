<?php
class Register_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->model('log_model');
	}
	
	public function register_user()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date=date("m-d-Y D g:i A");
		$qlid = $this->input->post('qlid');
		$userid = $this->secure->cnuid($qlid);
		$username = $this->input->post('username'); 
		$password = $this->secure->password($this->input->post('password'));
		
		$qry = "SELECT teammates.QuicklookID FROM teammates INNER JOIN team ON teammates.TeamCode = team.TeamCode WHERE teammates.QuicklookID = ? AND teammates.Flag1 = ?";
		$result = $this->db->query($qry, array($qlid, 0));	// CHECK IF QLID IS ALLOWED TO REGISTER
		if($result->num_rows() > 0)	// ALLOWED TO REGISTER
		{
			
			$details = array(
			'Username' => ($username),
			'Password' => ($password),
			'Firstname' => $this->input->post('firstname'),
			'Lastname' => $this->input->post('lastname'),
			'QuicklookID' => ($qlid),
			'Date' => ($date)
			);
			
			if($this->db->insert('users', $details)){
				$this->db->query("UPDATE teammates SET Flag1 = ? WHERE QuicklookID = ?", array(1, $qlid));
				$this->log_model->log('register');	//LOGGING
				return TRUE;
			}
			
		}
		else						//NOT ALLOWED TO REGISTER
		{
			return FALSE;
		}
		
	}
	
}

/* End of file register_model.php */
/* Location: ./application/models/register_model.php */