<?php (defined('BASEPATH')) OR exit('No direct access alloqd');

class M_ruangan extends CI_Model
{

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

	function getAllData()
	{
		$this->db->select('*'); 
		$this->db->where('status','0');
		$this->db->order_by('id_ruangan', 'DESC');
		$data = $this->db->get('tb_ruangan');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getById($id_ruangan)
	{
		$this->db->select('*');
		$this->db->where('id_ruangan', $id_ruangan);
		$data = $this->db->get('tb_ruangan');
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