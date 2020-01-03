<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_pendaftaran extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		
		if(empty($id_reg_skdu))
			{
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
			}
			else
			{
				$data = array(
								
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
								'email' => $email
								
							);	
				$this->datamapper->update('tb_reg_skdu', 'id_reg_skdu', $id_reg_skdu, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
			}
		redirect('frontend/menu_pendaftaran');	
	}
	
	function save_imb()
	{
		$id_reg_imb = $this->input->post('id_reg_imb');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$RT = $this->input->post('rt');
		$RW = $this->input->post('rw');
		$kelurahan = $this->input->post('kelurahan');
		$no_telpon = $this->input->post('no_telpon');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$tgl_input =  date('Y-m-d h:i:s');
		
		if(empty($id_reg_imb))
			{
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
			}
			else
			{
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
								'nama_pengurus' => $nama_pengurus
								
							);	
				$this->datamapper->update('tb_reg_imb', 'id_reg_imb', $id_reg_imb, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
			}
		redirect('frontend/menu_pendaftaran');	
	}
	
	function save_skpw()
	{
		$id_reg_skpw = $this->input->post('id_reg_skpw');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$kelurahan = $this->input->post('kelurahan');
		$no_telpon = $this->input->post('no_telpon');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$jumlah_waris = $this->input->post('jumlah_waris');
		$tgl_input =  date('Y-m-d h:i:s');
		
		if(empty($id_reg_skpw))
			{
				$id_reg_skpw = $this->siterbanglibs->keyHash(8);
				$data = array(
								'id_reg_skpw' => $id_reg_skpw,
								'nik' => $nik,
								'nama_pemohon' => $nama_pemohon,
								'tgl_lahir' => $tgl_lahir,
								'jenis_kelamin' => $jenis_kelamin,
								'alamat' => $alamat,
								'email' => $email,
								'tempat_lahir' => $tempat_lahir,
								'kelurahan' => $kelurahan,
								'no_telpon' => $no_telpon,
								'jumlah_waris' => $jumlah_waris,
								'nama_pengurus' => $nama_pengurus,
								'tgl_input' => $tgl_input
								
							);
							
					
				$this->datamapper->insert('tb_reg_skpw', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
			}
			else
			{
				$data = array(
								
								'id_reg_skpw' => $id_reg_skpw,
								'nik' => $nik,
								'nama_pemohon' => $nama_pemohon,
								'tgl_lahir' => $tgl_lahir,
								'jenis_kelamin' => $jenis_kelamin,
								'alamat' => $alamat,
								'email' => $email,
								'tempat_lahir' => $tempat_lahir,
								'kelurahan' => $kelurahan,
								'no_telpon' => $no_telpon,
								'jumlah_waris' => $jumlah_waris,
								'nama_pengurus' => $nama_pengurus
								
							);	
				$this->datamapper->update('tb_reg_skpw', 'id_reg_skpw', $id_reg_skpw, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
			}
		redirect('frontend/menu_pendaftaran');	
	}
	
	
	function save_sdy()
	{
		$id_sdy = $this->input->post('id_sdy');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_telp');
		$kelurahan = $this->input->post('kelurahan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_sdy))
			{
				$id_sdy = $this->utilities->keyHash(8);
				$data = array(
								'id_sdy' 				=> $id_sdy,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_sdy', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
							);	
				
				$this->datamapper->update('tb_reg_sdy', 'id_sdy', $id_sdy, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	
	function save_ktp()
	{
		$id_ktp = $this->input->post('id_ktp');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
		$status = $this->input->post('status');
		$keperluan = $this->input->post('keperluan');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');        
		$kodepos = $this->input->post('kodepos');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_ktp))
			{
				$id_ktp = $this->utilities->keyHash(8);
				$data = array(
								'id_ktp' 				=> $id_ktp,
								'nik'					=> $nik,	
								'nama' 					=> $nama,
								'jenis_kelamin'			=> $jenis_kelamin,
								'tempat_lahir'			=> $tempat_lahir,
								'tgl_lahir'				=> $tgl_lahir,
								'agama'					=> $agama,
								'alamat'				=> $alamat,
								'email'					=> $email,
								'no_tlp'				=> $no_tlp,
								'keperluan'				=> $keperluan,
								'provinsi'				=> $provinsi,
								'kota'					=> $kota,
								'kecamatan'				=> $kecamatan,
								'kelurahan'				=> $kelurahan,        
								'kodepos'				=> $kodepos,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_ktp', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nik'					=> $nik,	
								'nama' 					=> $nama,
								'jenis_kelamin'			=> $jenis_kelamin,
								'tempat_lahir'			=> $tempat_lahir,
								'tgl_lahir'				=> $tgl_lahir,
								'agama'					=> $agama,
								'alamat'				=> $alamat,
								'email'					=> $email,
								'no_tlp'				=> $no_tlp,
								'keperluan'				=> $keperluan,
								'provinsi'				=> $provinsi,
								'kota'					=> $kota,
								'kecamatan'				=> $kecamatan,
								'kelurahan'				=> $kelurahan,        
								'kodepos'				=> $kodepos
							);	
				
				$this->datamapper->update('tb_reg_ktp', 'id_ktp', $id_ktp, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	function save_kk()
	{
		$id_kk = $this->input->post('id_kk');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$agama = $this->input->post('agama');
		$pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');
        $status_perkawinan = $this->input->post('status_perkawinan');
		$status_hub_dlm_kel = $this->input->post('status_hub_dlm_kel');
		$kewarganegaraan = $this->input->post('kewarganegaraan');
        $no_telp = $this->input->post('no_telp');
		$nama_ayah = $this->input->post('nama_ayah');
		$nama_ibu = $this->input->post('nama_ibu');
		$kelurahan = $this->input->post('kelurahan');        
		$keperluan = $this->input->post('keperluan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_kk))
			{
				$id_kk = $this->utilities->keyHash(8);
				$data = array(
								'id_kk' 				=> $id_kk,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'agama'					=> $agama,
								'pendidikan'			=> $pendidikan,
								'pekerjaan'				=> $pekerjaan,
								'status_perkawinan'		=> $status_perkawinan,
								'status_hub_dlm_kel'	=> $status_hub_dlm_kel,
								'kewarganegaraan'		=> $kewarganegaraan,
								'no_telp'				=> $no_telp,
								'nama_ayah'				=> $nama_ayah,
								'nama_ibu'				=> $nama_ibu,
								'kelurahan'				=> $kelurahan,        
								'keperluan'				=> $keperluan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_kk', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'agama'					=> $agama,
								'pendidikan'			=> $pendidikan,
								'pekerjaan'				=> $pekerjaan,
								'status_perkawinan'		=> $status_perkawinan,
								'status_hub_dlm_kel'	=> $status_hub_dlm_kel,
								'kewarganegaraan'		=> $kewarganegaraan,
								'no_telp'				=>	$no_telp,
								'nama_ayah'				=>	$nama_ayah,
								'nama_ibu'				=>	$nama_ibu,
								'kelurahan'				=>	$kelurahan,        
								'keperluan'				=>	$keperluan
							);	
				
				$this->datamapper->update('tb_reg_kk', 'id_kk', $id_kk, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	function save_sp()
	{
		$id_sp = $this->input->post('id_sp');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_telp');
		$kelurahan = $this->input->post('kelurahan');        
		$keperluan = $this->input->post('keperluan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_kk))
			{
				$id_sp = $this->utilities->keyHash(8);
				$data = array(
								'id_sp' 				=> $id_sp,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,        
								'keperluan'				=> $keperluan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_sp', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,        
								'keperluan'				=> $keperluan,
							);	
				
				$this->datamapper->update('tb_reg_sp', 'id_sp', $id_sp, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	function save_sksk()
	{
		$id_sksk = $this->input->post('id_sksk');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_telp');
		$kelurahan = $this->input->post('kelurahan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_sksk))
			{
				$id_sksk = $this->utilities->keyHash(8);
				$data = array(
								'id_sksk' 				=> $id_sksk,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_sksk', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
							);	
				
				$this->datamapper->update('tb_reg_sksk', 'id_sksk', $id_sksk, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	function save_skwna()
	{
		$id_skwna = $this->input->post('id_skwna');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_telp');
		$kelurahan = $this->input->post('kelurahan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_skwna))
			{
				$id_skwna = $this->utilities->keyHash(8);
				$data = array(
								'id_skwna' 				=> $id_skwna,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_skwna', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
							);	
				
				$this->datamapper->update('tb_reg_skwna', 'id_skwna', $id_skwna, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	
	function save_sktm()
	{
		$id_sktm = $this->input->post('id_sktm');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_telp');
		$kelurahan = $this->input->post('kelurahan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_sktm))
			{
				$id_sktm = $this->utilities->keyHash(8);
				$data = array(
								'id_sktm' 				=> $id_sktm,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_sktm', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
							);	
				
				$this->datamapper->update('tb_reg_sktm', 'id_sktm', $id_sktm, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
	
	function save_sdy()
	{
		$id_sdy = $this->input->post('id_sdy');
		$nama_pemohon = $this->input->post('nama_pemohon');
		$nik = $this->input->post('nik');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_telp');
		$kelurahan = $this->input->post('kelurahan');
		$status = $this->input->post('status');
		$tgl_input = date('Y-m-d h:i:s');
		
		if(empty($id_sdy))
			{
				$id_sdy = $this->utilities->keyHash(8);
				$data = array(
								'id_sdy' 				=> $id_sdy,
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
								'tgl_input' 			=> $tgl_input
								
							);
							
				$this->datamapper->insert('tb_reg_sdy', $data);
				$this->utilities->notification('success', 'Data Anda Telah di Input');
				redirect('frontend/menu_pendaftaran');
			}
			else
			{
				$data = array(
								'nama_pemohon' 			=> $nama_pemohon,
								'nik'					=> $nik,
								'jenis_kelamin'			=> $jenis_kelamin,
								'alamat'				=> $alamat,
								'tempat_lahir'			=> $tempat_lahir,
								'tanggal_lahir'			=> $tanggal_lahir,
								'no_telp'				=> $no_telp,
								'kelurahan'				=> $kelurahan,
							);	
				
				$this->datamapper->update('tb_reg_sdy', 'id_sdy', $id_sktm, $data);
				$this->utilities->notification('success', 'Data Anda Telah di Update');
				redirect('frontend/menu_pendaftaran');	
			}
	}
	
}