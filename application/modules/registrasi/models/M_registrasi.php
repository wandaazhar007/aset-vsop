<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_registrasi extends CI_Model
{
	
	function get_registrasi()
	{
		$data = $this->db->query("	SELECT
									*
									FROM
									tb_reg_pasien ");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getAllPasien()
	{
//			$this->db->select('*');
//			$this->db->order_by('tgl_input', 'DESC');
//			$query = $this->db->get('vw_registrasi');
//			return $query->result();
			$data = $this->db->query("SELECT * FROM vw_registrasi WHERE trash = '0' ORDER BY tgl_input DESC");
			if($data->num_rows()>0)
			{
				foreach($data->result() as $row)
				{
					$result[] = $row;
				}
					return $result;
			}
	}

	function get_search_pasien($detailPasien)
	{
		$this->db->select('*');
		$this->db->where('id_pasien', $detailPasien);
		$res2 = $this->db->get('tb_reg_pasien');
		return $res2;
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
	
	
	
	public function getNoRm()
	{
		$this->db->select('RIGHT(tb_pasien.no_rm,2) as no_rm', FALSE);
		$this->db->order_by('no_rm', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_pasien');
		
		if($query->num_rows()<>0){
			$data = $query->row();
			$no_rm 	= intval($data->no_rm) + 1;
		}else{
			$no_rm = 1;
		}
		
//		$tgl		= date('dmy');
		$batas 		= str_pad($no_rm, 6, "0", STR_PAD_LEFT);
		$rm_tampil 	= $batas;
		
		return $rm_tampil;
	}
	
	function select_pasien($no_rm)
	{
		$sql = "SELECT * FROM tb_pasien WHERE tb_pasien.no_rm = $no_rm";
		$sqlQuery = $this->db->query($sql);
		
		if($sqlQuery->num_rows()>0)
		{
			$row = $sqlQuery->row();
			$return = array(
				
							'nik'=>$row->nik,
							'nama_pasien' => $row->nama_pasien,
							'jenis_kelamin' => $row->jenis_kelamin,
							'tempat_lahir' => $row->tempat_lahir,
							'tanggal_lahir' => $row->tanggal_lahir,
							'email' => $row->email,
							'no_hp' => $row->no_hp,
							'alamat' => $row->alamat
						   
						   );
			return $return;
			
		}
	}
	
	function getKartu($id_registrasi)
	{
		return $this->db->query("SELECT * FROM vw_registrasi WHERE id_registrasi = '$id_registrasi'")->result_array();
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
}