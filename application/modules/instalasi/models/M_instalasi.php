<?php (defined('BASEPATH')) OR exit('No direct access alloqd');

class M_instalasi extends CI_Model
{

	function getAllData()
	{
		$this->db->select('*'); 
		$this->db->where('status','0');
		$this->db->order_by('id_instalasi', 'DESC');
		$data = $this->db->get('tb_instalasi');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getById($id_instalasi){
		$this->db->select('*');
		$this->db->where('id_instalasi', $id_instalasi);
		$data = $this->db->get('tb_instalasi');
	
		if($data->num_rows()>0){
			foreach($data->result() as $row){
				$result[] = $row;
			}
			return $result;
		} 
	}
	
	function input($data, $table)
	{
		$this->db->insert($table, $data);
	}
	
	function update($table, $row_id, $id, $data){
		$this->db
				->where($row_id, $id)
				->update($table, $data);
	}
	
}