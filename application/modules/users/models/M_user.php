<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_User extends CI_Model
{
	
	function get_user()
	{
		$this->db->select('*'); 
		$this->db->order_by('id', 'asc');
		$this->db->where('trash','0');
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
	
	function get_group()
	{
		$this->db->select('*'); 
		$this->db->order_by('id_group', 'asc');
		$this->db->where('trash','0');
		$data = $this->db->get('tb_group');
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