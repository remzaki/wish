<?php
class Home extends CI_Controller {
	
	function index()
	{
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$this->load->helper('smiley');
		
		$data['firstname'] = $this->session->userdata('Firstname');
		$data['lastname'] = $this->session->userdata('Lastname');
		
		$this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('footer');
		
		$this->session->unset_userdata('AvatarStatusFlag');
		
		$this->load->model('pair_model');
		$this->pair_model->pair_user();		// CHECK FOR PAIRING
	}
	
}