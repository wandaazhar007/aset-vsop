<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_tindakan extends CI_Model
{
	
	function get_tindakan()
	{
		$data = $this->db->query("SELECT * FROM vw_tindakan WHERE trash = '0' ORDER BY tgl_input DESC");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function get_data_reg($id_registrasi)
	{
		$data = $this->db->query("SELECT * FROM vw_registrasi WHERE id_registrasi = '$id_registrasi' AND trash = '0'");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function get_data_master_id($table, $col, $id)
	{
		$data = $this->db
						->where($col, $id)
						->from($table)
						->get();
		if($data->num_rows()>0)
		{
			$result = $data->row();
			$return = array(
							'id_tindakan_master' => $result->id_tindakan_master,
							'id_tindakan_jenis' => $result->id_tindakan_jenis,
							'kode_tindakan' => $result->kode_tindakan,
							'nama_tindakan' => $result->nama_tindakan,
							'harga_tindakan' => $result->harga_tindakan
							);
			return $return;
		}	
	}
	
	function input($data, $table)
	{
		$this->db->insert($table, $data);
	}
	
	function update($tbl, $row_id, $id, $data)
	{
		$this->db
			->where($row_id, $id)
			->update($tbl, $data);	
	}
	
	function getPasien($id_registrasi)
	{
		
		$data =  $this->db->query("SELECT
							tb_pasien.no_rm,
							tb_pasien.nik,
							tb_pasien.nama_pasien,
							tb_pasien.jenis_kelamin,
							tb_pasien.tempat_lahir,
							tb_pasien.tanggal_lahir,
							tb_pasien.email,
							tb_pasien.no_hp,
							tb_pasien.alamat,
							tb_registrasi.jaminan_pembayaran,
							tb_pasien.id_pasien,
							tb_registrasi.id_registrasi
							FROM
							tb_registrasi
							INNER JOIN tb_pasien ON tb_registrasi.no_rm = tb_pasien.no_rm
							WHERE
							tb_registrasi.id_registrasi = '$id_registrasi'");
							
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