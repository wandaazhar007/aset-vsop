<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_tindakan_dokter extends CI_Model
{
	
	function get_tindakan()
	{
		$data = $this->db->query("SELECT * FROM tbt_dokter ");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function getDetail($id_tindakan_dokter)
	{
//		return $this->db->get('tbt_dokter')-result_array();
//		$this->db->query("SELECT * FROM tbt_dokter WHERE id_tindakan_dokter = $id_tindakan_dokter");

//		$this->db->where('id_tindakan_dokter', $id_tindakan_dokter);
//		$query = $this->db->get('tbt_dokter');
//		return $query->row_array();
		$data = $this->db->query("SELECT * FROM tbt_dokter WHERE id_tindakan_dokter = '$id_tindakan_dokter'");
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