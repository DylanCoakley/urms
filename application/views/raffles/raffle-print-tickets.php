<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// create new PDF document
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('RaffleTickets');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(1);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 25);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);


// add a page
//$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(5, 2, 2, 2);

// set cell margins
//$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 255);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$counter = 0;
$line_break = 0;

foreach ($tickets as $ticket) {
	// add a page
	if($counter % 20 === 0) {
		$pdf->AddPage();
	}
	
	$name    = "Name:      ".$ticket['Name']."\r\n";
	$address = "Address:  ".$ticket['Address']."\r\n";
	$phone   = "Phone #:   ".$ticket['Phone']."\r\n";
	$email   = "Email:      ".$ticket['Email'];
	$txt = $name.$address.$phone.$email;

	$pdf->MultiCell(90, 6, $txt, 1, 'L', 0, $line_break, '', '', true);

	$line_break = ($line_break + 1) % 2;
	$counter++;
}

// move pointer to last page
$pdf->lastPage();


//Close and output PDF document
$pdf->Output('RaffleTickets.pdf', 'I');

?>