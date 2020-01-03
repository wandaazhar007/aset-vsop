<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Tindakan_dokter extends MX_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->model('m_tindakan_dokter');		
	}
	
	public function index()
	{
		$data['title'] 			= 'Master Tindakan Dokter';
		$data['view'] 			= 'list_tindakan_dokter';
		$data['allTindakan']	= $this->m_tindakan_dokter->getAllTindakan();
		$this->load->view('templates_backend',$data);
	}
	
	function detail($id_tindakan_master)
	{
		$data['title'] 			= 'Detail Tindakan Dokter';
		$data['view'] 			= 'detail_tindakan_dokter';
		$data['get_detail'] 	= $this->m_tindakan_dokter->getDetail($id_tindakan_master);
		$this->load->view('templates_backend',$data);
	}
	
	function save()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nama_tindakan', 'Nama Tindakan Dokter', 'required');
		$this->form_validation->set_rules('harga_tindakan', 'Harga Tindakan', 'required');
		
		$nama_tindakan			= $this->input->post('nama_tindakan');
		$harga_tindakan			= $this->input->post('harga_tindakan');
		$tgl_input				= date("Y-m-d H:i:s");
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'id_tindakan_jenis'		=> '1',
				'nama_tindakan'			=> $nama_tindakan,		
				'harga_tindakan'		=> $harga_tindakan,		
				'tgl_input'				=> $tgl_input			
				);

		$this->m_tindakan_dokter->input($data, 'tb_tindakan_master');
		
		$notif = array(
						'title' => 'Berhasil, Data Anda Telah di Input !!!', 
						'message' => 'Success', 
						'status' => 1,
						'redirect' => ''.base_url().'masters/tindakan_dokter'
					);
			
		echo json_encode($notif);
			
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
	
	function update()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nama_tindakan', 'Nama Tindakan Dokter', 'required');
		$this->form_validation->set_rules('harga_tindakan', 'Harga Tindakan', 'required');
		
		$id_tindakan_master		= $this->input->post('id_tindakan_master');
		$nama_tindakan			= $this->input->post('nama_tindakan');
		$harga_tindakan			= $this->input->post('harga_tindakan');
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(		
				
				'id_tindakan_jenis'		=> '1',
				'nama_tindakan'			=> $nama_tindakan,		
				'harga_tindakan'		=> $harga_tindakan			
				);

		$this->m_tindakan_dokter->update('tb_tindakan_master','id_tindakan_master', $id_tindakan_master, $data);
		
		$notif = array(
						'title' => 'Berhasil, Data Anda Telah di Update !!', 
						'message' => 'Success', 
						'status' => 1,
						'redirect' => ''.base_url().'masters/tindakan_dokter'
					);
		
		echo json_encode($notif);
		
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
	
	function delete($id_tindakan_master)
	{
		$this->auth->adminRestrict();
		$data = array(
						'trash' => '1'
					);	
		$this->datamapper->update('tb_tindakan_master', 'id_tindakan_master', $id_tindakan_master, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('masters/tindakan_dokter');
	}
}