<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_fisioterapis extends CI_Model
{
	
	function get_fisioterapis()
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
	
	function getById($id_petugas)
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->where('id_petugas_jenis','2');
		$this->db->where('id_petugas', $id_petugas);
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