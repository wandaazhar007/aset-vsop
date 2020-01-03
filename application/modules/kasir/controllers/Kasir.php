<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends MX_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->library('Pdf');
		$this->load->model('m_kasir');
	}
	
	function index()
	{
		$data['title'] 			= 'Kasir';
		$data['view']			= 'list_kasir';
		$data['allPasien']		= $this->m_kasir->getAllPasien();
		$this->load->view('templates_backend',$data);
	}
	
	function create_invoice($id_registrasi)
	{
		$data['title'] 			= 'Detail Pembayaran';
		$data['view'] 			= 'input_invoice';
		$data['all'] 			= $this->m_kasir->getAll($id_registrasi);
		$data['allitem']		= $this->m_kasir->getAllItem($id_registrasi);
		$this->load->view('templates_backend',$data);
	}
	
	function cetak_invoice($id_registrasi)
	{
		$data['all'] 			= $this->m_kasir->getInvoice($id_registrasi);
		$data['allitem']		= $this->m_kasir->getAllItem($id_registrasi);
		
		$status_cetak = array(
				
						'status_cetak' => '1'
			
					  );
			
		$this->m_kasir->update('tb_transaksi', 'id_registrasi', $id_registrasi, $status_cetak );	
		
		$this->load->view('cetak_invoice',$data);
	}
	
	function save_invoice($id_registrasi)
	{
		$all = $this->m_kasir->getAll($id_registrasi);
		$tgl_input				= date("Y-m-d H:i:s");
		
		foreach($all as $p)
		{
			$id_invoice				= $this->mrclibs->get_invoice();
			$data = array(	
				
				'id_invoice'			=> $id_invoice,	
				'id_transaksi'			=> $p->id_transaksi,		
				'id_registrasi'			=> $p->id_registrasi,			
				'id_tindakan'			=> $p->id_tindakan,					
				'tgl_input'				=> $tgl_input			
				);

		$this->m_kasir->input($data, 'tb_invoice');	
		
		}
			$status_trans = array(
				
						'status_trans' => '1'
			
					  );
		$this->m_kasir->update('tb_transaksi', 'id_registrasi', $id_registrasi, $status_trans );	
			
		redirect($_SERVER['HTTP_REFERER']);
		
		
	}
	
	
}