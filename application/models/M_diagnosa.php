<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_diagnosa extends CI_Model
{
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
		$this->dbsms = $CI->load->database('sms_gateway',TRUE);
    }
	
	function getDiagnosaDetail($id_diagnosa)
	{
		$this->db->where('id_diagnosa', $id_diagnosa);
		$data = $this->db->get('tb_diagnosa');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}else
		{
			return FALSE;
		}
	}
	
	function input_jadwal_kontrol($no_registrasi, $id_diagnosa, $tgl_kontrol)
	{
		$CI =& get_instance();
		$tgl_input		= date('Y-m-d h:i:s');
		$q_pasien = $this->db->query("SELECT
										tb_data_pasien.nama_pasien,
										tb_data_pasien.no_tlp,
										tb_registrasi.id_pasien,
										tb_registrasi.no_registrasi
										FROM
										tb_registrasi
										INNER JOIN tb_data_pasien ON tb_registrasi.id_pasien = tb_data_pasien.id_pasien
										WHERE tb_registrasi.no_registrasi = '$no_registrasi'
									");
		$d_pasien = $q_pasien->row();
		
		$data_kontrol = array(
								'no_registrasi' => $no_registrasi,
								'id_diagnosa' => $id_diagnosa,
								'tgl_kontrol' => $tgl_kontrol,
								'tgl_input' => $tgl_input
							);
		
		$data_sms = array(
							'DestinationNumber' => $d_pasien->no_tlp, 
							'TextDecoded' => 'Kepada Ibu '.$d_pasien->nama_pasien.' Harap Melakukan Kontrol Kandungan pada Tanggal '.$CI->utilities->tanggal($tgl_kontrol).'', 
							'CreatorID' => 'SIPIA RSU'//,
							//'SendingDateTime' => $tgl_kontrol
						);
		
		$this->db->insert('tb_kontrol', $data_kontrol);
		$this->dbsms->insert('outbox', $data_sms);
		
		return TRUE;
		
	}
	
}