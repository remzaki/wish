<?php
class Wishlist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function search()
	{
		$teamcode = $this->session->userdata('TeamCode');
		$teamid= $this->secure->cnuid($teamcode);
		
		$search = $this->input->get('search');

		$qry = "SELECT ID, Codename, WishItem, WishDesc, Avatar, Upload, Link, Comments FROM avatar WHERE Codename LIKE ? AND Validity = 1 AND TeamID = ? ORDER BY RAND(1) ";
		$result = $this->db->query($qry, array("%".$this->db->escape_like_str($search)."%", $teamid));
		
		return $result->result();
	}
	/*end of search*/
	
	public function view($codename)
	{
		$teamcode = $this->session->userdata('TeamCode');
		$teamid= $this->secure->cnuid($teamcode);
		
		$qry = "SELECT * FROM avatar WHERE Codename = ? AND TeamID = ? LIMIT 1";
		
		$result = $this->db->query($qry, array(urldecode($codename), $teamid));
		
		if ($result->num_rows() != 0)	// CODENAME MATCHES
		{
			foreach($result->result() as $row)
			{
				$avatarid = $row->ID;
			}
			
			$user = $this->session->userdata('Username');
			$ip = $this->session->userdata('ip_address');
			date_default_timezone_set('Asia/Kuala_Lumpur');
			$date = date("m-d-y");
			
			$check = "SELECT ID FROM views WHERE AvatarID = ? AND User = ? AND IPAddress = ? AND Date = ? LIMIT 1"; // CHECK IF USER ALREADY VIEWED THIS
			$exec = $this->db->query($check, array($avatarid, $user, $ip, $date));
			if($exec->num_rows() < 1)	// IF RETURNS NONE
			{
				$data = array(
				'AvatarID' => ($avatarid),
				'User' => ($user),
				'IPAddress' => ($ip),
				'Date' => ucfirst($date)
				);
				
				$this->db->insert('views', $data);	//INSERT VIEWS TABLE
			}
		}
		else{
			show_404();
			exit();
		}
		
		return $result->result();
		
	}
	/*end of view*/
	
	public function comment($codename)
	{
		$qry = "SELECT * FROM comments JOIN avatar ON AvatarID = avatar.ID WHERE Codename = ? ORDER BY comments.ID ASC";
		$result = $this->db->query($qry, $codename);
		return $result->result();
	}
	/*end of comment*/
	
	public function add_comment($avatarid, $codename)
	{
		$user = $this->session->userdata('Username');
		$comment = $this->input->post('comment');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date("m-d-y g:iA");
		
		$values = array(
			'AvatarID' => ($avatarid),
			'User' => ($user),
			'Comment' => ($comment),
			'DateStamp' => ($date)
		);
		if($this->db->insert('comments', $values)){
			$this->db->query("UPDATE avatar SET Comments = Comments + 1 WHERE ID = $avatarid");
			return TRUE;
		}
	}
	/*end of add_comment*/
	
	public function count($what, $codename)
	{
		switch($what){
			case 'views':
				// $this->db->where("avatar.Codename = '$codename'");
				$this->db->where("avatar.Codename", $codename);
				$this->db->join('avatar', 'avatar.ID = AvatarID');
				return $this->db->count_all_results('views');
				break;
				
			case 'comments':
				// $this->db->where("avatar.Codename = '$codename' AND Status = 1");
				$this->db->where("avatar.Codename", $codename);
				$this->db->where("Status", "1");
				$this->db->join('avatar', 'avatar.ID = AvatarID');
				return $this->db->count_all_results('comments');
				break;
				
			default:
		}
		
	}
	/*end of count*/
	
}

/* End of file wishlist_model.php */
/* Location: ./application/models/wishlist_model.php */