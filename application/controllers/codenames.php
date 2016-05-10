<?php
class Codenames extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('codenames_model');
		$this->load->model('pair_model');
	}
	
	function index()
	{
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$this->pair_model->pair_user();		// CHECK FOR PAIRING
		
		$data['firstname'] = $this->session->userdata('Firstname');
		$data['lastname'] = $this->session->userdata('Lastname');
		
		$count = $this->codenames_model->count_users();
		
		$total_users = $data['total_users'] = $count[0][0]->TotalUsers;
		$total_ready = $data['total_ready'] = $count[1][0]->TotalReady;
		
		if($total_users==$total_ready){
			$data['result'] = TRUE;
			$data['result2'] = $this->codenames_model->get_codenames2();
			$data['result1'] = $this->codenames_model->get_codenames1();
		}
		else{
			$data['result'] = FALSE;
		}
	
		$this->load->view('header', $data);
		$this->load->view('codenames', $data);
		$this->load->view('footer');
	}
	
}


/* End of file codenames.php */
/* Location: ./application/controllers/codenames.php */