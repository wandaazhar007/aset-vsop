<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Tindakan_fisio extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->model('M_tindakan_fisio');
	}
	
	public function index() {
		$data['title'] = 'Master Data Tindakan';
		$data['view'] = 'list_tindakan_fisio';
		$this->load->view('backend/core',$data);
	}
	
	function input()
	{
		$data['title'] = 'Input Data Tindakan';
		$data['view'] = 'input_tindakan_fisio';
		//$data['kecamatan'] = $this->m_pendaftaran->get_kecamatan();
		//$data['tb_pasien'] = $this->datamapper->getAllById('tb_data_pasien_kandungan', 'id_pasien', $id_pasien);
		$this->load->view('backend/core',$data);
	}
	
		
}