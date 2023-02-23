<?php

session_start();

require '../../vendor/autoload.php';

class PDF extends FPDF {
function Head() {
  $this->SetFont('Arial','B',32);
  $this->setFillColor(176,224,230);
  $this->setTextColor(0,0,139);
  $this->Cell(0,20,'PROFILE',1,1,'C',1);
}

function Profile($name, $phone, $email) {
  $this->setFillColor(255,255,255);
  $this->setTextColor(0,0,0);
  $this->SetDrawColor(0,0,0);
  $this->SetLineWidth(.3);
  $this->SetFont('Helvetica','B',14);
  $w = 100;
  // Name section
  $txt = "NAME : " . $name;
  $this->Cell($w,25,$txt,1,0,'L',true);
  $this->Cell(90,25,'','LR',1);
  // Phone section
  $dail = "PHONE NUMBER : " . $phone;
  $this->Cell($w,25,$dail,1,0,'L',true);
  $this->Cell(90,25,'','LR',1);
  // Email section
  $mail = "EMAIL ID : " . $email;
  $this->Cell($w,25,$mail,1,0,'L',true);
  $this->Cell(90,25,'','LR',1);
}

function FancyTable($header, $subject, $grade) {
	// Colors, line width and bold font
	$this->SetFillColor(0, 114, 160);
	$this->SetTextColor(255);
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('Helvetica','B',13);
	// Header
	$w = array(62, 66, 62);
	for($i=0;$i<count($header);$i++)
	  $this->Cell($w[$i],10,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
  $sn = 1;
	for ($i=0; $i<count($subject); $i++) {
    $this->Cell($w[0],9,$sn,'LR',0,'C',$fill);
		$this->Cell($w[1],9,$subject[$i],'LR',0,'C',$fill);
		$this->Cell($w[0],9,$grade[$i],'LR',0,'C',$fill);
		$this->Ln();
		$fill = !$fill;
		$sn += 1;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('SL No.', 'SUBJECT', 'MARKS');
// Row data
$course = $_SESSION['course'];
$score = $_SESSION['marks'];
// Name value
$name = $_SESSION["name"];
// Image path
$imgpath = $_SESSION['img'];
// Phone number value
$phone = $_SESSION['phone'];
//Email address
$email = $_SESSION['email'];

$pdf->SetFont('Helvetica','B',15);
$pdf->AddPage();
// Heading
$pdf->Head();
// Profile information
$pdf->Profile($name,$phone,$email);
$pdf->Image($imgpath, 120, 40, 70, 55);
$pdf->Cell(0,15,"SCORE CARD",1,1,'C',1);
$pdf->FancyTable($header,$course,$score);
$pdf->Output('D','profile.pdf');

?>