<?php defined('BASEPATH') OR exit('no direct script access allowed');
class M_admin extends CI_Model
{
	function getAllDokter()
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->where('id_petugas_jenis','1');
		$this->db->order_by('nama_petugas', 'desc');
		$data = $this->db->get('tb_petugas');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getAllFisio()
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->where('id_petugas_jenis','2');
		$this->db->order_by('nama_petugas', 'asc');
		
		$data = $this->db->get('tb_petugas');
		
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getAllStaf()
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->where('id');
		$this->db->order_by('id', 'asc');
		
		$data = $this->db->get('tb_login');
		
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
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
	
	function jumlahPasien()
	{
		return $this->db->get('tb_pasien')->num_rows();
				$this->db->get_where('tgl_input');
		
	}
	
	function getPetugas($id_petugas)
	{
		$this->db->select('*');
		$this->db->where('id_petugas',$petugasData);
		$res2 = $this->db->get('tb_petugas');
		return $res2;
	}
}