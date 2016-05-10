<?php
class Wishlist extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('wishlist_model');
	}
	
	function index()
	{
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$data['firstname'] = $this->session->userdata('Firstname');
		$data['lastname'] = $this->session->userdata('Lastname');
		
		$this->load->model('avatar_model');
		$checkcn = $this->avatar_model->check_codename();
		if($checkcn === FALSE)
		{
			redirect('wish/avatar');
		}
		else
		{
			$this->load->view('header', $data);
			$this->load->view('wishlist');
			$this->load->view('footer');
		}
		
	}
	
	function search()
	{
		$result = $this->wishlist_model->search();
		echo json_encode($result);
	}
	
	function view()
	{
		$this->secure->activity();	// SECURITY: CHECK IF USER IS ACTIVE, ELSE EXECUTE LOGOUT
		
		$data['firstname'] = ucfirst($this->session->userdata('Firstname'));
		$data['lastname'] = ucfirst($this->session->userdata('Lastname'));
		$codename = $this->uri->segment(2);
		
		$this->load->view('header', $data);
		
		$data['result'] = $this->wishlist_model->view($codename);		// GET CODENAME DETAILS
		// $data['comments'] = $this->wishlist_model->comment($codename);		// GET COMMENTS
		
		if($data['result']){
		
			$data['count_views'] = $this->wishlist_model->count('views', $codename);	//GET VIEWS COUNT
			$data['count_comment'] = $this->wishlist_model->count('comments', $codename);	//GET COMMENT COUNT
			
			$this->load->view('wishlist/view', $data);
		}
		
		$this->load->view('footer');
	}
	
}


/* End of file wishlist.php */
/* Location: ./application/controllers/wishlist.php */