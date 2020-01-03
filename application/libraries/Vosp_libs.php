<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vosp_libs
{
	
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
    }
	
	function getKodeAlat()
	{
		$this->db->select('RIGHT(tb_alat.kode_alat,2) as kode_alat', FALSE);
		$this->db->order_by('kode_alat', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_alat');
		
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode_alat 	= intval($data->kode_alat) + 1;
		}else{
			$kode_alat = 1;
		}
		
//		$tgl			= date('dmy');
		$batas 			= str_pad($kode_alat, 6, "0", STR_PAD_LEFT);
		$kodetampil 	= $batas;
		
		return $kodetampil;
	}
	
	function kd_reg($length = 8)
	{
		$keyHash = '';
        $chars     = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }
		
		$return = 'MRC_'.$keyHash.'';

        return $return;
	}
	
	function kd_tindakan($length = 10)
	{
		$keyHash = '';
        $chars     = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }
		
		$return = 'TND_'.$keyHash.'';

        return $return;
	}
	
	function kd_tindakan_item($length = 30)
	{
		$keyHash = '';
        $chars     = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }
		
		$return = 'TDI_'.$keyHash.'';

        return $return;
	}
	
	function kd_transaksi($length = 10)
	{
		$keyHash = '';
        $chars     = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }
		
		$return = 'TRX_'.$keyHash.'';

        return $return;
	}
	
	function kd_invoice($length = 30)
	{
		$keyHash = '';
        $chars     = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }
		
		$return = 'INV_'.$keyHash.'';

        return $return;
	}
	
	function get_invoice()
	{
		$this->db->select('RIGHT(tb_invoice.id_invoice,2) as id_invoice', FALSE);
		$this->db->order_by('id_invoice', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_invoice');
		
		if($query->num_rows()<>0){
			$data = $query->row();
			$id_invoice 	= intval($data->id_invoice) + 1;
		}else{
			$id_invoice = 1;
		}
		
//		$tgl		= date('dmy');
		$batas 		= str_pad($id_invoice, 10, "0", STR_PAD_LEFT);
		$rm_tampil 	= 'INV_'.$batas.'';
		
		return $rm_tampil;
	}
	
	function get_no_rm()
	{
		$this->db->select('RIGHT(tb_pasien.no_rm,2) as no_rm', FALSE);
		$this->db->order_by('no_rm', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_pasien');
		
		if($query->num_rows()<>0){
			$data = $query->row();
			$no_rm 	= intval($data->no_rm) + 1;
		}else{
			$no_rm = 1;
		}
		
//		$tgl		= date('dmy');
		$batas 		= str_pad($no_rm, 6, "0", STR_PAD_LEFT);
		$rm_tampil 	= $batas;
		
		return $rm_tampil;
	}
	
	function statusRegistrasi($status)
	{
		switch ($status)
        {
            case '0': $return = '<button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple"><i class="icon-cross3"></i></button>';
             
                break;
            case '1': $return = '<button type="button" class="btn btn-success btn-icon btn-rounded legitRipple"><i class="icon-check"></i></button>';
               
                break;
				
		}
		return $return;
	}
	
	function statusTransaksi($status_trans)
	{
		switch ($status_trans)
        {
            case '0': $return = '<button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple"><i class="icon-cross3"></i></button>';
             
                break;
            case '1': $return = '<button type="button" class="btn btn-success btn-icon btn-rounded legitRipple"><i class="icon-check"></i></button>';
               
                break;
				
		}
		return $return;
	}
	
	function statusInvoice($status_cetak)
	{
		switch ($status_cetak)
        {
            case '0': $return = '<button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple"><i class="icon-cross3"></i></button>';
             
                break;
            case '1': $return = '<button type="button" class="btn btn-success btn-icon btn-rounded legitRipple"><i class="icon-check"></i></button>';
               
                break;
				
		}
		return $return;
	}
	
	function identifikasiJenis($jenis)
	{
		switch($jenis)
		{
			case 'KTP':
				$return = array(
								  'id_jenis' => '1',
								  'title' => 'Detail Registrasi Kartu Tanda Penduduk',
								  'content_op' => 'op_ktp_detail',
								  'content_cek' => 'frontend/cek/cek_ktp_detail',
								  'content_detail' => 'registrasi/ktp/detail',
								  'table' => 'tb_reg_ktp',
								  'id_table' => 'id_reg_ktp',
								  'initial' => 'Kartu Tanda Penduduk'
							);
				
				break;
				
			case 'KK':
				$return = array(
								  'id_jenis' => '2',
								  'title' => 'Detail Registrasi Kartu Keluarga',
								  'content_op' => 'op_kk_detail',
								  'content_cek' => 'frontend/cek/cek_kk_detail',
								  'content_detail' => 'registrasi/kk/detail',
								  'table' => 'tb_reg_kk',
								  'id_table' => 'id_reg_kk',
								  'initial' => 'Kartu Keluarga'
							);
				
				break;
		}	
		
		return $return;
	}
	
	function jumlahHari()
	{
		$CI =& get_instance();
		$tgl = date('Y-m-d');
		$selesai = $CI->datamapper->countQuery("SELECT
												tb_registrasi.id_registrasi
												FROM
												tb_registrasi
												WHERE
												tb_registrasi.trash = '0'
												AND tb_registrasi.tgl_input
												LIKE '%%tgl%' ");
		return $selesai;
	}
	
}