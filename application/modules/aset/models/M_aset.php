<?php (defined('BASEPATH')) OR exit('No direct access alloqd');

class M_aset extends CI_Model
{

	function getAllData()
	{
		$this->db->select('*'); 
//		$this->db->where('status','0');
		$this->db->order_by('id_alat', 'DESC');
		$data = $this->db->get('tb_alat');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getById($id_alat)
	{
		$this->db->select('*');
//		$this->db->where('id_supplier','1');
		$this->db->where('id_alat', $id_alat);
		$data = $this->db->get('tb_alat');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function input($table, $data){
		$this->db->insert($table, $data);
	}
	
	function update($tbl, $row_id, $id, $data)
	{
		$this->db
			->where($row_id, $id)
			->update($tbl, $data);	
	}
	
	function getUploadBerkas($id_alat)
	{
		$data = $this->db->query("SELECT * FROM tb_alat WHERE id_alat = '$id_alat'");
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