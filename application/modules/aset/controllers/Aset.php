<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Aset extends MX_Controller 
{	
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
//		$this->load->library('vosp_libs');
		$this->load->helper('text');
		$this->load->model('m_aset');
	}
	
	function index() {
		$data['title']		= 'Aplikasi Manajemen Aset';
		$data['view']		= 'list_aset';
		$data['f_aset']		= $this->m_aset->getAllData();
		
		$this->load->view('templates_backend', $data);
 	}
	
	function form_aset() {
		$data['title']		= 'Manajemen ASET VSOP';
		$data ['view']		= 'form_aset';
		
		$this->load->view('templates_backend', $data);
	}
	
	function edit($id_alat) {
		$data['title']		= 'Edit Data Alat';
		$data ['view']		= 'edit_aset';
		$data['e_aset']		= $this->m_aset->getById($id_alat);	
		
		$this->load->view('templates_backend', $data);
	}
	
	function detail($id_alat){
		$data['title']		= 'Detail Alat';
		$data['view']		= 'detail_alat';
		$data['d_alat']		= $this->m_aset->getById($id_alat);
		
		$this->load->view('templates_backend', $data);
	}
	
	function upload($id_alat){
		$data['title']		= 'Upload Dokumen';
		$data['view']		= 'upload';
		$data['e_upload']	= $this->m_aset->getUploadBerkas($id_alat);
		
		$this->load->view('templates_backend', $data);
	}
	
	function set_kalibrasi(){
		$data['title']		= 'Kalibrasi';
		$data['view']		= 'set_kalibrasi';
		$data['d_kalibrasi']= $this->m_aset->getAllData();
		
		$this->load->view('templates_backend', $data);
	}
	
	function delete($id_alat)
	{
		$this->auth->adminRestrict();
		$data = array(
						'trash' => '1'
					);	
		$stmt = $this->datamapper->update('tb_alat', 'id_alat', $id_alat, $data);
//		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		
		if($stmt){
		$notif = array(
					'title' 	=> 'Berhasil, Data Aset Telah di Input.', 
					'message' 	=> 'Success', 
					'status' 	=> 1
					);
		echo json_encode($notif);
		}else{
			$notif = array(
						'title' 	=> 'Gagal !!!', 
						'message' 	=> $message, 
						'status' 	=> 0
						);
			echo json_encode($notif);
		}
		redirect('aset');
	}
	
	function save_upload(){
		$id_alat		= $this->input->post('id_alat');
		$sop_operator	= $this->aksi_upload();
		
		$data = array(
					'sop_operator'	=> $sop_operator
					);
		
			$this->datamapper->update('tb_alat', 'id_alat', $id_alat, $data);
			$this->utilities->notification('success', 'Berkas berhasil di upload');
			redirect(''.$_SERVER['HTTP_REFERER'].'');
		
		
		
	}
	private function aksi_upload(){
		$config['upload_path']          = '/assets/images/sop_operator/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 100;
//		$config['max_width']            = 1024;
//		$config['max_height']           = 768;
// 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('sop_operator')){
			$error = array('error' => $this->upload->display_errors());
//			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
//			$this->load->view('v_upload_sukses', $data);
		}
	}
	
	function save() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
		$this->form_validation->set_rules('kategori_alat', 'Kategori Alat', 'required');
		$this->form_validation->set_rules('merk', 'Nama Merk', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('no_seri', 'No Seri', 'required');
		$this->form_validation->set_rules('instalasi', 'Instalasi', 'required');
		$this->form_validation->set_rules('ruangan','Ruangan', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('kondisi_alat', 'Kondisi Alat', 'required');
		$this->form_validation->set_rules('level_resiko', 'Level Resiko', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('kepemilikan', 'Kepemilikan', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('daya_listrik', 'Daya Listrik', 'required');
		$this->form_validation->set_rules('status_alat', 'Status alat', 'required');
		$this->form_validation->set_rules('perlu_maintenance', 'Perlu Maintenance', 'required');
		$this->form_validation->set_rules('perlu_kalibrasi', 'Perlu Kalibrasi', 'required');
		
		$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'required');
		$this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'required');
		$this->form_validation->set_rules('present_year', 'Present Year', 'required');
		$this->form_validation->set_rules('expected_life_time', 'Life Time', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
		
		$nama_alat			= $this->input->post('nama_alat');
		$kategori_alat		= $this->input->post('kategori_alat');
		$kode_alat			= $this->vosp_libs->getKodeAlat();
		$merk				= $this->input->post('merk');
		$tipe				= $this->input->post('tipe');
		$no_seri			= $this->input->post('no_seri');
		$instalasi			= $this->input->post('instalasi');
		$ruangan			= $this->input->post('ruangan');
		$lokasi				= $this->input->post('lokasi');
		$kondisi_alat		= $this->input->post('kondisi_alat');
		$level_resiko		= $this->input->post('level_resiko');
		$keterangan			= $this->input->post('keterangan');
		$kepemilikan		= $this->input->post('kepemilikan');
		$supplier			= $this->input->post('supplier');
		$daya_listrik		= $this->input->post('daya_listrik');
		$status_alat		= $this->input->post('status_alat');
		$perlu_maintenance	= $this->input->post('perlu_maintenance');
		$perlu_kalibrasi	= $this->input->post('perlu_kalibrasi');
		$tahun_pengadaan	= $this->input->post('tahun_pengadaan');
		$sumber_dana		= $this->input->post('sumber_dana');
		$present_year		= $this->input->post('present_year');
		$expected_life_time	= $this->input->post('expected_life_time');
		$harga_beli			= $this->input->post('harga_beli');
		$tgl_input			= date("Y-m-d");
		$user				= $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));
		
		if($this->form_validation->run() == true){
			$data = array(
					'nama_alat'			=> $nama_alat,
					'kategori_alat'		=> $kategori_alat,
					'kode_alat'			=> $kode_alat,
					'merk'				=> $merk,
					'tipe'				=> $tipe,
					'no_seri'			=> $no_seri,
					'instalasi'			=> $instalasi,
					'ruangan'			=> $ruangan,
					'lokasi'			=> $lokasi,
					'kondisi_alat'		=> $kondisi_alat,
					'level_resiko'		=> $level_resiko,
					'keterangan'		=> $keterangan,
					'kepemilikan'		=> $kepemilikan,
					'supplier'			=> $supplier,
					'daya_listrik'		=> $daya_listrik,
					'status_alat'		=> $status_alat,
					'perlu_maintenance'	=> $perlu_maintenance,
					'perlu_kalibrasi'	=> $perlu_kalibrasi,
					'tahun_pengadaan'	=> $tahun_pengadaan,
					'sumber_dana'		=> $sumber_dana,
					'present_year'		=> $present_year,
					'expected_life_time'=> $expected_life_time,
					'harga_beli'		=> $harga_beli,
					'tgl_input'			=> $tgl_input,
					'user'				=> $user
			);
			
			$this->m_aset->input('tb_alat', $data);
			$notif = array(
					'title' 	=> 'Berhasil, Data Aset Telah di Input.', 
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
		
		$this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
		$this->form_validation->set_rules('kategori_alat', 'Kategori Alat', 'required');
		$this->form_validation->set_rules('merk', 'Nama Merk', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('no_seri', 'No Seri', 'required');
		$this->form_validation->set_rules('instalasi', 'Instalasi', 'required');
		$this->form_validation->set_rules('ruangan','Ruangan', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('kondisi_alat', 'Kondisi Alat', 'required');
		$this->form_validation->set_rules('level_resiko', 'Level Resiko', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('kepemilikan', 'Kepemilikan', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('daya_listrik', 'Daya Listrik', 'required');
		$this->form_validation->set_rules('status_alat', 'Status alat', 'required');
		$this->form_validation->set_rules('perlu_maintenance', 'Perlu Maintenance', 'required');
		$this->form_validation->set_rules('perlu_kalibrasi', 'Perlu Kalibrasi', 'required');
		
		$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'required');
		$this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'required');
		$this->form_validation->set_rules('present_year', 'Present Year', 'required');
		$this->form_validation->set_rules('expected_life_time', 'Life Time', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
		
		$nama_alat			= $this->input->post('nama_alat');
		$kategori_alat			= $this->input->post('kategori_alat');
		$merk				= $this->input->post('merk');
		$tipe				= $this->input->post('tipe');
		$no_seri			= $this->input->post('no_seri');
		$instalasi			= $this->input->post('instalasi');
		$ruangan			= $this->input->post('ruangan');
		$lokasi				= $this->input->post('lokasi');
		$kondisi_alat		= $this->input->post('kondisi_alat');
		$level_resiko		= $this->input->post('level_resiko');
		$keterangan			= $this->input->post('keterangan');
		$kepemilikan		= $this->input->post('kepemilikan');
		$supplier			= $this->input->post('supplier');
		$daya_listrik		= $this->input->post('daya_listrik');
		$status_alat		= $this->input->post('status_alat');
		$perlu_maintenance	= $this->input->post('perlu_maintenance');
		$perlu_kalibrasi	= $this->input->post('perlu_kalibrasi');
		$tahun_pengadaan	= $this->input->post('tahun_pengadaan');
		$sumber_dana		= $this->input->post('sumber_dana');
		$present_year		= $this->input->post('present_year');
		$expected_life_time	= $this->input->post('expected_life_time');
		$harga_beli			= $this->input->post('harga_beli');
		
		if($this->form_validation->run() == true){
			$data = array(
					'nama_alat'			=> $nama_alat,
					'kategori_alat'		=> $kategori_alat,
					'merk'				=> $merk,
					'tipe'				=> $tipe,
					'no_seri'			=> $no_seri,
					'instalasi'			=> $instalasi,
					'ruangan'			=> $ruangan,
					'lokasi'			=> $lokasi,
					'kondisi_alat'		=> $kondisi_alat,
					'level_resiko'		=> $level_resiko,
					'keterangan'		=> $keterangan,
					'kepemilikan'		=> $kepemilikan,
					'supplier'			=> $supplier,
					'daya_listrik'		=> $daya_listrik,
					'status_alat'		=> $status_alat,
					'perlu_maintenance'	=> $perlu_maintenance,
					'perlu_kalibrasi'	=> $perlu_kalibrasi,
					'tahun_pengadaan'	=> $tahun_pengadaan,
					'sumber_dana'		=> $sumber_dana,
					'present_year'		=> $present_year,
					'expected_life_time'=> $expected_life_time,
					'harga_beli'		=> $harga_beli
			);
			
			$this->datamapper->update('tb_alat', 'id_alat', $id_alat, $data);
			$notif = array(
					'title' 	=> 'Berhasil, Data Aset Telah di Input.', 
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
}
