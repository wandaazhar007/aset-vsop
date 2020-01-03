<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Registrasi extends MX_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->model('m_registrasi');
		
	}
	
	public function index() {
		$data['title'] 			= 'Registrasi Pasien';
		$data['view'] 			= 'list_pendaftaran';
		$data['allPasien']		= $this->m_registrasi->getAllPasien();
		$this->load->view('templates_backend',$data);
	}
	
	function get_pasien_result()
	{
		$detailPasien = $this->input->post('detailPasien');
		if(isset($detailPasien) and !empty($detailPasien))
		{
			$records = $this->m_registrasi->get_search_pasien($detailPasien);
			$output = '';
			
			foreach($records->result_array() as $row)
			{
				$output = '
		<div class="row">
			<div class="col">
				tester
			</div>
		</div>
				';
			}
		}
	}
	
	function pasien_baru()
	{
		$data['title'] 			= 'Daftar Pasien';
		$data['view'] 			= 'input_pasien';
		$data['get_rm']			= $this->m_registrasi->getNoRm();
		$this->load->view('templates_backend',$data);
	}
	
	function pasien_lama()
	{
		$data['title'] 			= 'Daftar Pasien Lama';
		$data['view'] 			= 'input_pasien_lama';
//		$data['get_detail'] 	= $this->m_registrasi->getPasien($id_pasien);
//		$data['get_detail'] 	= $this->datamapper->getAllByid('tb_reg_pasien', 'id_pasien', $id_pasien);
		$this->load->view('templates_backend',$data);
	}
	
	function getrm($no_rm)
	{
		$datarm = $this->m_registrasi->select_pasien($no_rm);
		echo json_encode($datarm);
	}
	
	function detail($id_registrasi)
	{
		$data['title'] 			= 'Detail Data Pasien';
		$data['view'] 			= 'detail_pasien';
		$data['get_detail'] 	= $this->m_registrasi->getPasien($id_registrasi);
//		$data['get_detail'] 	= $this->datamapper->getAllByid('tb_pasien', 'id_pasien', $id_pasien);
		$this->load->view('templates_backend',$data);
	}
	
	function input()
	{
		$data['title'] 			= 'Registrasi Data Pasien';
		$data['view'] 			= 'input_pasien';
//		$data['get_rm']			= $this->m_registrasi->getNoRm();
		$this->load->view('templates_backend',$data);
	}
	
	function print_kartu($id_registrasi)
	{
		$this->load->library('tcpdf/tcpdf');
		
		$data['title']			= 'Print kartu berobat';
		$data['kartu']			= $this->m_registrasi->getPasien($id_registrasi);
		
		$this->load->view('print_kartu', $data);
//		$this->load->view('print_kartu2', $data);
	}
	
	function save()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nik', 'No Induk KTP', 'required');
		$this->form_validation->set_rules('nama_pasien', 'Nama Lengkap Pasien', 'required');
