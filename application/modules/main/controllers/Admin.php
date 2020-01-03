<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_admin');
	}
	
	public function index() {
		$data['title'] 			= 'Dashboaard';
		$data['view'] 			= 'v_admin';
		$data['username'] 		= $this->session->userdata('username');
		
		$this->load->view('templates_backend',$data);
	}
	
	
}
?>