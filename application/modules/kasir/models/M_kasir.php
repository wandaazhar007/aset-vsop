<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class M_kasir extends CI_Model
{
	
	function getAll($id_registrasi)
	{

			$data = $this->db->query("SELECT * FROM vw_transaksi WHERE id_registrasi = '$id_registrasi'");
			if($data->num_rows()>0)
			{
				foreach($data->result() as $row)
				{
					$result[] = $row;
				}
					return $result;
			}
	}
	
	
	function getAllItem($id_registrasi)
	{

			$data = $this->db->query("SELECT * FROM vw_transaksi_item WHERE id_registrasi = '$id_registrasi'");
			if($data->num_rows()>0)
			{
				foreach($data->result() as $row)
				{
					$result[] = $row;
				}
					return $result;
			}
	}
	
	

	function getAllPasien()
	{

			$data = $this->db->query("SELECT * FROM vw_tindakan WHERE trash = '0' ORDER BY tgl_input DESC");
			if($data->num_rows()>0)
			{
				foreach($data->result() as $row)
				{
					$result[] = $row;
				}
					return $result;
			}
	}
	
	function getInvoice($id_registrasi)
	{

			$data = $this->db->query("SELECT * FROM vw_invoice WHERE id_registrasi = '$id_registrasi'");
			if($data->num_rows()>0)
			{
				foreach($data->result() as $row)
				{
					$result[] = $row;
				}
					return $result;
			}
	}
	
	function getNama($id)
	{

			$data = $this->db->query("SELECT nama_lengkap FROM tb_login WHERE id = '$id'");
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