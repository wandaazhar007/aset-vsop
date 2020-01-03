<?php
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Klinik MRC');
$pdf->SetTitle('Cetak Kartu Berobat');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData();

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(1,1, 1);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

foreach ($kartu as $key ) {


    $noin=$key->nama_pasien;
    $noin=date('m-Y');

	$pdf->SetFont('times', '', 11);
	$pdf->AddPage('L','A7');

               

    $no=1;
	$pdf->Ln(2);
    $pdf->SetFont('times','B',12);
    $pdf->cell(0,0,'KARTU BEROBAT PASIEN', 0, 1, 'C', 0);
//	$pdf->image(base_url().'logo_mrc.jpg',50,60,24);
	$pdf->Ln(0);
	$pdf->cell(0,0,'KLINIK MRC', 0, 1, 'C', 0);
    $pdf->SetFont('helvetica','B',12);
    $pdf->SetFont('times', '', 10);
    $pdf->Ln(1);
	$pdf->cell(0,0,'Jl. BSD Raya No.1, Kota Tangerang Selatan, Tlp. 021-7419399', 0, 1, 'C', 0);
    $pdf->SetFont('times', '', 10);


    $pdf->Ln(10);
    $pdf->cell(0,0,'Nama Pasien     : ' .$key->nama_pasien, 0, 1, 'L', 0);
    //$pdf->Ln(2);
	$pdf->Ln(2);
    $pdf->cell(0,0,'No Rekam Medis  : ' .$key->no_rm, 0, 1, 'L', 0);
	
	$pdf->Ln(2);
    $pdf->cell(0,0,'Tanggal Lahir   : ' .$key->tanggal_lahir, 0, 1, 'L', 0);
	
    $pdf->SetFont('times', '', 10);
//    $pdf->cell(0,0,'Note:', 0, 1, 'L', 0);
    $pdf->Ln(2);
	$pdf->cell(0,0,'*Harap membawa kartu ini setiap Anda berobat', 0, 1, 'L', 0);
	
	
   
}


//Close and output PDF document
$pdf->Output('example.pdf', 'I');

