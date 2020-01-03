<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Dokter extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_dokter');
		
	}
	
	public function index() {
		$data['title'] = 'Data Dokter';
		$data['view'] = 'list_dokter';
		$data['dokter'] = $this->m_dokter->get_dokter();
		$this->load->view('templates_backend',$data);
	}
	
	public function detail($id_petugas) {
		$data['title']	= 'Detail Data Dokter';
		$data['view']	= 'detail_dokter';
		$data['detail_dokter']	= $this->m_dokter->getById($id_petugas);
		$this->load->view('templates_backend',$data);
	}
	
	function save()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nama_petugas', 'Nama Lengkap Petugas Medis', 'required');
		//$this->form_validation->set_rules('id_petugas_jenis', 'Jenis Petugas Medis', '');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		
		$nama_petugas			= $this->input->post('nama_petugas');
		$id_petugas_jenis		= $this->input->post('id_petugas_jenis');
		$no_hp					= $this->input->post('no_hp');
		$email					= $this->input->post('email');
		$alamat					= $this->input->post('alamat');
		$tgl_input				= date("Y-m-d H:i:s");
		//$user					= $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'nama_petugas'			=> $nama_petugas,		
				'id_petugas_jenis'		=> $id_petugas_jenis,			
				'no_hp'					=> $no_hp,		
				'email'					=> $email,				
				'alamat'				=> $alamat,		
				'tanggal_input'			=> $tgl_input			
				);

		$this->m_dokter->input($data, 'tb_petugas');
		
		$notif = array(
		'title' => 'Berhasil, Data Anda Telah di Input.', 
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
	
	function update()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nama_petugas', 'Nama Lengkap Petugas Medis', 'required');
		//$this->form_validation->set_rules('id_petugas_jenis', 'Jenis Petugas Medis', '');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		
		$id_petugas				= $this->input->post('id_petugas');
		$nama_petugas			= $this->input->post('nama_petugas');
		$id_petugas_jenis		= $this->input->post('id_petugas_jenis');
		$no_hp					= $this->input->post('no_hp');
		$email					= $this->input->post('email');
		$alamat					= $this->input->post('alamat');
		//$user					= $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(		
				'nama_petugas'			=> $nama_petugas,		
				'id_petugas_jenis'		=> $id_petugas_jenis,			
				'no_hp'					=> $no_hp,		
				'email'					=> $email,				
				'alamat'				=> $alamat			
				);

		$this->m_dokter->update('tb_petugas','id_petugas', $id_petugas, $data);
		
		$notif = array(
		'title' => 'Berhasil, Data Anda Telah di Update.', 
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
	
	function delete($id_petugas)
	{
		$this->auth->adminRestrict();
		$data = array(
						'trash' => '1'
					);	
		$this->datamapper->update('tb_petugas', 'id_petugas', $id_petugas, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('dokter');
	}
	
	
}