<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rawat_jalan extends CI_Model
{
	function get_rawat_jalan()
	{
		$pus = $this->session->userdata('puskesmas');
		$queryadd = "";
        if($pus != '99' && $pus != '98' )
        {
            $queryadd .= "  and tb_registrasi.puskesmas='".$pus."' ";
        }
		
		$data = $this->db->query("	SELECT
									tb_registrasi.no_registrasi,
									tb_registrasi.id_pasien,
									tb_registrasi.puskesmas,
									tb_registrasi.rm_puskesmas,
									tb_registrasi.rm_rsu,
									tb_registrasi.tgl_kunjungan,
									tb_registrasi.diagnosa,
									tb_registrasi.status,
									tb_data_pasien.nama_pasien,
									tb_data_pasien.alamat,
									tb_data_pasien.tanggal_lahir,
									tb_data_pasien.gol_darah,
									tb_registrasi.jaminan,
									tb_puskesmas.nama_puskesmas,
									tb_diagnosa.id_diagnosa
									FROM
									tb_registrasi
									INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
									INNER JOIN tb_data_pasien ON tb_registrasi.id_pasien = tb_data_pasien.id_pasien 
									LEFT JOIN tb_puskesmas ON tb_data_pasien.puskesmas = tb_puskesmas.id_puskesmas
									WHERE tb_registrasi.status = '1' AND tb_registrasi.trash = '0' ".$queryadd." 
									ORDER BY tb_registrasi.tgl_kunjungan ASC ");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
			{
				$result[] = $row;
			}
				return $result;
		}
	}
	
	function input($data, $table)
	{
		$this->db->insert($table, $data);
	}
	
	function get_reg($no_registrasi)
	{
  
        $this->db->where('no_registrasi', $no_registrasi);
        $query = $this->db->get('tb_registrasi');
        return $query->row_array();
    }
	
	function get_data($no_registrasi)
	{
  
        $this->db->where('no_registrasi', $no_registrasi);
        $query = $this->db->get('tb_diagnosa');
        return $query->row_array();
    }
	
	function update($tbl, $row_id, $id, $data)
	{
		$this->db
			->where($row_id, $id)
			->update($tbl, $data);	
	}
	
	function get_rel_rajal($no_registrasi)
	{
	$data = $this->db->query("SELECT
							tb_data_pasien.id_pasien,
							tb_data_pasien.rm_puskesmas,
							tb_data_pasien.rm_rsu,
							tb_data_pasien.nama_pasien,
							tb_data_pasien.alamat,
							tb_data_pasien.tanggal_lahir,
							tb_data_pasien.agama,
							tb_data_pasien.pekerjaan,
							tb_data_pasien.no_tlp,
							tb_data_pasien.gol_darah,
							tb_data_pasien.nama_suami,
							tb_diagnosa.id_diagnosa,
							tb_diagnosa.tinggi,
							tb_diagnosa.berat,
							tb_diagnosa.tekanan_darah_sistole,
							tb_diagnosa.tekanan_darah_diastole,
							tb_diagnosa.lila,
							tb_diagnosa.jumlah_anak,
							tb_diagnosa.djj,
							tb_diagnosa.gemelli,
							tb_diagnosa.bekas_sc,
							tb_diagnosa.pendarahan,
							tb_diagnosa.proteinurea,
							tb_diagnosa.hemoglobin,
							tb_diagnosa.id_nomenklatur,
							tb_diagnosa.hipertensi,
							tb_diagnosa.diabetes_melitus,
							tb_diagnosa.tbc,
							tb_diagnosa.asma_bronkhiale,
							tb_diagnosa.b20,
							tb_diagnosa.usia_kehamilan,
							tb_diagnosa.gestasi,
							tb_diagnosa.partus,
							tb_diagnosa.abortus,
							tb_diagnosa.hpht,
							tb_registrasi.no_registrasi,
							tb_registrasi.puskesmas,
							tb_registrasi.posisi,
							tb_registrasi.status,
							tb_registrasi.jaminan,
							tb_registrasi.diagnosa
							FROM
							tb_registrasi
							INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
							INNER JOIN tb_data_pasien ON tb_registrasi.id_pasien = tb_data_pasien.id_pasien
							WHERE
							tb_registrasi.no_registrasi = '$no_registrasi'
							");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
}