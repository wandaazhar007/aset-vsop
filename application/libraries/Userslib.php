<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author		Cikal Firman N
 * @link        cikalfnh@gmail.com
 * @copyright	(c) 2017
 * 
 */
 
class Userslib
{

	function __construct()
	{
		$CI =& get_instance();
        $this->db= $CI->load->database('default',TRUE);
    }
	
	function getUser($id, $row)
	{
		$sql = $this->db
						->where('id', $id)
						->from('tb_login')
						->get();
		$result = $sql->row();
		$data	= $result->$row;
		return $data;
	}
	
	function getUserData($row)
	{
		$CI =& get_instance();
		$id = $CI->session->userdata('id');
		$sql = $this->db
						->where('id', $id)
						->from('tb_login')
						->get();
		$result = $sql->row();
		$data	= $result->$row;
		return $data;
	}
	
	function getUserRow($id)
	{
		$sql = $this->db
						->where('id', $id)
						->from('tb_login')
						->get();
		$result = $sql->row();
		return $result;
	}
	
	function getUsersData($q)
	{
		$data = $this->db->query($q);
		$result = $data->row();
		return $result;	
	}
	
	function insertUser($data)
	{
		$this->db->insert('users', $data);	
	}
	
	function updateUser($id, $data)
	{
		$this->db
			->where('id', $id)
			->update('tb_login', $data);	
	}	
	
	function deleteUser($id)
	{
		$this->db
			->where('id', $id)
			->delete('tb_login');	
	}
	
}