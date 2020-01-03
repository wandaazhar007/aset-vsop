<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilities 
{
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
    }
	
	function notification($tipe, $message)
	{
		$CI =& get_instance();
		switch($tipe)
			{
				case 'success' : $CI->session->set_flashdata('notification_header','<div class="alert alert-icon alert-success alert-dismissible fade show">
																<div class="alert--icon">
																	<i class="fa fa-check"></i>
																</div>
																<div class="alert-text">
																	<strong>Well done!</strong> '.$message.' !
																</div>
																<button type="button" class="close" data-dismiss="alert">
																	<span aria-hidden="true">×</span>
																</button>
															</div>');
				break;
				
				case 'danger' : $CI->session->set_flashdata('notification_header','<div class="alert alert-icon alert-danger alert-dismissible fade show">
																<div class="alert--icon">
																	<i class="fa fa-thermometer"></i>
																</div>
																<div class="alert-text">
																	<strong>Oh snap!</strong> '.$message.' !
																</div>
																<button type="button" class="close" data-dismiss="alert">
																	<span aria-hidden="true">×</span>
																</button>
															</div>');
				break;
			}
		return TRUE;
		
	}
	
	//untuk mengetahui bulan bulan

    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
	
//	function bulan2($bln)
//    {
//        switch ($bln)
//        {
//            case 01:
//                return "Januari";
//                break;
//            case 02:
//                return "Februari";
//                break;
//            case 03:
//                return "Maret";
//                break;
//            case 04:
//                return "April";
//                break;
//            case 05:
//                return "Mei";
//                break;
//            case 06:
//                return "Juni";
//                break;
//            case 07:
//                return "Juli";
//                break;
//            case 08:
//                return "Agustus";
//                break;
//            case 09:
//                return "September";
//                break;
//            case 10:
//                return "Oktober";
//                break;
//            case 11:
//                return "November";
//                break;
//            case 12:
//                return "Desember";
//                break;
//        }
//    }

 
    function tanggal($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = $this->bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
 
	function tanggal_waktu($tgl)
	{
    	//$inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
    	$tglBaru=explode(" ",$tgl); //memecah berdasarkan spaasi
     
    	$tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
    	$tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
    	$tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -
 
    	$tgl=$tglBarua[2];
    	$bln=$tglBarua[1];
    	$thn=$tglBarua[0];
 
    	$bln=$this->bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
    	$ubahTanggal="$tgl $bln $thn | $tglBaru2 "; //hasil akhir tanggal
 
    	return $ubahTanggal;
	}
	
	function tanggal_datetime($tgl)
	{
    	//$inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
    	$tglBaru=explode(" ",$tgl); //memecah berdasarkan spaasi
     
    	$tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
    	$tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
    	$tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -
 
    	$tgl=$tglBarua[2];
    	$bln=$tglBarua[1];
    	$thn=$tglBarua[0];
 
    	$bln=$this->bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
    	$ubahTanggal="$tgl $bln $thn"; //hasil akhir tanggal
 
    	return $ubahTanggal;
	}
	
	function countDays($tgl_awal, $tgl_akhir)
	{
		//$awal  = date_create($tgl_awal);
		$tawal = date("Y-m-d");
		$awal = date_create($tawal);
		$akhir = date_create($tgl_akhir); // waktu sekarang
		$diff  = date_diff( $awal, $akhir );
		$count = $diff->days;
		return $count;
	}
	
	function bar($akhir, $now, $awal = '0')
	{
				
	}
	
	function rupiah($nominal)  
    {  
  		$result = "Rp ".number_format($nominal,2,",",".");  
   		return $result;  
	} 
	
	function uploadGambar($name, $folder, $type, $maxsize, $filename, $maxwidth = 1024, $maxheight = 800)
        {
				$CI =& get_instance();
                $config['upload_path']          = $folder;
                $config['allowed_types']        = $type;
                $config['max_size']             = $maxsize;
                $config['max_width']            = $maxwidth;
                $config['max_height']           = $maxheight;
				$config['file_name']			= $filename;

                $CI->load->library('upload', $config);

                if ( ! $CI->upload->do_upload($name))
                {
                        $error = array('error' => $CI->upload->display_errors());
						$this->notification('danger', ''.$error['error'].'');
						$data = array(
										'status'=> FALSE, 
										'message'=>$CI->upload->display_errors(),
										'filename'=> ''
									) ;
						//$data = ''.$folder.'/logotangsel.png';
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $result = $CI->upload->data();
						$data = array(
										'status'=> TRUE, 
										'message'=>$CI->upload->display_errors(),
										'filename'=> ''.$folder.'/'.$result['file_name'].''
									) ;
						
                        //$this->load->view('upload_success', $data);
                }
				
				return $data;
        }
		
	function uploadFile($name, $folder, $type, $maxsize, $filename)
        {
				$CI =& get_instance();
                $config['upload_path']          = $folder;
                $config['allowed_types']        = $type;
                $config['max_size']             = $maxsize;
				$config['file_name']			= $filename;

                $CI->load->library('upload', $config);

                if ( ! $CI->upload->do_upload($name))
                {
//                        $error = array('error' => $CI->upload->display_errors());
//						$this->notification('danger', ''.$error['error'].'');
						$data = array('status' => FALSE, 'message' => $CI->upload->display_errors());
						//$data = ''.$folder.'/logotangsel.png';
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $result = $CI->upload->data();
						$data = 
								array('status' => TRUE, "filename" => ''.$folder.'/'.$result['file_name'].'')
								;
						
                        //$this->load->view('upload_success', $data);
                }
				
				return $data;
        }
		
		function uploadFile1($name, $folder, $type, $maxsize, $filename)
        {
				$CI =& get_instance();
				unset($config);
                $config['upload_path']          = $folder;
                $config['allowed_types']        = $type;
                $config['max_size']             = $maxsize;
				$config['file_name']			= $filename;

                $CI->load->library('upload');
				$CI->upload->initialize($config);

                if ( ! $CI->upload->do_upload($name))
                {
                        $error = array('error' => $CI->upload->display_errors());
						$this->notification('danger', ''.$error['error'].'');
						$data = FALSE;
						//$data = ''.$folder.'/logotangsel.png';
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $result = $CI->upload->data();
						$data = ''.$folder.'/'.$result['file_name'].'';
						
                        //$this->load->view('upload_success', $data);
                }
				
				return $data;
        }
		
	function sendmail($to, $from, $from_desc, $subject, $view, $data)
		{
			$CI =& get_instance();
			$config = array(  
				'protocol' => 'smtp',
				'smtp_host' => 'aspmx.l.google.com',      
				'smtp_port' => 25,
				'smtp_timeout' => '4',
				'mailtype'  => 'html', 
				'charset'   => 'utf-8',
				'newline' => "\r\n"
			);
			$CI->email->initialize($config);
			$CI->email->set_newline("\r\n");
		
			$CI->email->from($from, $from_desc);
			$CI->email->to($to);  // replace it with receiver mail id
			$CI->email->subject($subject); // replace it with relevant subject 
		
			$body = $CI->load->view($view,$data,TRUE);
			$CI->email->message($body);   
			$CI->email->send();
    	}
		
	function selectQuery($q, $key, $val)
	{
		$sql = $this->db->query($q);
		if($sql->num_rows()>0)
		{
			foreach($sql->result() as $row)
				{
					$result[] = '<option value="'.$row->$key.'">'.$row->$val.'</option>';	
				}
						
					return $result;	
		}	
	}
	
	function selectArray($q, $key, $val)
	{
		$sql = $this->db->query($q);
		if($sql->num_rows()>0)
		{
			foreach($sql->result() as $row)
				{
					$result[] = '<option value="'.$row->$key.'">'.$row->$val.'</option>';	
				}
						
					return $result;	
		}	
	}
	
	function keyHash($length = 8) 
    {
		
        $keyHash = '';
        $chars     = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }

        return $keyHash;
    }
	
	function regHash($length = 8) 
    {
		
        $keyHash = '';
        $chars     = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        for($i = 0; $i < $length; $i++) 
        {
            $x = mt_rand(0, strlen($chars) -1);
            $keyHash .= $chars{$x};
        }

        return $keyHash;
    }
	
	function cekDiagnosa($diagnosa)
	{
		switch ($diagnosa)
        {
            case '0': $return = '<button class="btn btn-danger m-1">Belum</button>';
             
                break;
            case '1': $return = '<button class="btn btn-success m-1">Sudah</button>';
               
                break;
				
		}
		return $return;
	}
	
	function cekStatusAdmin($status)
	{
		switch ($status)
        {
            case '0': $return = '<button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple"><i class="icon-cross3"></i></button>';
             
                break;
            case '1': $return = '<button type="button" class="btn btn-success btn-icon btn-rounded legitRipple"><i class="icon-checkmark3"></i></button>';
               
                break;
				
		}
		return $return;
	}
	
	function cekStatus($status)
	{
		switch ($status)
        {
            case '1': $return = '<button class="btn btn-dark m-1">Rajal</button>';
             
                break;
            case '2': $return = '<button class="btn btn-info m-1">Rujuk Ranap</button>';
               
                break;
			case '3': $return = '<button class="btn btn-danger m-1">Meninggal</button>';
               
                break;
			case '4': $return = '<button class="btn btn-primary m-1">Selesai</button>';
               
                break;
			case '5': $return = '<button class="btn btn-warning m-1">Rujuk RS Lain</button>';
               
                break;
				
		}
		return $return;
	}
	
	function cekPosisi($id_pemesanan)
	{
		$CI =& get_instance();
		$arrytable = array("tb_cutting","tb_preparation","tb_sewing","tb_assemblying","tb_finishing");
		$carrytable = count($arrytable);
		
		for($j=0;$j<$carrytable;$j++)
		{
			$posisi[] = $CI->datamapper->countRow($arrytable[$j],'id_pemesanan',$id_pemesanan);
		} 
		
		if($posisi[0] == 1 && $posisi[1] == 0 && $posisi[2] == 0 && $posisi[3] == 0 && $posisi[4] == 0)
		{
			$statusPosisi = '<button class="btn btn-primary">Cutting</button>'; 
		}
		
		else if ($posisi[0] == 1 && $posisi[1] == 1 && $posisi[2] == 0 && $posisi[3] == 0 && $posisi[4] == 0)
		
		{
			$statusPosisi = '<button class="btn btn-primary">Preparation</button>';
		}
		else if ($posisi[0] == 1 && $posisi[1] == 1 && $posisi[2] == 1 && $posisi[3] == 0 && $posisi[4] == 0)
		
		{
			$statusPosisi = '<button class="btn btn-primary">Sewing</button>';
		}
		else if ($posisi[0] == 1 && $posisi[1] == 1 && $posisi[2] == 1 && $posisi[3] == 1 && $posisi[4] == 0)
		
		{
			$statusPosisi = '<button class="btn btn-primary">Assemblying</button>';
		}
		else if ($posisi[0] == 1 && $posisi[1] == 1 && $posisi[2] == 1 && $posisi[3] == 1 && $posisi[4] == 1)
		
		{
			$statusPosisi = '<button class="btn btn-success">Finishing</button>';
		}
		
		return $statusPosisi;
	}
}