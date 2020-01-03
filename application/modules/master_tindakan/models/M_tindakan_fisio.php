<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_tindakan_fisio extends CI_Model
{
	
	function get_pendaftaran()
	{
//		$pus = $this->session->userdata('puskesmas');
//		$queryadd = "";
//        if($pus != '99' && $pus != '98' )
//        {
//            $queryadd .= "  and tb_data_pasien.puskesmas='".$pus."' ";
//        }
		$data = $this->db->query("	SELECT
									*
									FROM
									tb_data_pasien ");
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}

					return $result;
		}
	}
	
	function get_kecamatan()
	{
		$this->db->select('*'); 
 		$this->db->from('tb_kecamatan');
 		$this->db->order_by('nama', 'asc');

 		return $this->db->get()->result(); 
    }
	
	public function get_kelurahan($id_kecamatan)
	{
 		$this->db->select('*'); 
 		$this->db->from('tb_kelurahan');
 		$this->db->where('id_kecamatan', $id_kecamatan); 
 		$this->db->order_by('nama', 'asc');

 		return $this->db->get()->result(); 
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