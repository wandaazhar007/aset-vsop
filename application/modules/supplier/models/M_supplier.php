<?php (defined('BASEPATH')) OR exit('No direct access alloqd');

class M_supplier extends CI_Model
{

	function getAllData()
	{
		$this->db->select('*'); 
		$this->db->where('status','0');
		$this->db->order_by('id_supplier', 'DESC');
		$data = $this->db->get('tb_supplier');
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
//	function getById($id_supplier) {
//		$sql = "SELECT * FROM tb_supplier WHERE tb_supplier.id_supplier = '$id_supplier'";
//		$sqlQuery = $this->db->query($sql);
//		
//		if($sqlQuery->num_rows()>0) {
//			$row	= $sqlQuery->row();
//			$return = array(
//							'id_supplier'		=> $row->id_supplier,
//							'nama_supplier'		=> $row->nama_supplier,
//							'contact_person'	=> $row->contact_person,
//							'no_hp'				=> $row->no_hp,
//							'email'				=> $row->email,
//							'alamat'			=> $row->alamat,
//							);
//			return $return;
//		}
//	}
	
	function getById($id_supplier)
	{
		$this->db->select('*');
//		$this->db->where('id_supplier','1');
		$this->db->where('id_supplier', $id_supplier);
		$data = $this->db->get('tb_supplier');
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