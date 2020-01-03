<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_tindakan_dokter extends CI_Model
{
	
	function getAllTindakan()
	{
			$id = '1';
			$this->db->select('*');
			$this->db->where('trash','0');
			$this->db->where('id_tindakan_jenis', $id);
			$query = $this->db->get('tb_tindakan_master');
			return $query->result();
	}
	
	function getDetail($id_tindakan_master)
	{
		$this->db->select('*'); 
		$this->db->where('trash','0');
		$this->db->where('id_tindakan_jenis','1');
		$this->db->where('id_tindakan_master', $id_tindakan_master);
		$data = $this->db->get('tb_tindakan_master');
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