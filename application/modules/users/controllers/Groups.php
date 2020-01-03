<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Groups extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_user');
		
	}
	
	public function index() {
		$data['title'] = 'Data Group Jabatan';
		$data['view'] = 'list_group';
		$data['group'] = $this->m_user->get_group();
		$this->load->view('templates_backend',$data);
	}
	
	public function detail($id_group) {
		$data['title'] = 'Detail Group Jabatan';
		$data['view'] = 'detail_group';
		$data['group'] = $this->datamapper->getAllById('tb_group', 'id_group', $id_group);
		$this->load->view('templates_backend',$data);
	}
	
	function save()
	{
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('nama_group', 'Nama Group', 'required');
		
		$nama_group			= $this->input->post('nama_group');
		$tgl_input			= date('Y-m-d h:i:s');
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'nama_group'	=> $nama_group,
				'tgl_input'		=> $tgl_input
				);

		$this->m_user->input($data, 'tb_group');
		
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
		
		$this->form_validation->set_rules('nama_group', 'Nama Group', 'required');
		
		$id_group			= $this->input->post('id_group');
		$nama_group			= $this->input->post('nama_group');
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'nama_group'	=> $nama_group
				);

		$this->m_user->update('tb_group', 'id_group', $id_group, $data);
		
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
		$this->datamapper->update('tb_group', 'id_group', $id, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('users/groups');
	}
}
?>