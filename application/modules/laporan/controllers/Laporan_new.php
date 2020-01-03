<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Laporan_new extends MX_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->model('m_laporan');
		
	}
	
	public function index() 
	{
		$data['title'] = 'Laporan';
		$data['view'] = 'list_laporan_new';
		$this->load->view('templates_backend',$data);
	}
	
	public function get_data()
	{
		if(!empty($_GET['tgla']) && !empty($_GET['tglb'] && !empty($_GET['jenis'])))
		{
			$tgla = $_GET['tgla'];
			$tglb = $_GET['tglb'];
			$tabel = $_GET['jenis'];
			if($tabel == 1)
			{
				$data_tabel = $this->m_laporan->get_registrasi($tgla, $tglb);
				$data['title'] = 'Laporan';
				$data['datatabel'] = json_decode($data_tabel, true);
				$data['view'] = 'list_laporan_new';
				$this->load->view('templates_backend',$data);
				
			}else{
				
				$data_tabel = $this->m_laporan->get_keuangan($tgla, $tglb);
				$data['title'] = 'Laporan';
				$data['datatabel'] = json_decode($data_tabel, true);
				$data['view'] = 'list_laporan_new';
				$this->load->view('templates_backend',$data);
			}
			
		}else{
				$data['title'] = 'Laporan';
		}
		
		$data['view'] = 'list_laporan_new';
		$this->load->view('templates_backend',$data);
	}
	
}
?>