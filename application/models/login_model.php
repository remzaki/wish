<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->model('log_model');
	}
	
	public function login_user()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date=date("m-d-Y D g:i A");
		$username = $this->input->post('username');
		$password = $this->secure->password($this->input->post('password'));
		
		$this->db->select('users.ID, users.Username, users.Firstname, users.Lastname, users.QuicklookID, teammates.TeamCode', 'team.TeamDesc');
		$this->db->from('users');
		$this->db->join('teammates', 'teammates.QuicklookID = users.QuicklookID');
		$this->db->join('team', 'teammates.TeamCode = team.TeamCode');
		$this->db->where('Username', $username);
		$this->db->where('Password', $password);
		$qry = $this->db->get();
		
		if($qry->num_rows() > 0)
		{
			$this->log_model->log('login');	//LOGGING
			return $qry->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */