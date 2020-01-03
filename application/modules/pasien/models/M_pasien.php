<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_pasien extends CI_Model
{
	
	function get_pasien()
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->order_by('no_rm', 'asc');
		$data = $this->db->get('tb_pasien');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getById($id_pasien)
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->where('id_pasien', $id_pasien);
		$data = $this->db->get('tb_pasien');
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
	
	function update($tbl, $row_id, $id, $data)
	{
		$this->db
			->where($row_id, $id)
			->update($tbl, $data);	
	}
	
	function get_search_pasien($pasienData)
	{
		$this->db->select('*');
		$this->db->where('id_pasien',$pasienData);
		$res2 = $this->db->get('tb_pasien');
		return $res2;
	}
 
}