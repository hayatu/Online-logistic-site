<?php
//include connection file 
require_once("common/db_func.php");
$conn = db_connect();	
include_once('libs/fpdf.php');

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
    $this->Cell(10,1,'Mesihpasa Mh. Mesihpasa Cad. Aksa is Markezi No:8/207');
    // Line break
    $this->Ln(5);
	// Move to the right
    $this->Cell(70);
	$this->Cell(10,1,'Aksaray, Fatih Istanbul');
	$this->Ln(5);
	 // Move to the right
	$this->Cell(70);
	$this->Cell(10,1,'Telephone No:0212 638 00 97 / +90 534 216 42 76 / +90 542 278 02 77');
	$this->Ln(5);
	 // Move to the right
	$this->Cell(70);
	$this->Cell(10,1,'Email: Info@somturklogistics.com');
	$this->Ln(15);
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
//$connString =  $db->getConnstring();

$display_heading = array('order_id'=>'ID', 'order_receiver_name'=> 'Name', 'order_receiver_address'=> 'Address','order_no'=> 'Number',
'order_date'=> 'Date','item_name'=> 'Item', 'item_type'=> 'Type','order_item_quantity'=> 'Quantity','item_kg'=> 'KG','order_item_price'=> 'Price',
'order_item_cleanse'=> 'Cleanse','order_item_actual_amount'=> 'Actual Amount','order_item_final_amount'=> 'Total',);
$query1 = sprintf("SELECT order_id, order_receiver_name, order_receiver_address, order_no,order_date,item_name,item_type,order_item_quantity
,item_kg,order_item_price,order_item_cleanse,order_item_actual_amount,order_item_final_amount FROM tbl_order_item );
	$n = db_select_query($conn, $query1, $rs_activities);
	
	$query2 = sprintf("SHOW columns FROM tbl_order_item");
	$n = db_select_query($conn, $query2, $rs_activities1);
	db_close($conn);
	
//$result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
//$header = mysqli_query($connString, "SHOW columns FROM employee");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($rs_activities1 as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($rs_activities as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>