<?php
		// 1. check if user has a manito/manita already thru pairs table
		// 2. if not, find one in the teammates table
		// 3. update the pairs table with the details
		// 4. update the teammates.flag
		
class Pair_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->model('log_model');
	}
	
	public function pair_user()
	{
		
		$qlid = $this->session->userdata('QuicklookID');
		$userid = $this->secure->cnuid($qlid);
		$teamcode = $this->session->userdata('TeamCode');
		$teamid= $this->secure->cnuid($teamcode);
		
		$check = $this->db->query("SELECT COUNT(*) AS UserID FROM pairs WHERE UID=?", $userid);	//	CHECK IF USER HAS A MANITO/MANITA ALREADY
		$result = $check->result_array();
		$var = $result[0]['UserID'];
		
		if($var == 0)	//	USER HAS NO MANITO/MANITA
		{
		
			$id = rand();	//	GENERATE A RANDOM NUMBER FOR SEEDING THE RAND()
			$qry = "SELECT QuicklookID FROM teammates WHERE QuicklookID!=? AND TeamCode=? AND Flag2=? ORDER BY RAND(?) LIMIT 1";	//	GET A RANDOM TEAMMATE AS A PAIR
			$result = $this->db->query($qry, array($qlid, $teamcode, 0, $id));
			
			if($result->num_rows() > 0)		//	FOUND A PAIR
			{
				$var = $result->result_array();
				$pairid = $var[0]['QuicklookID'];
				$pair = $this->secure->cnuid($pairid);
				
				$data = array(
					"UID" => $userid,
					"PUID" => $pair,
					"TeamID" => $teamid
				);
				$qry = $this->db->insert('pairs', $data);	//	INSERT THE PAIRING IN THE PAIRS TABLE
				
				if($qry)	//	SUCCESSFULLY UPDATE THE PAIRS TABLE
				{
					// echo "<br/> you now have a pair!";
					
					$qry = "UPDATE teammates SET Flag2=? WHERE QuicklookID=? AND TeamCode=?";	//	UPDATE TEAMMATES THAT USER IS USED AS A PAIR
					$result = $this->db->query($qry, array(1, $pairid, $teamcode));
					
					if($result){
						// echo "<br/> updated the teammates!";
					}else{
						$this->log_model->log('pair_xup');
						// echo "Something went wrong. Please notify the Administrator. ERROR: Unable to update the 'teammates'";
					}
				}
				else	//	FAILED TO UPDATE THE PAIR
				{
					// echo "<br/> need to find a human!";
					$this->log_model->log('pair_err');
				}
			}
			else	//	UNABLE TO FIND A PAIR
			{	
				// echo 'not found!';
				// print_r($result);
				$this->log_model->log('pair_nf');
			}
			
		}
		else	//	USER HAS MANITO/MANITA ALREADY
		{
			return FALSE;
		}
		
	}
	
}

/* End of file pair_model.php */
/* Location: ./application/models/pair_model.php */