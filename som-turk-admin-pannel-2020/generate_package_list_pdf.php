<?php
//include connection file 
require_once("common/db_func.php");
$conn = db_connect();	
include_once('libs/fpdf.php');
$query = sprintf("select * from tbl_package_list_item where order_id = %s", GetSQLValueString($_REQUEST["package-id"], "int") );
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
$column8=$rs_invoice_info[0]["order_item_quantity"].' '.$rs_invoice_info[0]["item_kg"];
$column9='$'.''.$rs_invoice_info[0]["order_item_price"];
$column10= '$'.''.$rs_invoice_info[0]["order_item_final_amount"];
$column11=$rs_invoice_info[0]["order_item_final_cbm"];
$column12=$rs_invoice_info[0]["order_item_final_volum"];
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
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(55, 5, 'Box:', 0, 0);
$pdf->Cell(58, 5, $column6, 0, 1);
$pdf->Cell(55, 5, 'Ammount:', 0, 0);
$pdf->Cell(58, 5, $column8, 0, 1);
$pdf->Cell(55, 5, 'Price', 0, 0);
$pdf->Cell(58, 5, $column9, 0, 1);
$pdf->Cell(55, 5, 'Total Price', 0, 0); 
$pdf->Cell(58, 5, $column10, 0, 1);
$pdf->Cell(55, 5, 'CBM', 0, 0);
$pdf->Cell(58, 5, $column11, 0, 1);
$pdf->Cell(55, 5, 'Volume', 0, 0);
$pdf->Cell(58, 5, $column12, 0, 1);
$pdf->Ln(10);//Line break
$pdf->Cell(55, 5, 'Paid by', 0, 0);
$pdf->Cell(58, 5, $column1, 0, 1);
$pdf->Line(1, 75, 208, 75);
$pdf->Ln(5);//Line break
$pdf->Cell(140, 5, '', 0, 0);
//$pdf->Cell(50, 5, ': Signature', 0, 1, 'C');
$pdf->Image('img/signature.png',1,150,70);

//$pdf->SetFont('Arial','',12);
$pdf->Output();
?>