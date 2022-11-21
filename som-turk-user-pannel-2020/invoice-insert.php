<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

if(isset($_POST['submit'])){
	$order_receiver_name = $_POST['order_receiver_name'];
	$order_receiver_address = $_POST['order_receiver_address'];
	$order_no = $_POST['order_no'];
	$order_date = $_POST['order_date'];
	$item_name = $_POST['item_name'];
		$item_type = $_POST['item_type'];
		$order_item_quantity = $_POST['order_item_quantity'];
		$item_kg = $_POST['item_kg'];
		$order_item_price = $_POST['order_item_price'];
		$order_item_cleanse = $_POST['order_item_cleanse'];
		$order_item_actual_amount = $_POST['order_item_actual_amount'];
		$order_item_final_amount = $_POST['order_item_final_amount'];
	foreach($item_name as $key=>$un){
		echo $un;
		 echo $query = sprintf("insert into tbl_order_item (order_receiver_name,order_receiver_address,order_no,order_date,item_name, item_type,order_item_quantity, item_kg, order_item_price, order_item_cleanse,order_item_actual_amount,order_item_final_amount) 
	                     values (%s, %s ,%s, %s, %s,%s,%s,%s,%s,%s,%s,%s)",
						 GetSQLValueString($order_receiver_name, "text"),	
						 GetSQLValueString($order_receiver_address, "text"),	
						 GetSQLValueString($order_no, "text"),	
						 GetSQLValueString($order_date, "text"),	
						GetSQLValueString($un, "text"),						
						GetSQLValueString($item_type[$key], "text"),
						GetSQLValueString($order_item_quantity[$key], "text"),
						GetSQLValueString($item_kg[$key], "text"),	
						GetSQLValueString($order_item_price[$key], "text"),
						GetSQLValueString($order_item_cleanse[$key], "text"),
						GetSQLValueString($order_item_actual_amount[$key], "text"),
						GetSQLValueString($order_item_final_amount[$key], "text"));
					$n = db_other_query($conn, $query);
	}
	db_close($conn);
	}
	 header("Location: invoices-list.php"); 
	
?>



