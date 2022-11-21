<?php
//include connection file 
require_once("common/db_func.php");
$conn = db_connect();	
include_once('libs/fpdf.php');
$query = sprintf("select * from tbl_order_item where order_id = %s", GetSQLValueString($_REQUEST["invoice-id"], "int") );
	$n = db_select_query($conn, $query, $rs_invoice_info);
	
class PDF extends FPDF

{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',1,-1,70);
    $this->SetFont('Arial','I',10);
    // Move to the right
    $this->Cell(70);
    // Title
    $this->Cell(10,1);
    // Line break
    $this->Ln(5);
	// Move to the right
    $this->Cell(70);
	$this->Cell(10,1);
	$this->Ln(5);
	 // Move to the right
	$this->Cell(70);
	$this->Cell(10,1);
		 // Move to the right
	$this->Cell(70);
	$this->Cell(10,1);
	$this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//$db = new dbObj();

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$column1=$rs_invoice_info[0]["order_receiver_name"];
$column2=$rs_invoice_info[0]["order_date"];
$column3=$rs_invoice_info[0]["order_receiver_address"];
$column4=$rs_invoice_info[0]["order_no"];
$column5=$rs_invoice_info[0]["order_id"];  
$column6=$rs_invoice_info[0]["item_name"];
$column7=$rs_invoice_info[0]["item_type"];
$column8=$rs_invoice_info[0]["order_item_quantity"];
$column9=$rs_invoice_info[0]["item_kg"];
$column10=$rs_invoice_info[0]["order_item_price"];
$column11=$rs_invoice_info[0]["order_item_cleanse"];
$column12=$rs_invoice_info[0]["order_item_actual_amount"];
$column13=$rs_invoice_info[0]["order_item_final_amount"];
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,'Mesihpasa Mh. Mesihpasa Cad. Aksa is Merkez No:8/207',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,'Aksaray, Fatih',0,0);

$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Istanbul, Turkey, 34093]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$column2,0,1);//end of line

$pdf->Cell(130	,5,'Phone [+90 534 216 42 76 / +90 542 278 02 77]',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$column4,0,1);//end of line

$pdf->Cell(130	,5,'Telephone [0212 638 00 97]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$column5,0,1);//end of line
$pdf->Cell(130	,5,'Email: Info@somturklogistics.com',0,0);
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$column1,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$column3,0,1);
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Amount',1,0);
$pdf->Cell(34	,5,'Price',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130	,5,$column6,1,0);
$pdf->Cell(25	,5,$column8,1,0);
$pdf->Cell(34	,5,$column10,1,1,'R');//end of line

$pdf->Cell(130	,5,$column7,1,0);
$pdf->Cell(34	,5,$column9,1,1,'L');//end of line
//summary

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(28	,5,'Cleanse+awb',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,$column11,1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Actual Amt.',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,$column12,1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,$column13,1,1,'R');//end of line
$pdf->Image('img/signature.png',1,110,70);

//$pdf->SetFont('Arial','',12);
$pdf->Output();
?>