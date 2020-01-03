<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Tindakan_dokter extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->model('m_tindakan_dokter');
	}
	
	function index() 
	{
		$data['title'] 			= 'Master Data Tindakan';
		$data['view'] 			= 'list_tindakan_dokter';
		$data['tindakan']		= $this->m_tindakan_dokter->get_tindakan();
		$this->load->view('backend/core',$data);
	}
	
	function input()
	{
		$data['title'] = 'Input Data Tindakan';
		$data['view'] = 'input_tindakan_dokter';
		$this->load->view('backend/core',$data);
	}
	
	function detail($id_tindakan_dokter)
	{
		$data['title']			= 'Edit Tindakan Dokter';
		$data['view']			= 'detail_tindakan_dokter';
		$data['detail_tindakan']= $this->m_tindakan_dokter->getDetail($id_tindakan_dokter);
		
		$this->load->view('backend/core', $data);
	}
	
	function save()
	{
		$nama_tindakan		= $this->input->post('nama_tindakan');
		$kode_tindakan 		= $this->input->post('kode_tindakan');
		$harga_tindakan		= $this->input->post('harga_tindakan');
		$tanggal_input		= date('Y-m-d h:i:s');
							
		$data = array(
		'nama_tindakan'		=> $nama_tindakan,
		'kode_tindakan'		=> $kode_tindakan,
		'harga_tindakan'	=> $harga_tindakan,
		'tanggal_input'		=> $tanggal_input
		);
		
		$this->m_tindakan_dokter->input($data, 'tbt_dokter');
		redirect('master_tindakan/tindakan_dokter');
	}
	
	function update($id_tindakan_dokter)
	{
		$id_tindakan_dokter	= $this->input->post('id_tindakan_dokter');
		$nama_tindakan		= $this->input->post('nama_tindakan');
		$kode_tindakan 		= $this->input->post('kode_tindakan');
		$harga_tindakan		= $this->input->post('harga_tindakan');
		$tanggal_input		= date('Y-m-d h:i:s');
		
		$data = array(
		'nama_tindakan'		=> $nama_tindakan,
		'kode_tindakan'		=> $kode_tindakan,
		'harga_tindakan'	=> $harga_tindakan,
		'tanggal_input'		=> $tanggal_input
		);
		
		$this->m_tindakan_dokter->update('tbt_dokter', 'id_tindakan_dokter' );
		redirect('master_tindakan/tindakan_dokter');
	}
	
	function delete($id_tindakan_dokter)
	{
		$data = array(
			'trash'		=> '1'
		);
		$this->m_tindakan_dokter->update('tbt_dokter', 'id_tindakan_dokter', $id_indakan_dokter, $data);
	}
	
		
}