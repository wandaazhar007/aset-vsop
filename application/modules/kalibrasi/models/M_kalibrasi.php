<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kalibrasi extends CI_Model{

	function getAllData(){
		$this->db->select('*');
//		$this->db->order_by('id_alat', 'DESC');
		$data = $this->db->get('tb_kalibrasi');
		if($data->num_rows()>0){
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
}