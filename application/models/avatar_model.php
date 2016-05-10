<?php
class Avatar_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->model('log_model');
	}
	
	public function check_passcode()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->pcuid($qlid);
		
		$this->db->select('ID');
		$this->db->where("UserID", $userid);
		$this->db->where("Validity", "1"); // 1 is valid, 0 is not
		$qry = $this->db->get('passcode');
		
		if($qry->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	/*end of check_passcode*/
	
	public function check_codename()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		
		$this->db->select('ID');
		$this->db->where("UserID", $userid);
		$this->db->where("Validity", "1"); // 1 is valid, 0 is not
		$qry = $this->db->get('avatar');
		
		if($qry->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	/*end of check_codename*/
	
	public function create_codename()
	{
		$teamcode = $this->session->userdata('TeamCode');
		$qlid = $this->session->userdata('QuicklookID');
		$teamid= $this->secure->cnuid($teamcode);
		$userid = $this->secure->cnuid($qlid);
		$codename = $this->input->post('codename');
		
		$data = array(
			'UserID' => ($userid),
			'Codename' => ($codename),
			'Avatar' => 'default',
			'Validity' => '1'
		);
		
		if($this->db->insert('avatar', $data)){
			$this->db->query("UPDATE avatar SET TeamID = ? WHERE UserID = ?", array($teamid, $userid));
			$this->log_model->log('codename');	//LOGGING
			return TRUE;
		}
	}
	/*end of create_codename*/
	
	public function create_passcode()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->pcuid($qlid);
		$passcode = $this->secure->passcode($this->input->post('passcode'));
		
		$data = array(
			'UserID' => ($userid),
			'Passcode' => ($passcode)
		);
		
		if($this->db->insert('passcode', $data)){
			$this->log_model->log('passcode');	//LOGGING	
			return TRUE;
		}
	}
	/*end of create_passcode*/
	
	public function change_passcode()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->pcuid($qlid);
		$passcode = $this->secure->passcode($this->input->post('npasscode'));
		
		$qry = "UPDATE passcode SET Passcode = ? WHERE UserID = ? AND Validity = ?";
		$result = $this->db->query($qry, array($passcode, $userid, 1));
		
		if($result){
			$this->log_model->log('cpasscode');	//LOGGING
		}
	}
	/*end of change_passcode*/
	
	public function verify_passcode()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->pcuid($qlid);
		$passcode = $this->secure->passcode($this->input->post('passcode'));
		
		$this->db->select('ID');
		$this->db->where("UserID", $userid);
		$this->db->where("Passcode", $passcode);
		$this->db->where("Validity", "1"); // 1 is valid, 0 is not
		$qry = $this->db->get('passcode');
		
		if($qry->num_rows() > 0)
		{
			$this->log_model->log('page');	//LOGGING
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	/*end of verify_passcode*/
	
	public function update_avatar()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		$avatar = $this->input->post('avatar');
		
		$qry = "UPDATE avatar SET Avatar = ? WHERE UserID = ? AND Validity = 1";
		$result = $this->db->query($qry, array($avatar, $userid));
		
		if($result){
			$this->log_model->log('avatar');	//LOGGING
			return TRUE;
		}
		
	}
	/*end of update_avatar*/
	
	public function update_wish($file)	// PARAMETER 1 IS POPULATED WHEN USER IS UPLOADING AN IMAGE, OTHERWISE JUST UPDATE THE AVATAR DETAILS
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		$item = $this->input->post('item');
		$link = $this->input->post('link');
		$desc = $this->input->post('desc');
		
		if($file!=''){
			$qry = "UPDATE avatar SET WishItem = ?, WishDesc = ?, Upload = ?, Link = ? WHERE UserID = ? AND Validity = 1";
			$result = $this->db->query($qry, array($item, $desc, $file, $link, $userid));
		}
		else
		{
			$qry = "UPDATE avatar SET WishItem = ?, WishDesc = ?, Link = ? WHERE UserID = ? AND Validity = 1";
			$result = $this->db->query($qry, array($item, $desc, $link, $userid));
		}
		
		if($result){
			$this->log_model->log('wish');	//LOGGING
			return TRUE;
		}
		
	}
	/*end of update_wish*/
	
	public function get_avatar()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		
		$qry = "SELECT WishItem, WishDesc, Avatar, Upload, Link FROM avatar WHERE UserID = ? AND Validity = ?";
		$result = $this->db->query($qry, array($userid, 1));
		
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
		
	}
	/*end of get_avatar*/
	
	
}

/* End of file avatarr_model.php */
/* Location: ./application/models/avatar_model.php */