//		$this->form_validation->set_rules('no_rm', 'No Rekam Medis', 'trim|required|min_length[5]|max_length[6]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('jaminan_pembayaran', 'Jaminan Pembayaran', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		$this->form_validation->set_rules('user', 'User', '');
		
		
		$id_registrasi			= $this->mrclibs->kd_reg(8);
		$nik					= $this->input->post('nik');
		$nama_pasien			= $this->input->post('nama_pasien');
		$no_rm					= $this->mrclibs->get_no_rm();
		$jenis_kelamin			= $this->input->post('jenis_kelamin');
		$tempat_lahir			= $this->input->post('tempat_lahir');
		$tanggal_lahir			= $this->input->post('tanggal_lahir');
		$no_hp					= $this->input->post('no_hp');
		$email					= $this->input->post('email');
		$jaminan_pembayaran		= $this->input->post('jaminan_pembayaran');
		$alamat					= $this->input->post('alamat');
		$tgl_input				= date("Y-m-d H:i:s");
		$tgl_update				= date("Y-m-d H:i:s");
		$user					= $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(
				'nik'					=> $nik,		
				'nama_pasien'			=> $nama_pasien,		
				'no_rm'					=> $no_rm,		
				'jenis_kelamin'			=> $jenis_kelamin,		
				'tempat_lahir'			=> $tempat_lahir,		
				'tanggal_lahir'			=> $tanggal_lahir,		
				'no_hp'					=> $no_hp,		
				'email'					=> $email,	
				'alamat'				=> $alamat,		
				'tgl_input'				=> $tgl_input,		
				'tgl_update'			=> $tgl_update,	
				);
		$data2 = array(
				'id_registrasi'			=> $id_registrasi,
				'no_rm'					=> $no_rm,
				'jaminan_pembayaran'	=> $jaminan_pembayaran,
				'tgl_input'				=> $tgl_input,
				'tgl_update'			=> $tgl_update,
				'id_user'				=> $user
				
				); 
		
		$this->m_registrasi->input($data, 'tb_pasien');
		$this->m_registrasi->input($data2, 'tb_registrasi');
		
		$notif = array(
		'title' => 'Berhasil, Data Anda Telah di Input !!!', 
		'message' => 'Success', 
		'status' => 1,
		'redirect' => ''.base_url().'registrasi'
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
	
	function save_lama()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nik', 'No Induk KTP', 'required');
		$this->form_validation->set_rules('nama_pasien', 'Nama Lengkap Pasien', 'required');
//		$this->form_validation->set_rules('no_rm', 'No Rekam Medis', 'trim|required|min_length[5]|max_length[6]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('jaminan_pembayaran', 'Jaminan Pembayaran', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		$this->form_validation->set_rules('user', 'User', '');
		
		
		$id_registrasi			= $this->mrclibs->kd_reg(8);
		$nik					= $this->input->post('nik');
		$nama_pasien			= $this->input->post('nama_pasien');
		$no_rm					= $this->input->post('no_rm');
		$jenis_kelamin			= $this->input->post('jenis_kelamin');
		$tempat_lahir			= $this->input->post('tempat_lahir');
		$tanggal_lahir			= $this->input->post('tanggal_lahir');
		$no_hp					= $this->input->post('no_hp');
		$email					= $this->input->post('email');
		$jaminan_pembayaran		= $this->input->post('jaminan_pembayaran');
		$alamat					= $this->input->post('alamat');
		$tgl_input				= date("Y-m-d H:i:s");
		$tgl_update				= date("Y-m-d H:i:s");
		$user					= $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(
				'id_registrasi'			=> $id_registrasi,
				'no_rm'					=> $no_rm,
				'jaminan_pembayaran'	=> $jaminan_pembayaran,
				'tgl_input'				=> $tgl_input,
				'tgl_update'			=> $tgl_update,
				'id_user'				=> $user
				
				); 
		
		$this->m_registrasi->input($data, 'tb_registrasi');
		
		$notif = array(
						'title' => 'Berhasil, Data Anda Telah di Input !!!', 
						'message' => 'Success', 
						'status' => 1,
						'redirect' => ''.base_url().'registrasi'
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
		

		$this->form_validation->set_rules('nik', 'No Induk KTP', 'required');
		$this->form_validation->set_rules('nama_pasien', 'Nama Lengkap Pasien', 'required');
//		$this->form_validation->set_rules('no_rm', 'No Rekam Medis', 'trim|required|min_length[5]|max_length[6]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('jaminan_pembayaran', 'Jaminan Pembayaran', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		$this->form_validation->set_rules('user', 'User', '');
		
		
		$id_registrasi			= $this->input->post('id_registrasi');
		$id_pasien				= $this->input->post('id_pasien');
		$nik					= $this->input->post('nik');
		$nama_pasien			= $this->input->post('nama_pasien');
		$no_rm					= $this->input->post('no_rm');
		$jenis_kelamin			= $this->input->post('jenis_kelamin');
		$tempat_lahir			= $this->input->post('tempat_lahir');
		$tanggal_lahir			= $this->input->post('tanggal_lahir');
		$no_hp					= $this->input->post('no_hp');
		$email					= $this->input->post('email');
		$jaminan_pembayaran		= $this->input->post('jaminan_pembayaran');
		$alamat					= $this->input->post('alamat');
		$tgl_input				= date("Y-m-d H:i:s");
		$tgl_update				= date("Y-m-d H:i:s");
		$user					= $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(
				'id_pasien'				=> $id_pasien,
				'nik'					=> $nik,		
				'nama_pasien'			=> $nama_pasien,		
//				'no_rm'					=> $no_rm,		
				'jenis_kelamin'			=> $jenis_kelamin,		
				'tempat_lahir'			=> $tempat_lahir,		
				'tanggal_lahir'			=> $tanggal_lahir,		
				'no_hp'					=> $no_hp,		
				'email'					=> $email,	
				'alamat'				=> $alamat,		
//				'tgl_input'				=> $tgl_input,		
				'tgl_update'			=> $tgl_update	
				);
		$data2 = array(
//				'id_registrasi'			=> $id_registrasi,
				'no_rm'					=> $no_rm,
				'jaminan_pembayaran'	=> $jaminan_pembayaran,
				'tgl_input'				=> $tgl_input,
				'tgl_update'			=> $tgl_update,
				'id_user'				=> $user
				
				); 
		
		$this->m_registrasi->update('tb_pasien', 'id_pasien', $id_pasien, $data);
		$this->m_registrasi->update('tb_registrasi', 'id_registrasi', $id_registrasi, $data2);
		
		$notif = array(
		'title' => 'Berhasil, Data Anda Telah di Input !!!', 
		'message' => 'Success', 
		'status' => 1,
		'redirect' => ''.base_url().'registrasi'
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
	
	function delete($id_registrasi)
	{
		$data = array(
					'trash'	=> '1'
					);
					
		$this->m_registrasi->update('tb_registrasi', 'id_registrasi', $id_registrasi, $data);
		
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('registrasi');
		
//		if($data){
//			$notif = array(
//		'title' => 'Data berhasil dihapus !!!', 
//		'message' => 'Success', 
//		'status' => 1
//		);
//		echo json_encode($notif);
//		}else{
//			$err_array = $this->form_validation->error_array();
//			$message = '';
//				foreach($err_array as $field => $msg)
//				{
//					$message .= ''.$msg.'
//					';
//
//				}
//			$notif = array(
//			'title' => 'Gagal !!!', 
//			'message' => $message, 
//			'status' => 0
//			);
//			echo json_encode($notif);
//		}
	}
	
	

}