<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MX_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->helper('text');
		$this->load->model('m_rawat_jalan');
		$this->load->model('m_diagnosa');
	}
	
	function index()
	{
		$this->load->library('m_pdf');
		$no_registrasi = $_GET['id'];
		$data['title'] 			= 'Rawat Jalan';
		$data['pasien'] = $this->m_rawat_jalan->get_rel_rajal($no_registrasi);
		$this->load->view('laporan', $data);
	}
	
	public function cobapdf()
    {
        // Muat library PDF
        $this->load->library('pdf');
 
        // Buat HTML atau load dari view
        $html = "<div class='kotak' ".
                "style='border:2px solid #ccc; ".
                "padding: 20px; ".
                "background: #aaf;' ".
                ">".
                "<h1>Demo CodeIgniter dan mPDF. Mantap!</h1>".
                "<a href='http://duniahost.com'>Web Hosting</a>".
                "</div>"; 
 
        // Lakukan pengerjaan PDF
        $this->pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
        $this->pdf->WriteHTML($html);
        $this->pdf->Output("output.pdf", 'I');
    }
}
?>