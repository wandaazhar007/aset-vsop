<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates
{
	
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
    }
	
	function theme()
	{
		return 'limitless';
	}
	
	function sidebar()
	{
		$CI =& get_instance();
		$id = $CI->session->userdata('id');
		$query = ("SELECT tb_login.group FROM tb_login WHERE tb_login.id = '".$id."'");
		$result = $this->db->query($query);
		$data = $result->row();
		$menu = $data->group;
		if($result->num_rows() != 0)
			{
				switch($data->group)
					{
						case '1' :
							$menu = 
									'admin'
									;
							break;
							
						case '2' :
							$menu = 
									''
									;
							break;	
							
						case '3' :
							$menu = 
									''
									;
							break;
							
						case '4' :
							$menu = 
									''
									;
							break;
							
					}
			}
		return $menu;
	}
	
	
	
}