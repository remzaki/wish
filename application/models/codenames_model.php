<?php
class Codenames_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_codenames1()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		$teamcode = $this->session->userdata('TeamCode');
		$teamid= $this->secure->cnuid($teamcode);
		
		$qry = "SELECT avatar.Codename FROM pairs JOIN avatar ON pairs.UID = avatar.UserID WHERE pairs.TeamID=? AND Validity='1' ORDER BY pairs.ID ASC";
		$result = $this->db->query($qry, array($teamid));
		
		if ($result->num_rows() > 0)
		{
			return $result->result();
		}
		
	}
	/*end of get_codenames1*/
	
	public function get_codenames2()
	{
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		$teamcode = $this->session->userdata('TeamCode');
		$teamid= $this->secure->cnuid($teamcode);

		$qry = "SELECT avatar.Codename FROM pairs JOIN avatar ON pairs.PUID = avatar.UserID WHERE pairs.TeamID=? AND Validity='1' ORDER BY pairs.ID ASC";
		$result = $this->db->query($qry, array($teamid));
		
		if ($result->num_rows() > 0)
		{
			return $result->result();
		}
		
	}
	/*end of get_codenames2*/
	
	public function count_users()
	{
		$teamcode = $this->session->userdata('TeamCode');
		$teamid= $this->secure->cnuid($teamcode);
		
		$qry = "SELECT COUNT(*) AS TotalUsers FROM teammates WHERE TeamCode= ? ";
		$get_all = $this->db->query($qry, array($teamcode));
		
		$qry = "SELECT COUNT(*) AS TotalReady FROM avatar WHERE TeamID=? AND Validity=1";
		$get_ready = $this->db->query($qry, array($teamid));
		
		if ( ($get_all->num_rows() > 0) AND ($get_ready->num_rows() > 0) )
		{
			return array($get_all->result() , $get_ready->result());
			// returning (ALL_USERS) and (ALL_USERS_WITH_AVATAR)
		}
		
	}
	/*end of count_users*/
	
}

/* End of file codenames_model.php */
/* Location: ./application/models/codenames_model.php */