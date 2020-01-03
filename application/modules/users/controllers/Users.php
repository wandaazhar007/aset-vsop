<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Users extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_user');
		
	}
	
	public function index() {
		$data['title'] = 'Data User Login';
		$data['view'] = 'list_user';
		$data['user'] = $this->m_user->get_user();
		$this->load->view('templates_backend',$data);
	}
	
	public function detail($id) {
		$data['title']	= 'Detail User Login';
		$data['view']	= 'detail_user';
		$data['user']	= $this->datamapper->getAllById('tb_login', 'id', $id);
		$this->load->view('templates_backend',$data);
	}
	
	function save()
	{
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		//$this->form_validation->set_rules('id_petugas_jenis', 'Jenis Petugas Medis', '');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		
		$username			= $this->input->post('username');	
		$password			= $this->input->post('password');
		$nama_lengkap		= $this->input->post('nama_lengkap');
		$group				= $this->input->post('group');
		//$id_puskesmas		= $this->input->post('id_puskesmas');	
		$email				= $this->input->post('email');
		$no_hp				= $this->input->post('no_hp');
		$alamat				= $this->input->post('alamat');
		$foto				= $this->input->post('foto');
		//$status				= $this->input->post('status');
		$tgl_input			= date('Y-m-d h:i:s');
		
		
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'username'			=> $username,
				'password'			=> md5($password),
				'nama_lengkap'		=> $nama_lengkap,
				'group'				=> $group,
				//'id_puskesmas'		=> $id_puskesmas,
				'email'				=> $email,
				'no_hp'				=> $no_hp,
				'alamat'			=> $alamat,
				'foto'				=> $foto,
				'tgl_input'			=> $tgl_input
				//'status'			=> $status	
				);

		$this->m_user->input($data, 'tb_login');
		
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
		$upload1				= $this->input->post('foto');
		$status				= $this->input->post('status');
		
		if(!empty($_FILES['foto']['name']))
			{
				$do_upload1 = $this->utilities->uploadFile('foto', 'assets/images/profil_users', 'jpg', 512000, $id);
				if($do_upload1['status'] == FALSE)
					{
						$this->utilities->notification('danger', 'Gagal Melakukan Upload Foto');	
						redirect(''.$_SERVER['HTTP_REFERER'].'');
//						return $do_upload1;
					}
					else
					{
						$upload1 = $do_upload1['filename'];
					}
			}else
				{
					if(!empty($id))
					{	
						$upload1 = $this->datamapper->rowData('tb_login', 'foto', 'id', $id);
					}else
						{
							$upload1 = '';
						}
				}
		
		if(!empty($id))
		{
			$data2 = array(
					'foto'	=> $upload1
			);
		}

		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'username'			=> $username,
				'nama_lengkap'		=> $nama_lengkap,
				'group'				=> $group,
				'email'				=> $email,
				'no_hp'				=> $no_hp,
				'alamat'			=> $alamat,
				'foto'				=> $upload1,
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
	
	
	function delete($id)
	{
		$this->auth->adminRestrict();
		$data = array(
						'trash' => '1'
					);	
		$this->datamapper->update('tb_login', 'id', $id, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('users');
	}
	
	function changepass($id)
	{
		$data['title'] = 'Change Password';
		$data['view'] = 'change_pass';
		$data['login'] = $this->datamapper->getRow('tb_login', 'id', $id);
		$this->load->view('templates_backend', $data);
	}
	
	function savepass($id)
	{
		$password = $this->input->post('password');	
		
		$data = array(
						'password' => md5($password)
					);	
		$this->datamapper->update('tb_login', 'id', $id, $data);
		$this->utilities->notification('success', 'Password Anda telah dirubah');
		redirect('users');
	}
}