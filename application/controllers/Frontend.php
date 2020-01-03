<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	
	public function index()
	{
		$data['contents'] = 'main';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function menu_pendaftaran()
	{
		$data['contents'] = 'menu_pendaftaran';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function reg_skdu()
	{
		$data['contents'] = 'reg_skdu';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function reg_imb()
	{
		$data['contents'] = 'reg_imb';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function reg_skpw()
	{
		$data['contents'] = 'reg_skpw';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function reg_sksk()
	{
		$data['contents'] = 'reg_sksk';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function reg_skck()
	{
		$data['contents'] = 'reg_skck';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function sambutan()
	{
		$data['contents'] = 'sambutan';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function strukturorganisasi()
	{
		$data['contents'] = 'strukturorganisasi';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function visimisi()
	{
		$data['contents'] = 'visimisi';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function jenislayanan()
	{
		$data['contents'] = 'jenislayanan';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function maklumat()
	{
		$data['contents'] = 'maklumat';
		$this->load->view('frontend/template/core', $data);
	}
	
	public function galeri()
	{
		$data['contents'] = 'galeri';
		$this->load->view('frontend/template/core', $data);
	}
	
	function save_skdu()
	{
		$id_reg_skdu = $this->input->post('id_reg_skdu');
		$nik = $this->input->post('nik');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$klasifikasi_usaha = $this->input->post('klasifikasi_usaha');
		$alamat_usaha = $this->input->post('alamat_usaha');
		$kelurahan = $this->input->post('kelurahan');
		$nama_usaha = $this->input->post('nama_usaha');
		$jenis_usaha = $this->input->post('jenis_usaha');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$no_telpon = $this->input->post('no_telpon');
		$email = $this->input->post('email');
		$tgl_input =  date('Y-m-d h:i:s');
		
		
				$id_reg_skdu = $this->siterbanglibs->keyHash(8);
				$data = array(
								'id_reg_skdu' => $id_reg_skdu,
								'nik' => $nik,
								'nama_pemohon' => $nama_pemohon,
								'tempat_lahir' => $tempat_lahir,
								'tgl_lahir' => $tgl_lahir,
								'alamat' => $alamat,
								'jenis_kelamin' => $jenis_kelamin,
								'klasifikasi_usaha' => $klasifikasi_usaha,
								'alamat_usaha' => $alamat_usaha,
								'kelurahan' => $kelurahan,
								'nama_usaha' => $nama_usaha,
								'jenis_usaha' => $jenis_usaha,
								'nama_pengurus' => $nama_pengurus,
								'no_telpon' => $no_telpon,
								'email' => $email,
								'tgl_input' => $tgl_input
								
							);
							
					
				$this->datamapper->insert('tb_reg_skdu', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
			
		redirect('frontend/menu_pendaftaran');	
	}
	
	function save_imb()
	{
		$id_reg_imb = $this->input->post('id_reg_imb');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$RT = $this->input->post('RT');
		$RW = $this->input->post('RW');
		$kelurahan = $this->input->post('kelurahan');
		$no_telpon = $this->input->post('no_telpon');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$tgl_input =  date('Y-m-d h:i:s');
		
		
				$id_reg_imb = $this->siterbanglibs->keyHash(8);
				$data = array(
								'id_reg_imb' => $id_reg_imb,
								'nama_pemohon' => $nama_pemohon,
								'tgl_lahir' => $tgl_lahir,
								'jenis_kelamin' => $jenis_kelamin,
								'alamat' => $alamat,
								'RT' => $RT,
								'RW' => $RW,
								'kelurahan' => $kelurahan,
								'no_telpon' => $no_telpon,
								'nama_pengurus' => $nama_pengurus,
								'tgl_input' => $tgl_input
								
							);
							
					
				$this->datamapper->insert('tb_reg_imb', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
			
		redirect('frontend/menu_pendaftaran');	
	}
	
}
