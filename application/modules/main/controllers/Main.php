<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller{

	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_login');

	}

	function index()
	{
		$logged_in = $this->auth->is_logged();
		if($logged_in == FALSE)
		{
			redirect('main/login');	
//			$this->load->view('login2');
		}else
			{
				$this->auth->routes();
			}
	}
	
	function login()
	{
		$this->auth->is_logged_in();
		$this->load->view('login2');
//		$this->load->view('login');
	}
	
	function profile()
	{
		$data['title']	= 'My Profile';
		$data['view']	= 'profile';
		$data['user']	= $this->datamapper->getAllById('tb_login', 'id', $this->session->userdata('id'));
		$this->load->view('templates_backend',$data);	
	}
	
	function update()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('username', 'Username', 'required');		
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		
		$id					= $this->input->post('id');	
		$username			= $this->input->post('username');	
		$nama_lengkap		= $this->input->post('nama_lengkap');
		$group				= $this->input->post('group');
		$email				= $this->input->post('email');
		$no_hp				= $this->input->post('no_hp');
		$alamat				= $this->input->post('alamat');
		$status				= $this->input->post('status');

		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'username'			=> $username,
				'nama_lengkap'		=> $nama_lengkap,
				'group'				=> $group,
				'email'				=> $email,
				'no_hp'				=> $no_hp,
				'alamat'			=> $alamat,
				'status'			=> $status	
				);

		$this->m_user->update('tb_login', 'id', $id, $data);
		
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

	function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');	
		
		$cekAkun 		= $this->auth->checkAkun($username, $password);
		$cekUsername 	= $cekAkun[0];
		$cekPass		= $cekAkun[1];
		
		if($cekUsername == FALSE)
			{
				$output = array(
				'message' => "<div class='alert alert-danger'><i class='glyph-icon icon-exclamation-triangle'></i> <b>Error!</b> Akun anda Belum Terdaftar.</div>",
				'status' => 0
				);
				echo json_encode($output);		
			
			}else if($cekUsername == TRUE && $cekPass == FALSE)
				{
					$output = array(
					'message' => "<div class='alert alert-danger'><i class='glyph-icon icon-exclamation-triangle'></i> <b>Error!</b> Password Anda Salah.</div>",
					'status' => 0
					);
					echo json_encode($output);
				
				}else if($cekUsername == TRUE && $cekPass == TRUE)
					{
						$usersData = $this->userslib->getUsersData("SELECT tb_login.id, tb_login.group FROM tb_login WHERE tb_login.username = '$username'");
						$id = $usersData->id;
						$jabatan = $usersData->group;
						$udata = array('id'=>$id, 'jabatan'=>$jabatan);
						$this->session->set_userdata($udata);
						
						$output = array(
									'message' => "<div class='alert alert-danger'><i class='glyph-icon icon-check'></i> <b>Sukses!</b> Login Berhasil...</div>",
									'link' => base_url()."main",
									'status' => 1
								);
						echo json_encode($output);
						
							
					}
	}
	
	function logout()
	{
		/*$data = array(
			'id' => ''
		);
		$this->session->set_userdata($data);
		$this->session->unset_userdata($data);*/
		$this->session->sess_destroy();
        redirect();
	}
	
	function grafik_kunjungan()
	{
		$data = $this->partolibs->grafik_kunjungan();
		
		echo json_encode($data);
	}
	
	function grafik_resti_normal()
	{
		$data = $this->partolibs->jenis_pasien();
		
		$label = array(array('label' =>'Resti', 'value' => $data['resti']), array('label' =>'Normal', 'value' => $data['normal'])  );
		
		echo json_encode($label);
	}
	
	function grafik_jenis_pasien_bulan()
	{
		$data = $this->partolibs->jenis_pasien_bulan();
		
		//$label = array(array('label' =>'Resti', 'value' => $data['resti']), array('label' =>'Normal', 'value' => $data['normal'])  );
		
		echo json_encode($data);
	}
	
	/*function resetPass()
	{
		$email = $this->input->post('email');
		$tgl_input = date("Y-m-d h:i:s");
		
		$cekEmail = $this->auth->cekEmail($email);
		if($cekEmail == TRUE)
		{
			$id_reset = $this->utilities->keyHash(20);
			$data = array('id_reset' => $id_reset, 'email' => $email, 'tgl_input' => $tgl_input);
			$key = 'http://appdev.pojokdunia.com/distribusi_sepatu/main/do_resetPass?key='.$id_reset.'';
			$dataEmail = array('id_reset' => $key);
			$this->utilities->sendmail($email, 'admin@pojokdunia.com', 'Pojok Dunia Aplication Developer', 'Reset Password', 'email/reset_pass', $dataEmail);
			$this->datamapper->insert('tb_reset', $data);
			$this->utilities->notification('success', 'Selamat, Reset Password anda telah dikirim ke sistem, untuk Link Reset Password dapat dilihat pada kotak inbox/spam email anda.');
			redirect('main/login');
		}else
			{
				$this->utilities->notification('danger', 'Maaf, Pastikan Email anda sudah terdaftar pada sistem.');
				redirect('main/login');
			}
		
	}
	
	function do_resetPass()
	{
		$id_reset = $_GET['key'];
		$cekKey = $this->auth->cekKey($id_reset);
		if($cekKey == TRUE)
		{
			$data['key'] = $id_reset;
			$this->load->view('reset_password', $data); 
		}else
			{
				$this->utilities->notification('danger', 'Maaf, Pastikan Key Anda Benar.');
				redirect('main/login');	
			}
	}
	
	function save_resetPass()
	{
		$pass = $this->input->post('password');
		$encPass = md5($pass);
		$key = $this->input->post('key');
		$email = $this->datamapper->rowData('tb_reset', 'email', 'id_reset', $key);
		$data = array('password' => $encPass);
		$this->datamapper->update('tb_login', 'email', $email, $data);
		$this->utilities->notification('success', 'Selamat, Password anda telah di ubah, silahkan login !!.');
		redirect('main/login');
	}*/
}