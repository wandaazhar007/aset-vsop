<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	
	function get_laporan()
	{
		$data = $this->db->query("SELECT * FROM vw_registrasi ");
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