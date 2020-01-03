<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kalibrasi extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->model('m_kalibrasi');
		$this->load->helper('text');
		
	}
	
	function index(){
		$data['title']		= 'Kalibrasi Alat';
		$data['view']		= 'list_kalibrasi';
		$data['d_kalibrasi'] = $this->m_kalibrasi->getAllData();
		$data['set_kalibrasi'] = $this->m_kalibrasi->getAllData();
		
		$this->load->view('templates_backend', $data);
	}
}


