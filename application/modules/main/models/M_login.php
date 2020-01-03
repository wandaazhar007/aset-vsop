<?php 

class M_login extends CI_Model
{	
	function cek_login($data)
	{		
		$query = $this->db->get_where('tb_login',$data);
		if($query->num_rows() > 0)
		{
			$result = $query->row();
			$return = $result->id;
			return $result;
		}
		else
			{
				return 'FALSE';	
			}	
	}
	
	function getStatus($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('tb_login');
		if($data->num_rows() > 0)
		{
			$get = $data->row();
			$result = $get->status;
			return $result;	
		}
	}
	function getUsername($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('tb_login');
		if($data->num_rows() > 0)
		{
			$get = $data->row();
			$result = $get->username;
			return $result;	
		}
	}
	
	function getKunjungan()
	{	
		$this->db->select('DAYNAME(tgl_kunjungan) as hari, COUNT(tb_registrasi.no_registrasi) as jumlah');
		$this->db->group_by('DAYNAME(tgl_kunjungan)');
		$result = $this->db->get('tb_registrasi');
		return $result;	
	}
	
	
	
}