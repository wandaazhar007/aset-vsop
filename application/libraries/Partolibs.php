<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partolibs 
{
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
		$this->model = $CI->load->model('m_diagnosa');
    }
	
	function status_resti_ranap($id_diagnosa)
	{
		$data_diagnosa = $this->model->m_diagnosa->getDiagnosaDetail($id_diagnosa);
		if($data_diagnosa != FALSE)
		{
			foreach($data_diagnosa as $d)
			{
				$letak_janin 		= $d->letak_janin;
				$ketuban			= $d->ketuban_pecah_dini;
				$ruptur_perineum	= $d->ruptur_perineum;
				$berat				= $d->berat_badan_bayi;
				$pendarahan			= $d->pendarahan;
			}
			
			if(!empty($letak_janin) || !empty($ketuban) || !empty($ruptur_perineum) || !empty($berat) || !empty($pendarahan))
			{
				$s_letak_janin 		= $letak_janin == 'kepala' ? '1' : '0';
				$s_ketuban 			= $ketuban <= '6' ? '0' : '1';
				$s_ruptur_perineum 	= ($ruptur_perineum == '3' || $ruptur_perineum == '4') ? '1' : '0';
				$s_berat 			= ($berat < '2500' || $berat > '4000') && (!empty($berat) || $berat == '0')? '1' : '0';
				$s_pendarahan		= $pendarahan > '500' ? '1' : '0';

				//	MENENTUKAN STATUS //

				if($s_letak_janin == '1' || $s_ketuban == '1' || $s_ruptur_perineum == '1' || $s_berat == '1' || $s_pendarahan == '1')
				{
					$status = '<button class="btn btn-danger m-1">RESTI</button>';
					$resti = 'TRUE';
					//$status = ''.$s_letak_janin.' | '.$s_ketuban.' | '.$s_ruptur_perineum.' | '.$s_berat.'';
				}
				else
				{

					$status = '<button class="btn btn-success m-1">NORMAL</button>';
					$resti = 'FALSE';
				}

				// END MENENTUKAN STATUS //

				// CREATE MESSAGE //

				if($s_letak_janin == '0' && $s_ketuban == '0' && $s_ruptur_perineum == '0' && $s_berat == '0' && $s_pendarahan == '0')
				{
					$message = "Pasien Kondisi Normal";
					$resti = 'FALSE';
				}
				else
				{
					$message = "<ul><strong>";

					$s_letak_janin 		== '1' ? $message .= "<li>Kondisi Letak Janin Pasien ".$letak_janin."</li>" : "";

					$s_ketuban 			== '1' ? $message .= "<li>Ketuban Telah Pecah Dini Selama ".$ketuban." Jam</li>" : "";

					$s_ruptur_perineum 	== '1' ? $message .= "<li>Pasien Mengalami Ruptur Perineum Grade ".$ruptur_perineum."</li>" : "";

					$s_berat 			== '1' ? $message .= "<li>Berat Badan Bayi ".$berat." gram</li>" : "";
					
					$s_pendarahan 		== '1' ? $message .= "<li>Pasien Mengalami Pendarahan lebih dari 500 CC</li>" : "";

					$message .= "</strong></ul>";
					$resti = 'TRUE';
				}

				// END MESSAGE //

				$return_data = array('status' => $status, 'message' => $message, 'resti' => $resti);
			}
			else
			{
				$return_data = array('status' => '<button class="btn btn-default m-1"> - </button>', 'message' => 'Belum Diagnosa', 'resti' => 'FALSE');
			}
			
		}
		
		return $return_data;
		
	}
	
	function status_resti_rajal($id_diagnosa)
	{
		$data_diagnosa = $this->model->m_diagnosa->getDiagnosaDetail($id_diagnosa);
		if($data_diagnosa != FALSE)
		{
			foreach($data_diagnosa as $d)
			{
				$tinggi					= $d->tinggi;
				$berat					= $d->berat;
				$tekanan_darah_sistole	= $d->tekanan_darah_sistole;
				$tekanan_darah_diastole	= $d->tekanan_darah_diastole;
				$lila					= $d->lila;
				$jumlah_anak			= $d->jumlah_anak;
				$djj					= $d->djj;
				$gemelli				= $d->gemelli;
				$bekas_sc				= $d->bekas_sc;
				$pendarahan				= $d->pendarahan;
				$protein_urea			= $d->proteinurea;
				$hemoglobin				= $d->hemoglobin;
				$hipertensi				= $d->hipertensi;
				$diabetes_melitus		= $d->diabetes_melitus;
				$tbc					= $d->tbc;
				$asma_bronkhiale		= $d->asma_bronkhiale;
				$b20					= $d->b20;
			}
			
			
			
			if(!empty($tinggi) || !empty($tekanan_darah_sistole) || !empty($tekanan_darah_diastole) || !empty($lila) || !empty($jumlah_anak)
			   || !empty($djj) || !empty($gemelli) || !empty($bekas_sc) || !empty($pendarahan) || !empty($protein_urea) || !empty($hemoglobin) || !empty($hipertensi) || !empty($diabetes_melitus) || !empty($tbc) || !empty($b20))
			{
				$s_tinggi					= $tinggi < '145' ? '1' : '0' ;
				$s_tekanan_darah_sistole	= $tekanan_darah_sistole >= '140' ? '1' : '0';
				$s_tekanan_darah_diastole	= $tekanan_darah_diastole > '90' ? '1' : '0';
				$s_lila						= $lila < '23.5' ? '1' : '0';
				$s_jumlah_anak				= $jumlah_anak >= '5' ? '1' : '0';
				$s_djj						= ($djj > '160' || $djj < '120') ? '1' : '0';
				$s_gemelli					= $gemelli == 'positif' ? '1' : '0';
				$s_bekas_sc					= $bekas_sc == 'positif' ? '1' : '0';
				$s_pendarahan				= $pendarahan > '500' ? '1' : '0';
				$s_protein_urea				= $protein_urea >= 1 ? '1' : '0';
				$s_hemoglobin				= $hemoglobin < 7 ? '1' : '0';
				$s_hipertensi				= $hipertensi == '1' ? '1' : '0';
				$s_diabetes_melitus			= $diabetes_melitus == '1' ? '1' : '0';
				$s_tbc						= $tbc == '1' ? '1' : '0';
				$s_asma_bronkhiale			= $asma_bronkhiale == '1' ? '1' : '0';
				$s_b20						= $b20 == '1' ? '1' : '0';
				
			if($s_hipertensi == '1' || $s_diabetes_melitus == '1' || $s_tbc	== '1' || $s_asma_bronkhiale == '1' || $asma_bronkhiale == '1' || $s_b20 == '1')
			{
				$riwayat_penyakit = '1';
			}else
			{
				$riwayat_penyakit = '0';
				$resti = 'FALSE';
			}	
				
				//if($riwayat_penyakit == '0')
				//{
					//	MENENTUKAN STATUS //

					if($s_tinggi == '1' || $s_tekanan_darah_diastole == '1' || $s_tekanan_darah_sistole == '1' || $s_lila == '1' || $s_jumlah_anak == '1'
					   || $s_djj == '1' || $s_gemelli == '1' || $s_bekas_sc == '1' || $s_pendarahan == '1' || $s_protein_urea == '1' || $s_hemoglobin == '1' || $riwayat_penyakit == '1')
					{
						$status = '<button class="btn btn-danger m-1">RESTI</button>';
						//$status = ''.$s_letak_janin.' | '.$s_ketuban.' | '.$s_ruptur_perineum.' | '.$s_berat.'';
						$message = "";
						$resti = 'TRUE';
						
						if($riwayat_penyakit == '1')
						{
							$message .= "<strong>Pasien Memiliki Riwayat Penyakit :</strong></br>";
							$message .= "<ul>";
							
							$s_hipertensi		== '1' ? $message .= "<li>Pasien Mempunyai Riwayat Penyakit <strong>Hipertensi</strong></li>" : "";
							$s_diabetes_melitus	== '1' ? $message .= "<li>Pasien Mempunyai Riwayat Penyakit <strong>Diabetes Melitus</strong></li>" : "";
							$s_tbc				== '1' ? $message .= "<li>Pasien Mempunyai Riwayat Penyakit <strong>TBC</strong></li>" : "";
							$s_b20				== '1' ? $message .= "<li>Pasien Mempunyai Riwayat Penyakit <strong>B20</strong></li>" : "";
							
							$message .= "</ul>";
						}else
						{
							$message .= "Pasien Tidak Memiliki Riwayat Penyakit</br>";
							$resti = 'FALSE';
						}
						
						$message .= "<hr/>";
						//$riwayat_penyakit		== '1' ? $message .= "<li>Pasien Memiliki Riwayat Penyakit</li>" : "";
						
						if($s_tinggi == '1' || $s_tekanan_darah_diastole == '1' || $s_tekanan_darah_sistole == '1' || $s_lila == '1' || $s_jumlah_anak == '1'
					   || $s_djj == '1' || $s_gemelli == '1' || $s_bekas_sc == '1' || $s_pendarahan == '1' || $s_protein_urea == '1' || $s_hemoglobin == '1')
						{
							$message .= "<strong>Pasien Memiliki Parameter Resiko Tinggi :</strong></br></br>";
							$message .= "<ul>";
							
							$s_tinggi		== '1' ? $message .= "<li>Tinggi Pasien di Bawah 145 CM</li>" : "";

							$s_tekanan_darah_sistole 			== '1' ? $message .= "<li>Tekanan Darah Pasien <strong>Melebihi 140 mmHg</strong></li>" : "";

							$s_tekanan_darah_diastole 	== '1' ? $message .= "<li>Tekanan Darah Pasien <strong>Kurang Dari 90 mmHg</strong></li>" : "";

							$s_lila 			== '1' ? $message .= "<li>Parameter LILA Pasien <strong>kurang dari 23.5 Cm</strong></li>" : "";

							$s_jumlah_anak 			== '1' ? $message .= "<li>Pasien Telah Memiliki Anak <strong>Lebih dari 4</strong></li>" : "";

							$s_djj 			== '1' ? $message .= "<li>Detak Jantung Janin Pasien <strong>Kurang dari 120 djj/menit</strong> atau <strong>Lebih dari 160 djj/menit</strong></li>" : "";

							$s_gemelli			== '1' ? $message .= "<li>Pasien <strong>Positif Gemelli</strong></li>" : "";

							$s_bekas_sc 			== '1' ? $message .= "<li>Pasien <strong>Positif Bekas SC</strong></li>" : "";

							$s_pendarahan 			== '1' ? $message .= "<li>Pasien Mengalami Pendarahan <strong>lebih dari 500 CC</strong></li>" : "";

							$s_protein_urea 			== '1' ? $message .= "<li>Pasien Memiliki Protein Uria <strong>Lebih dari +1</strong></li>" : "";

							$s_hemoglobin 			== '1' ? $message .= "<li>Pasien Memiliki Hemoglobin <strong>Kurang dari 7</strong></li>" : "";

							$message .= "</ul>";
							$resti = 'TRUE';
						}
						else
						{
							$message .= "Pasien Tidak Memiliki Parameter Resiko Tinggi</br>";
							$resti = 'FALSE';
						}

						
					}
					else
					{

						$status = '<button class="btn btn-success m-1">NORMAL</button>';
						$message = "Pasien Kondisi Normal";
						$resti = 'FALSE';
					}
				
				$return_data = array('status' => $status, 'message' => $message, 'resti' => $resti);
			}
			else
			{
				$return_data = array('status' => '<button class="btn btn-default m-1"> - </button>', 'message' => 'Belum Diagnosa', 'resti' => 'FALSE');
			}
			
		}
		
		return $return_data;
		
	}
	
	function cekPos($posisi)
	{
		switch ($posisi)
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
	
	function cekStatus($status)
	{
		switch ($status)
        {
            case '1': $return = '<button class="btn btn-default m-1">Rawat Jalan</button>';
             
                break;
            case '2': $return = '<button class="btn btn-info m-1">Rujuk Ranap</button>';
               
                break;
			case '3': $return = '<button class="btn btn-danger m-1">Meninggal</button>';
               
                break;
			case '4': $return = '<button class="btn btn-success m-1">Selesai</button>';
               
                break;
			case '5': $return = '<button class="btn btn-warning m-1">Rujuk RS Lain</button>';
               
                break;
				
		}
		return $return;
	}
	
	function cekPosisi($posisi)
	{
		switch ($posisi)
        {
            case '1': $return = '<button class="btn btn-success m-1">Puskesmas</button>';
             
                break;
            case '2': $return = '<button class="btn btn-info m-1">RSUD</button>';
               
                break;
			case '3': $return = '<button class="btn btn-danger m-1">RS Lain</button>';
               
                break;
				
		}
		return $return;
	}
	
	function checkRiwayatPenyakit($status)
	{
		if($status == '1')
		{
			$return = 'checked';
		}
		else
		{
			$return = '';
		}
		
		return $return;
	}
	
	function dash_status($status, $posisi)
	{
		$CI =& get_instance();
		$jml_registrasi = $CI->datamapper->countQuery("SELECT * FROM tb_registrasi WHERE trash = '0'");
		
		/*$queryadd = "";
        if($pus != '99' && $pus != '98' )
        {
            $queryadd .= "  and tb_registrasi.puskesmas='".$pus."' ";
        }*/
		
		$q_diagnosa = $this->db->query("SELECT * FROM tb_registrasi WHERE diagnosa = '1' AND status = '$status' AND posisi = '$posisi'");
		
	}
	
	function grafik_kunjungan()
	{
		$CI =& get_instance();
		$hari = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
		$c_hari = count($hari);
		for($i=0; $i < $c_hari; $i++)
		{
			$data = $CI->datamapper->countQuery("SELECT DAYNAME(tgl_kunjungan) as hari FROM tb_registrasi WHERE DAYNAME(tgl_kunjungan) = '$hari[$i]'");
			$return[] = array('hari' => ''.$hari[$i].'', 'Jumlah' => (int)$data);
		}
		
		return $return;
	}
	
	function jenis_pasien()
	{
		$CI =& get_instance();
		$jenis = array('RESTI', 'NORMAL');
		/*$jml_registrasi = $CI->datamapper->countQuery("SELECT
														tb_diagnosa.id_diagnosa
														FROM
														tb_registrasi
														INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
														WHERE
														tb_registrasi.diagnosa = '1'");*/
		
		$data_rajal = $this->db->query("SELECT
									tb_diagnosa.id_diagnosa
									FROM
									tb_registrasi
									INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
									WHERE
									tb_registrasi.diagnosa = '1' AND tb_registrasi.status = '1'");
		$data_ranap = $this->db->query("SELECT
									tb_diagnosa.id_diagnosa
									FROM
									tb_registrasi
									INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
									WHERE
									tb_registrasi.diagnosa = '1' AND tb_registrasi.status = '2'");
		
		if($data_rajal->num_rows()>0)
		{
			foreach($data_rajal->result() as $row)
				{
					$id_diagnosa_rajal[] = $row->id_diagnosa;	
				}
		}
		
		if($data_ranap->num_rows()>0)
		{
			foreach($data_ranap->result() as $row)
				{
					$id_diagnosa_ranap[] = $row->id_diagnosa;	
				}
		}
		
		$jml_diagnosa_rajal = count($id_diagnosa_rajal);
		$jml_diagnosa_ranap = count($id_diagnosa_ranap);
		
		for($i=0; $i<$jml_diagnosa_rajal; $i++)
		{
			$r_rajal = $this->status_resti_rajal($id_diagnosa_rajal[$i]);
			if($r_rajal['resti'] == 'TRUE')
			{
				$resti_rajal[] = $r_rajal['resti'];
			}else
			{
				$normal_rajal[] = $r_rajal['resti'];
			}
		}
		
		for($i=0; $i<$jml_diagnosa_ranap; $i++)
		{
			$r_ranap = $this->status_resti_ranap($id_diagnosa_ranap[$i]);
			
			if($r_ranap['resti'] == 'TRUE')
			{
				$resti_ranap[] = $r_ranap['resti'];
			}else
			{
				$normal_ranap[] = $r_ranap['resti'];
			}
		}
		
		$c_resti_rajal = count($resti_rajal);
		$c_resti_ranap = count($resti_ranap);
		$c_normal_rajal = count($normal_rajal);
		$c_normal_ranap = count($normal_ranap);
		
		$pasien_resti = $c_resti_rajal + $c_resti_ranap;
		$pasien_normal = $c_normal_rajal + $c_normal_ranap;
		
		//$return = array('resti' => $c_resti_rajal, 'normal' => $pasien_normal);
		$return = array('jumlah' => $pasien_resti+$pasien_normal, 'resti' => $pasien_resti, 'normal' => $pasien_normal);
		
		return $return;
		
		
	}
	
	function jenis_pasien_bulan()
	{
		$CI =& get_instance();
		$year = date('Y');
		$bulan = array('01','02','03','04','05','06','07','08','09','10','11','12');
		$bstats = count($bulan);
		for($i=0 ; $i<$bstats ; $i++)
		{
			$data_rajal = $this->db->query("SELECT
										tb_diagnosa.id_diagnosa
										FROM
										tb_registrasi
										INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
										WHERE
										tb_registrasi.diagnosa = '1' AND tb_registrasi.status = '1' AND (MONTH(tb_registrasi.tgl_kunjungan)) = '$bulan[$i]' AND (YEAR(tb_registrasi.tgl_kunjungan)) = '$year'");
			$data_ranap = $this->db->query("SELECT
										tb_diagnosa.id_diagnosa
										FROM
										tb_registrasi
										INNER JOIN tb_diagnosa ON tb_registrasi.no_registrasi = tb_diagnosa.no_registrasi
										WHERE
										tb_registrasi.diagnosa = '1' AND tb_registrasi.status = '2' AND (MONTH(tb_registrasi.tgl_kunjungan)) = '$bulan[$i]' AND (YEAR(tb_registrasi.tgl_kunjungan)) = '$year'");
			
			if($data_rajal->num_rows()>0)
			{
				foreach($data_rajal->result() as $row)
					{
						$id_diagnosa_rajal[] = $row->id_diagnosa;	
					}
				
				$jml_diagnosa_rajal = count($id_diagnosa_rajal);
				
				for($a=0; $a<$jml_diagnosa_rajal; $a++)
				{
					$r_rajal = $this->status_resti_rajal($id_diagnosa_rajal[$a]);
					if($r_rajal['resti'] == 'TRUE')
					{
						$resti_rajal[] = $r_rajal['resti'];
					}else
					{
						$normal_rajal[] = $r_rajal['resti'];
					}
				}
				
				$c_resti_rajal = count($resti_rajal);
				$c_normal_rajal = count($normal_rajal);
				
			}else
			{
				$c_resti_rajal = 0;
				$c_normal_rajal = 0;
			}

			if($data_ranap->num_rows()>0)
			{
				foreach($data_ranap->result() as $row)
					{
						$id_diagnosa_ranap[] = $row->id_diagnosa;	
					}
				
				$jml_diagnosa_ranap = count($id_diagnosa_ranap);
				
				for($b=0; $b<$jml_diagnosa_ranap; $b++)
				{
					$r_ranap = $this->status_resti_ranap($id_diagnosa_ranap[$b]);

					if($r_ranap['resti'] == 'TRUE')
					{
						$resti_ranap[] = $r_ranap['resti'];
					}else
					{
						$normal_ranap[] = $r_ranap['resti'];
					}
				}
				
				$c_resti_ranap = count($resti_ranap);
				$c_normal_ranap = count($normal_ranap);

			}else
			{
				$c_resti_ranap = 0;
				$c_normal_ranap = 0;
			}

			
			

			$pasien_resti = $c_resti_rajal + $c_resti_ranap;
			$pasien_normal = $c_normal_rajal + $c_normal_ranap;
			
			//$return[] = $CI->utilities->bulan($bulan[$i]);
			$return[] = array('bulan' => $CI->utilities->bulan($bulan[$i]), 'resti' => $pasien_resti, 'normal' => $pasien_normal);
			
		}
		
		return $return;
	}
	
	function jmlHariRsu()
	{
		$CI =& get_instance();
		
		$tgl = date("Y-m-d");
		$selesai = $CI->datamapper->countQuery("SELECT tb_registrasi.no_registrasi FROM tb_registrasi WHERE tb_registrasi.puskesmas = '98' AND tb_registrasi.tgl_kunjungan LIKE '%$tgl%'");
	}
	
	function jmlHariPaku()
	{
		$CI =& get_instance();
		
		$tgl = date("Y-m-d");
		$selesai = $CI->datamapper->countQuery("SELECT tb_registrasi.no_registrasi FROM tb_registrasi WHERE tb_registrasi.puskesmas = '2' AND tb_registrasi.tgl_kunjungan LIKE '%$tgl%'");
		return $selesai;
	}
	
	function jmlHariRengas()
	{
		$CI =& get_instance();
		
		$tgl = date("Y-m-d");
		$selesai = $CI->datamapper->countQuery("SELECT tb_registrasi.no_registrasi FROM tb_registrasi WHERE tb_registrasi.puskesmas = '3' AND tb_registrasi.tgl_kunjungan LIKE '%$tgl%'");
		return $selesai;
	}
	
	function jmlHariCiputat()
	{
		$CI =& get_instance();
		
		$tgl = date("Y-m-d");
		$selesai = $CI->datamapper->countQuery("SELECT tb_registrasi.no_registrasi FROM tb_registrasi WHERE tb_registrasi.puskesmas = '1' AND tb_registrasi.tgl_kunjungan LIKE '%$tgl%'");
		return $selesai;
	}
}