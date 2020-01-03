<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Tindakan extends MX_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
//		$this->load->model('m_tindakan');
		
	}
	
	public function index() {
		$data['title'] 			= 'Tindakan Pasien';
		$data['view'] 			= 'list_tindakan';
		//$data['tindakan'] 		= $this->m_tindakan->get_tindakan();
		$this->load->view('templates_backend',$data);
	}
	
	public function input($id_registrasi = '', $no_rm ='') 
	{
		if(($id_registrasi) && ($no_rm))
		{
			$data['title'] 			= 'Input Tindakan Pasien';
			$data['view'] 			= 'input_tindakan';
			$data['id_regis'] 			= $id_registrasi;
			$data['no_cm'] 			= $no_rm;
			//$data['id_tindakan'] 	= $this->mrclibs->kd_tindakan();
			$data['tindakan'] 		= $this->m_tindakan->get_data_reg($id_registrasi);
			$data['item_dokter'] 	= $this->datamapper->query2("SELECT * FROM vw_tindakan_item_tmp WHERE id_registrasi = '$id_registrasi' AND id_tindakan_jenis = '1'");
			$data['item_fisio'] 	= $this->datamapper->query2("SELECT * FROM vw_tindakan_item_tmp WHERE id_registrasi = '$id_registrasi' AND id_tindakan_jenis = '2'");
			$data['get_detail'] 	= $this->m_tindakan->getPasien($id_registrasi);
			$this->load->view('templates_backend',$data);
		}
		else
		{
			show_404();
		}
		
	}
	
	public function save_tindakan($id_registrasi = '', $no_rm ='') 
	{
		
		if(($id_registrasi) && ($no_rm))
		{
			$tgl_input				= date("Y-m-d H:i:s");
			$id_tindakan 			= $this->mrclibs->kd_tindakan();
			$data_tindakan_item 	= $this->datamapper->query2("SELECT * FROM tb_tindakan_item_tmp WHERE id_registrasi = '$id_registrasi'");
			foreach($data_tindakan_item as $dti)
			{
				$data_tnd = array(
						'id_registrasi'			=> $id_registrasi,
						'id_tindakan'			=> $id_tindakan,
						'id_tindakan_item'		=> $dti->id_tindakan_item,
						'id_tindakan_jenis'		=> $dti->id_tindakan_jenis,
						'id_tindakan_master'	=> $dti->id_tindakan_master,
						'id_petugas'			=> $dti->id_petugas,
						'tgl_input'				=> $dti->tgl_input,
						'status'				=> '1',
						'id_user'				=> $dti->id_user

						); 
		
				$this->datamapper->insert('tb_tindakan_item',$data_tnd);
			}
			
			$data_trx = array(
						'id_transaksi'			=> $this->mrclibs->kd_transaksi(),
						'id_registrasi'			=> $id_registrasi,
						'id_tindakan'			=> $id_tindakan,
						'tgl_input'				=> $tgl_input,
						'tgl_transaksi'			=> $tgl_input,
						'id_user'				=> $this->session->userdata('id')
						); 
			
			$data_tb_tindakan = array(
						'id_registrasi'			=> $id_registrasi,
						'id_tindakan'			=> $id_tindakan,
						'tgl_input'				=> $tgl_input,
						'tgl_tindakan'			=> $tgl_input,
						'no_rm'					=> $no_rm,
						'id_user'				=> $this->session->userdata('id')
						);
			
			$data_tb_reg = array(
						'status'				=> '1'
						);
			$this->datamapper->insert('tb_tindakan',$data_tb_tindakan);
			$this->datamapper->insert('tb_transaksi',$data_trx);
			$this->datamapper->delete('tb_tindakan_item_tmp', 'id_registrasi', $id_registrasi);
			$this->datamapper->update('tb_registrasi', 'id_registrasi', $id_registrasi, $data_tb_reg);
			redirect('tindakan');
		}
		else
		{
			show_404();
		}
		
	}
	
	public function push_tindakan_item() 
	{
		$id_registrasi = $this->input->post('idreg');
		$id_tindakan_item = $this->mrclibs->kd_tindakan_item();
		$tindakan_dokter = $this->input->post('tindakan_dokter');
		$tindakan_fisio = $this->input->post('tindakan_fisio');
		$petugas_dokter = $this->input->post('petugas_dokter');
		$petugas_fisio = $this->input->post('petugas_fisio');
		$tgl_input				= date("Y-m-d H:i:s");
		$return_data = '';
		if(!empty($id_registrasi))
		{
			
			// ADA DATA TINDAKAN DOKTER DAN FISIO //
			if(!empty($tindakan_dokter) && !empty($tindakan_fisio))
			{
				$status = 0;
				$title = 'Mohon Pilih data Tindakan Dengan Benar';
				$message = 'Failed';
			}
			
			//ADA DATA TINDAKAN DOKTER TAPI TIDAK ADA TINDAKAN FISIO
			if(!empty($tindakan_dokter) && empty($tindakan_fisio))
			{
				if(empty($petugas_dokter))
				{
					$status = 0;
					$title = 'Mohon Pilih Petugas Dokter';
					$message = 'Failed';
				}
				else
				{
					$data_tindakan_master = $this->datamapper->getRow("tb_tindakan_master", 'id_tindakan_master', $tindakan_dokter);
					$data_petugas_dokter = $this->datamapper->rowData("tb_petugas", 'nama_petugas', 'id_petugas', $petugas_dokter);
					foreach($data_tindakan_master as $dtm)
					{


						$return_data[] = '<tr id="'.$id_tindakan_item.'">
											<td class="d-none id_tdm_dokter">
												'.$dtm->id_tindakan_master.'
											</td>
											<td>
												<strong>'.$dtm->nama_tindakan.'</strong>
											</td>
											<td>
												'.$data_petugas_dokter.'
											</td>
											<td class="harga_td">'.$dtm->harga_tindakan.'</td>
											<td class="text-center">
													<button type="button" class="btn btn-danger btn-icon legitRipple" onclick="delItem(\''.$id_tindakan_item.'\')"><i class="icon-trash"></i></button>
											</td>
										</tr>
										';
					}
					
					$data_dok = array(
						'id_registrasi'			=> $id_registrasi,
						'id_tindakan_item'		=> $id_tindakan_item,
						'id_tindakan_jenis'		=> '1',
						'id_tindakan_master'	=> $tindakan_dokter,
						'id_petugas'			=> $petugas_dokter,
						'tgl_input'				=> $tgl_input,
						'id_user'				=> $this->session->userdata('id')

						); 
		
					$this->datamapper->insert('tb_tindakan_item_tmp',$data_dok);
					$status = 1;
					$title = 'Data Tindakan Dokter Telah Diinput';
					$message = 'Success';
					
				}
				
				
				
				
			}
			
			//TIDAK ADA DATA TINDAKAN DOKTER TAPI ADA TINDAKAN FISIO
			if(empty($tindakan_dokter) && !empty($tindakan_fisio))
			{
				if(empty($petugas_fisio))
				{
					$status = 0;
					$title = 'Mohon Pilih Petugas Fisio';
					$message = 'Failed';
				}
				else
				{
					$data_tindakan_master = $this->datamapper->getRow("tb_tindakan_master", 'id_tindakan_master', $tindakan_fisio);
					$data_petugas_fisio = $this->datamapper->rowData("tb_petugas", 'nama_petugas', 'id_petugas', $petugas_fisio);
					foreach($data_tindakan_master as $dtf)
					{

						$return_data[] = '<tr id="'.$id_tindakan_item.'">
											<td class="d-none id_tdm_fisio">
												'.$dtf->id_tindakan_master.'
											</td>
											<td>
												<strong>'.$dtf->nama_tindakan.'</strong>
											</td>
											<td>
												'.$data_petugas_fisio.'
											</td>
											<td class="harga_tf">'.$dtf->harga_tindakan.'</td>
											<td class="text-center">
													<button type="button" class="btn btn-danger btn-icon legitRipple" onclick="delItem(\''.$id_tindakan_item.'\')"><i class="icon-trash"></i></button>
											</td>
										</tr>
										';
					}

					$data_fisio = array(
							'id_registrasi'			=> $id_registrasi,
							'id_tindakan_item'		=> $id_tindakan_item,
							'id_tindakan_jenis'		=> '2',
							'id_tindakan_master'	=> $tindakan_fisio,
							'id_petugas'			=> $petugas_fisio,
							'tgl_input'				=> $tgl_input,
							'id_user'				=> $this->session->userdata('id')

							); 

					$this->datamapper->insert('tb_tindakan_item_tmp', $data_fisio);
					$status = 1;
					$title = 'Data Tindakan Fisio Telah Diinput';
					$message = 'Success';
				//echo json_encode($return_dataf);
				}
			}
			
			//TIDAK AA DATA DI KEDUANYA
			if(empty($tindakan_dokter) && empty($tindakan_fisio))
			{
				$status = 0;
				$title = 'Mohon Pilih Tindakan Terlebih Dahulu';
				$message = 'Failed';
			}
			
			$result = array(
							'title' => $title, 
							'message' => $message, 
							'status' => $status,
							'data_tind' => $return_data

						);

			echo json_encode($result);
		}
		else
		{
			show_404();
		}
		
	}
	
	public function save_tindakan_item() 
	{
		$id_tindakan = $this->input->post('id_tindakan');
		$id_registrasi = $this->input->post('idreg');
		$tindakan_dokter = $this->input->post('tindakan_dokter');
		$tindakan_fisio = $this->input->post('tindakan_fisio');
		if(!empty($id_tindakan))
		{
			// ADA DATA TINDAKAN DOKTER DAN FISIO //
			if(!empty($tindakan_dokter) && !empty($tindakan_fisio))
			{
				
			}
			
			//ADA DATA TINDAKAN DOKTER TAPI TIDAK ADA TINDAKAN FISIO
			if(!empty($tindakan_dokter) && empty($tindakan_fisio))
			{
				$pecah_td = explode(",",$tindakan_dokter);
				$c_ptd = count($pecah_td);
				for($i=0; $c_ptd > $i; $i++)
				{
					$rtd[] = $this->datamapper->getRow("");
				}
			}
			
			//TIDAK ADA DATA TINDAKAN DOKTER TAPI ADA TINDAKAN FISIO
			if(empty($tindakan_dokter) && !empty($tindakan_fisio))
			{
				
			}
			
			//TIDAK AA DATA DI KEDUANYA
			if(empty($tindakan_dokter) && empty($tindakan_fisio))
			{
				
			}
		}
		else
		{
			show_404();
		}
		
	}
	
	function detail($id_pasien)
	{
		/*$data['title'] 				= 'Input Tindakan Pasien';
		$data['view'] 				= 'input_tindakan';
		$data['detail_tindakan'] 	= $this->datamapper->getAllById('tb_tindakan_pasien', 'id_pasien', $id_pasien);
		$this->load->view('backend/core',$data);*/
		redirect('tindakan');
	}
	
	function delete($id_pasien)
	{
		/*$data['title'] 				= 'Input Tindakan Pasien';
		$data['view'] 				= 'input_tindakan';
		$data['detail_tindakan'] 	= $this->datamapper->getAllById('tb_tindakan_pasien', 'id_pasien', $id_pasien);
		$this->load->view('backend/core',$data);*/
		redirect('tindakan');
	}
	
	function push_delete_item()
	{
		$id_tindakan_item = $this->input->post('id_tindakan_item');
		$this->datamapper->delete('tb_tindakan_item_tmp', 'id_tindakan_item', $id_tindakan_item);
		$result = array(
							'title' => 'Item Tindakan Anda Telah Dihapus', 
							'message' => 'success', 
							'status' => 1

						);
		echo json_encode($result);
		
	}
	
	
}