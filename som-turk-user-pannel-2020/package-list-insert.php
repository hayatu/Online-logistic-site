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
		$order_item_final_amount = $_POST['order_item_final_amount'];
		$order_item_lenght = $_POST['order_item_lenght'];
		$order_item_width = $_POST['order_item_width'];
		$order_item_height = $_POST['order_item_height'];
		$order_item_final_cbm = $_POST['order_item_final_cbm'];
		$order_item_volume_lenght = $_POST['order_item_volume_lenght'];
		$order_item_volume_width = $_POST['order_item_volume_width'];
		$order_item_volume_height = $_POST['order_item_volume_height'];
		$order_item_final_volum = $_POST['order_item_final_volum'];
	foreach($item_name as $key=>$un){
		 $un;
		 echo $query = sprintf("insert into tbl_package_list_item (order_receiver_name,order_receiver_address,order_no,order_date,item_name, item_type,order_item_quantity, item_kg, order_item_price,order_item_final_amount,
		 order_item_lenght,order_item_width,order_item_height,order_item_final_cbm,order_item_volume_lenght,order_item_volume_width,order_item_volume_height,order_item_final_volum) 
	                     values (%s, %s ,%s, %s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
						 GetSQLValueString($order_receiver_name, "text"),	
						 GetSQLValueString($order_receiver_address, "text"),	
						 GetSQLValueString($order_no, "text"),	
						 GetSQLValueString($order_date, "text"),	
						GetSQLValueString($un, "text"),						
						GetSQLValueString($item_type[$key], "text"),
						GetSQLValueString($order_item_quantity[$key], "text"),
						GetSQLValueString($item_kg[$key], "text"),	
						GetSQLValueString($order_item_price[$key], "text"),	
						GetSQLValueString($order_item_price[$key], "text"),			
						GetSQLValueString($order_item_lenght[$key], "text"),
						GetSQLValueString($order_item_width[$key], "text"),
						GetSQLValueString($order_item_height[$key], "text"),
						GetSQLValueString($order_item_final_cbm[$key], "text"),
						GetSQLValueString($order_item_volume_lenght[$key], "text"),
						GetSQLValueString($order_item_volume_width[$key], "text"),
						GetSQLValueString($order_item_volume_height[$key], "text"),
						GetSQLValueString($order_item_final_volum[$key], "text"));
					$n = db_other_query($conn, $query);
	}
	db_close($conn);
	}
	header("Location: package-list.php"); 
	
	
?>



