<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Supplier extends MX_Controller 
{	
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_supplier');
	}
	
	function index() {
		$data['title']			= 'Master Data Nama Supplier';
		$data['view']			= 'list_supplier';
		$data['f_supplier']		= $this->m_supplier->getAllData();
		
		$this->load->view('templates_backend', $data);
 	}
	
	function detail($id_supplier) {
		$data['title']		= 'Edit Data Supplier';
		$data['view']		= 'detail_supplier';
		$data['detail_supplier']	= $this->m_supplier->getById($id_supplier);
		
		$this->load->view('templates_backend', $data);
		
	}
	
	function save() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Kantor Supplier', 'required');
		
		$nama_supplier 		= $this->input->post('nama_supplier');
		$contact_person 	= $this->input->post('contact_person');
		$no_hp 				= $this->input->post('no_hp');
		$email 				= $this->input->post('email');
		$alamat 			= $this->input->post('alamat');
		
		if($this->form_validation->run() == true) {
			$data = array(
						'nama_supplier'		=> $nama_supplier,
						'contact_person'	=> $contact_person,
						'no_hp'				=> $no_hp,
						'email'				=> $email,
						'alamat'			=> $alamat
						);
						
		$this->m_supplier->input($data, 'tb_supplier');
		
		$notif = array(
					'title' 	=> 'Berhasil, Data Anda Telah di Input.', 
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
	
	function update() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Kantor Supplier', 'required');
		
		$id_supplier 		= $this->input->post('id_supplier');
		$nama_supplier 		= $this->input->post('nama_supplier');
		$contact_person 	= $this->input->post('contact_person');
		$no_hp 				= $this->input->post('no_hp');
		$email 				= $this->input->post('email');
		$alamat 			= $this->input->post('alamat');
		
		if($this->form_validation->run() == true) {
			$data = array(
//						'id_supplier'		=> $id_supplier,
						'nama_supplier'		=> $nama_supplier,
						'contact_person'	=> $contact_person,
						'no_hp'				=> $no_hp,
						'email'				=> $email,
						'alamat'			=> $alamat
						);
						
		$this->datamapper->update('tb_supplier','id_supplier', $id_supplier, $data);
		
		$notif = array(
					'title' 	=> 'Berhasil, Data Supplier tela diupdate.', 
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
	
	function delete($id_supplier)
	{
		$this->auth->adminRestrict();
		$data = array(
						'status' => '1'
					);	
		$this->datamapper->update('tb_supplier', 'id_supplier', $id_supplier, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('supplier');
	}
}