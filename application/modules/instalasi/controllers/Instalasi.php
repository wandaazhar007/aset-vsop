<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Instalasi extends MX_Controller 
{	
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_instalasi');
	}
	
	function index() {
		$data['title']			= 'Master Data Instalasi';
		$data['view']			= 'list_instalasi';
		$data['f_instalasi']	= $this->m_instalasi->getAllData();
		
		$this->load->view('templates_backend', $data);
 	}
	
	function detail($id_instalasi){
		$data['title']		= 'Edit Instalasi';
		$data['view']		= 'detail_instalasi';
		$data['detail_instalasi'] = $this->m_instalasi->getById($id_instalasi);
		
		$this->load->view('templates_backend', $data);
	}
	
	function save() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_instalasi', 'Nama Instalasi', 'required');
		
		$nama_instalasi 	= $this->input->post('nama_instalasi');
		
		if($this->form_validation->run() == true) {
			$data = array(
						'nama_instalasi'	=> $nama_instalasi
						);
						
		$this->m_instalasi->input($data, 'tb_instalasi');
		
		$notif = array(
		'title' => 'Berhasil, Data Instalasi Baru Telah di Input.', 
		'message' => 'Success', 
		'status' => 1
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
			'title' => 'Gagal !!!', 
			'message' => $message, 
			'status' => 0
			);
			echo json_encode($notif);
		}
	}
	
	function update() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_instalasi', 'Nama Instalasi', 'required');
		
		$id_instalasi 	= $this->input->post('id_instalasi');
		$nama_instalasi = $this->input->post('nama_instalasi');
		
		if($this->form_validation->run() == true){
			$data = array(
						'nama_instalasi'	=> $nama_instalasi
						);
		$this->m_instalasi->update('tb_instalasi', 'id_instalasi', $id_instalasi, $data);
		$notif = array(
					'title'		=> 'Berhasil, Data Instalasi telah diupdate',
					'message'	=> 'Success',
					'status'	=> 1
					);
		echo json_encode($notif);
		} else {
			$err_array = $this->form_validation->error_array();
			$message = '';
				foreach($err_array as $field => $msg)
				{
					$message .= ''.$msg.'
					';

				}
			$notif = array(
			'title' => 'Gagal !!!', 
			'message' => $message, 
			'status' => 0
			);
			echo json_encode($notif);
		}
	}
	
	function delete($id_instalasi){
		
		$data = array(
				'status'	=> '1'
				);
		$this->datamapper->update('tb_instalasi', 'id_instalasi', $id_instalasi, $data);
		$this->utilities->notification('success', 'Data Instalasi berhasil dihapus');
		redirect('instalasi');
		}
		
	
}