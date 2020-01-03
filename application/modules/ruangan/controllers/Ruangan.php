<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ruangan extends MX_Controller 
{	
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_ruangan');
	}
	
	function index() {
		$data['title']			= 'Master Data Nama Ruangan';
		$data['view']			= 'list_ruangan';
		$data['f_ruangan']		= $this->m_ruangan->getAllData();
		
		$this->load->view('templates_backend', $data);
 	}
	
	function detail($id_ruangan) {
		$data['title']		= 'Edit Data Ruangan';
		$data['view']		= 'detail_ruangan';
		$data['detail_ruangan']	= $this->m_ruangan->getById($id_ruangan);
		
		$this->load->view('templates_backend', $data);
		
	}
	
	function save() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
		
		$nama_ruangan 	= $this->input->post('nama_ruangan');
		
		if($this->form_validation->run() == true) {
			$data = array(
						'nama_ruangan'	=> $nama_ruangan
						);
						
		$this->m_ruangan->input($data, 'tb_ruangan');
		
		$notif = array(
		'title' 		=> 'Berhasil, Data Anda Telah di Input.', 
		'message' 		=> 'Success', 
		'status' 		=> 1
		);
		echo json_encode($notif);
		//redirect(''.$_SERVER['HTTP_REFERER'].'');
		}else{
			$err_array = $this->form_validation->error_array();
			$message = '';
				foreach($err_array as $field => $msg)
				{
					$message .= ''.$msg.'
					';

				}
			$notif = array(
			'title' 		=> 'Gagal !!!', 
			'message' 		=> $message, 
			'status' 		=> 0
			);
			echo json_encode($notif);
		}
		
	}
	
	function update() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
		
		$id_ruangan 		= $this->input->post('id_ruangan');
		$nama_ruangan 		= $this->input->post('nama_ruangan');
		
		if($this->form_validation->run() == true) {
			$data = array(
						'nama_ruangan'		=> $nama_ruangan
						);
						
		$this->m_ruangan->update('tb_ruangan','id_ruangan', $id_ruangan, $data);
		
		$notif = array(
					'title' 	=> 'Berhasil, Data Ruangan telah diupdate.', 
					'message' 	=> 'Success', 
					'status' 	=> 1
					);
		echo json_encode($notif);
		//redirect(''.$_SERVER['HTTP_REFERER'].'');
		}else{
			$err_array = $this->form_validation->error_array();
			$message = '';
				foreach($err_array as $field => $msg)
				{
					$message .= ''.$msg.'
					';

				}
			$notif = array(
						'title' 	=> 'Gagal !!!', 
						'message' 	=> $message, 
						'status' 	=> 0
						);
			echo json_encode($notif);
		}
	}
	
	function delete($id_ruangan)
	{
		$this->auth->adminRestrict();
		$data = array(
						'status' => '1'
					);	
		$this->datamapper->update('tb_ruangan', 'id_ruangan', $id_ruangan, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('ruangan');
	}
}