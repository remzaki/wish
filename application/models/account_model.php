<?php
class Account_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->model('log_model');
	}
	
	public function change_password()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date=date("m-d-Y D g:i A");
		$id = $this->session->userdata('ID');
		$password = $this->secure->password($this->input->post('opassword'));
		
		$this->db->select('Username');
		$this->db->from('users');
		$this->db->where('ID', $id);
		$this->db->where('Password', $password);
		$qry = $this->db->get();
		
		if($qry->num_rows() > 0)
		{
			$password = $this->secure->password($this->input->post('npassword'));
			
			$qry = "UPDATE users SET Password = ? WHERE ID = ?";
			$result = $this->db->query($qry, array($password, $id));
			
			if($result){
				// $this->log_model->log('');	//LOGGING
				return TRUE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	
	public function reset_password()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date=date("m-d-Y D g:i A");
		$qlid = $this->input->post('qlid');
		$password = $this->secure->password($this->input->post('password'));
		$npassword = $this->secure->password("12345");
		$apassword = $this->secure->password("123@abc");
		
		if($password == $apassword){
			$qry = "UPDATE users SET Password = ? WHERE QuicklookID = ?";
			$result = $this->db->query($qry, array($npassword, $qlid));
			
			if($result){
				// $this->log_model->log('');	//LOGGING
				return TRUE;
			}
		}
		else{
			return FALSE;
		}
		
	}
	
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */