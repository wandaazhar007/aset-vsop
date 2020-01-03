<?php ( defined('BASEPATH')) or exit('No direct script access allowed');

class Api extends CI_Controller 
{

	public function __construct() {
		parent::__construct();
		$this->auth->restrict();
	}
	
	function select_bidang($id_opd)
	{
		$bidang = $this->datamapper->getRow('tb_bidang', 'id_opd', $id_opd);
		print_r(json_encode($bidang));
	}
	
	function select_sub_bidang($id_bidang)
	{
		$sub_bidang = $this->datamapper->getRow('tb_sub_bidang', 'id_bidang', $id_bidang);
		print_r(json_encode($sub_bidang));
	}
	
	function select_pptk($id_bidang)
	{
		$pptk = $this->datamapper->query2("SELECT tb_login.id, tb_login.nama_lengkap FROM tb_login WHERE tb_login.`group` = '4' AND tb_login.bidang = '$id_bidang'");
		print_r(json_encode($pptk));
	}
	
	function kecamatan($id_kecamatan = '')
	{
		if(empty($id_kecamatan))
		{
			$pptk = $this->datamapper->query2("SELECT tb_kecamatan.id_kecamatan, tb_kecamatan.nama_kecamatan FROM tb_kecamatan");
		}else
			{
				
			}
		print_r(json_encode($pptk));
	}
	
	function kelurahan($id_kecamatan = '', $id_kelurahan = '')
	{
		if(empty($id_kelurahan) && empty($id_kecamatan))
		{
			$pptk = $this->datamapper->query2("SELECT tb_kelurahan.id_kelurahan, tb_kelurahan.id_kecamatan, tb_kelurahan.nama_kelurahan FROM tb_kelurahan");
		}elseif(empty($id_kelurahan) && !empty($id_kecamatan))
			{
				$pptk = $this->datamapper->query2("SELECT tb_kelurahan.id_kelurahan, tb_kelurahan.id_kecamatan, tb_kelurahan.nama_kelurahan FROM tb_kelurahan WHERE tb_kelurahan.id_kecamatan = '$id_kecamatan'");
			}
		print_r(json_encode($pptk));
	}
}