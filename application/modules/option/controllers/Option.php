<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Option extends MX_Controller
{
	
	function __construct()
		{
			$this->auth->adminRestrict();
			parent::__construct();	
		}
		
	function index()
		{
			$data['title'] = 'Detail Option';
			$data['view'] = 'detail_option';
			$data['tb_option'] = $this->datamapper->all('tb_option');
			$this->load->view('templates_backend',$data);
		}
		
	function save()
	{
	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('nama_aplikasi', 'Nama Aplikasi', 'required');
	$this->form_validation->set_rules('desc_aplikasi', 'Deskripsi Aplikasi', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	
	
	$id = $this->input->post('id');
	$nama_aplikasi = $this->input->post('nama_aplikasi');
	//$nama_company = $this->input->post('nama_company');
	$desc_aplikasi = $this->input->post('desc_aplikasi');
	$alamat = $this->input->post('alamat');
	//$logo = $this->input->post('logo');
		
	if($this->form_validation->run() == true ){
		if(!empty($id))
		{
			$data = array(
					'nama_aplikasi' => $nama_aplikasi,
					//'nama_company' => $nama_company,
					'desc_aplikasi' => $desc_aplikasi,
					'alamat' => $alamat
			);
			$this->datamapper->update('tb_option','id', $id, $data);
//			$this->utilities->notification('success', 'Selamat, Data anda berhasil di Update.');
			$notif = array(
			'title' => 'Berhasil, Data Telah di Update !!!', 
			'message' => 'Success', 
			'status' => 1
			);
			echo json_encode($notif);
//			redirect('option');
		}
		else
		{
			$data = array(
					'nama_aplikasi' => $nama_aplikasi,
					//'nama_company' => $nama_company,
					'desc_aplikasi' => $desc_aplikasi,
					'alamat' => $alamat
			);
			$this->datamapper->insert('tb_option', $data);
//				$this->utilities->notification('success', 'Selamat, Data anda berhasil di Input.');
//				redirect('option');	
			$notif = array(
			'title' => 'Berhasil, Data Telah di Input !!!', 
			'message' => 'Success', 
			'status' => 1
			);
			echo json_encode($notif);
		}
		}
	}
}