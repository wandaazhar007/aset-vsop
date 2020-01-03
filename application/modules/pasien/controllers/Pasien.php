<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Pasien extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->auth->adminRestrict();
		$this->load->helper('text');
		$this->load->model('m_pasien');
		
	}
	
	public function index() {
		$data['title'] = 'Data Pasien';
		$data['view'] = 'list_pasien';
		$data['pasien'] = $this->m_pasien->get_pasien();
		$this->load->view('templates_backend',$data);
	}
	
	public function detail($id_pasien) {
		$data['title']	= 'Detail Pasien';
		$data['view']	= 'detail_pasien';
		$data['pasien']	= $this->m_pasien->getById($id_pasien);
		$this->load->view('templates_backend',$data);
	}
	
	function update()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('no_rm', 'No RM', 'required');
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');		
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pasien', 'required');
		
		$id_pasien			= $this->input->post('id_pasien');	
		$no_rm				= $this->input->post('no_rm');
		$nama_pasien		= $this->input->post('nama_pasien');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$nik				= $this->input->post('nik');
		$tanggal_lahir		= $this->input->post('tanggal_lahir');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$email				= $this->input->post('email');
		$no_hp				= $this->input->post('no_hp');
		$alamat				= $this->input->post('alamat');
		
		
		if ($this->form_validation->run() == TRUE) {
		
		$data = array(	
				'no_rm'				=> $no_rm,
				'nama_pasien'		=> $nama_pasien,
				'jenis_kelamin'		=> $jenis_kelamin,
				'nik'				=> $nik,
				'tanggal_lahir'		=> $tanggal_lahir,
				'tempat_lahir'		=> $tempat_lahir,
				'email'				=> $email,
				'no_hp'				=> $no_hp,
				'alamat'			=> $alamat	
				);

		$this->m_pasien->update('tb_pasien', 'id_pasien', $id_pasien, $data);
		
		$notif = array(
						'title' => 'Berhasil, Data Anda Telah di Update !!!', 
						'message' => 'Success', 
						'status' => 1,
						'redirect' => ''.base_url().'pasien'
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
	
	function delete($id_pasien)
	{
		$this->auth->adminRestrict();
		$data = array(
						'trash' => '1'
					);	
		$this->m_pasien->update('tb_pasien', 'id_pasien', $id_pasien, $data);
		$this->utilities->notification('success', 'Data Anda Telah di Hapus');
		redirect('pasien');
	}
	
	function get_pasien_result()
	{
		$pasienData = $this->input->post('pasienData');
		if(isset($pasienData) and !empty($pasienData))
		{
			$records = $this->m_pasien->get_search_pasien($pasienData);
			$output = '';
			
			foreach($records->result_array() as $row)
			{
				$output .= '
				<form role="form" action="#" method="post" id="form-update">
                    <div class="form-body">
						<div class="form-group hide">
							<div class="col-sm-9">
								<input type="text" name="id_pasien" id="id_pasien" value="'.$row['id_pasien'].'" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<div class="input-group">
									<label class="col-form-label" for="no_rm">RM</label>
									<input type="text" class="form-control" name="no_rm" id="no_rm" value="'.$row['no_rm'].'" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-6">
 	                            	<label class="col-form-label">Nama Pasien</label>
    	                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="'.$row['nama_pasien'].'" >
								</div>
                            </div>
                        </div>
						</br>
                        <div class="row">
                        	<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">NIK</label>
                                    <input type="number" class="form-control" name="nik" id="nik" value="'.$row['nik'].'" >
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="'.$row['jenis_kelamin'].'">'.$row['jenis_kelamin'].'</option>
                                        <option value="">-----------</option>
										<option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="'.$row['tempat_lahir'].'">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="'.$row['tanggal_lahir'].'" >
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Email</label>
									<input type="text" class="form-control" name="email" id="email" value="'.$row['email'].'" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">No Handphone</label>
									<input type="number" class="form-control" name="no_hp" id="no_hp" value="'.$row['no_hp'].'">
								</div>
							</div>
						</div>
					
						<div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="col-form-label">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat" id="alamat">'.$row['alamat'].'</textarea>
                                </div>
                            </div>
                        </div>
						
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary mr-2" id="update-pasien">Update</button>
                            <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Kembali</button>
                        </div>
                    </div>
                </form>
				
				';
				}
			echo $output;
		}else{
			echo 'not found';
		}
	}
	
}
?>