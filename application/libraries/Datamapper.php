<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author		Cikal Firman N
 * @link        cikalfnh@gmail.com
 * @copyright	(c) 2017
 * 
 */
 
class Datamapper
{
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
    }
	
	function all($table)
	{
		$data = $this->db->get($table);
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}
						
					return $result;
			
		}
	}
	
	function getAllById($table, $col, $id)
	{
		$this->db->where($col, $id);
		$data = $this->db->get($table);
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}
						
					return $result;
			
		}
	}
	
	function rowData($table, $row, $row_id, $id)
	{
		$sql = $this->db
						->where($row_id, $id)
						->from($table)
						->get();
		if($sql->num_rows()>0)
		{
			$result = $sql->row();
			$data	= $result->$row;
			
		}else
			{
				$data = '-';	
			}
		
		return $data;
	}
	
	function rowSelect($table, $row_id, $id)
	{
		$sql = $this->db
						->where($row_id, $id)
						->from($table)
						->get();
		$result = $sql->row();
		return $result;	
	}
	
	
	function getRow($table, $col, $id)
	{
		$data = $this->db
						->where($col, $id)
						->from($table)
						->get();
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
				{
					$result[] = $row;	
				}
						
					return $result;
			
		}	
	}
	
	function countRow($table, $col, $id)
	{
		$data = $this->db
						->where($col, $id)
						->from($table)
						->get();
		return $data->num_rows();
	}
	
	function countQuery($q)
	{
		$sql = $this->db->query($q);
		return $sql->num_rows();
	}
	
	function query($q)
	{
		$sql = $this->db->query($q);
		if($sql->num_rows()>0)
		{
			return $sql;	
		}	
	}
	
	function query2($q)
	{
		$sql = $this->db->query($q);
		if($sql->num_rows()>0)
		{
			foreach($sql->result() as $row)
				{
					$result[] = $row;	
				}
						
					return $result;	
		}	
	}
	
	function query3($q)
	{
		$sql = $this->db->query($q);
		if($sql->num_rows()>0)
		{
			return $sql->result();
		}	
	}
	
	function queryGetRow($q, $col)
	{
		$sql = $this->db->query($q);
		if($sql->num_rows()>0)
		{
			$result = $sql->row();
			$data	= $result->$col;
			return $data;
		}	
	}
	
	function update($tbl, $row_id, $id, $data)
	{
		$this->db
			->where($row_id, $id)
			->update($tbl, $data);	
	}
	
	function insert($tbl, $data)
	{
		$this->db->insert($tbl, $data);	
	}
	
	function delete($tbl, $col, $id)
	{
		$this->db
			->where($col, $id)
			->delete($tbl);	
	}
}