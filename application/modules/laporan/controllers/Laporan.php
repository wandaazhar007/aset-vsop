<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Laporan extends MX_Controller 
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
		if(!empty($_GET['tgla']) && !empty($_GET['tglb'] ))
		{
			$tgla = $_GET['tgla'];
			$tglb = $_GET['tglb'];
			$generate = $this->generate($tgla, $tglb);
			$data['title'] = $generate['title'];
			$data['laporan'] = $generate['result'];
		}else
			{
				$data['title'] = 'Laporan';
			}
		$data['view'] = 'list_laporan';
		$this->load->view('templates_backend',$data);
	}
	
	function generate($tgla, $tglb)
	{
		$result = array(
					
			'result' => $this->datamapper->query2("SELECT * FROM vw_laporan WHERE vw_laporan.tgl_input >= '$tgla' AND vw_laporan.tgl_input <= '$tglb' AND vw_laporan.trash = '0' ORDER BY tgl_input ASC"),
			'title' => 'Report Tanggal '.$this->utilities->tanggal($tgla).' Sampai '.$this->utilities->tanggal($tglb).''
				
		);
		
		return $result;
	}
	
}
?>