<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();
     echo $query2 = sprintf("update tble_barcode_info set customer_name = %s, customer_surname = %s, registration_date= %s ,country_name= %s, shipping_model = %s, tel = %s, weight= %s, address = %s  where id = %s",						
						GetSQLValueString($_REQUEST["customer_name"], "text"),						
						GetSQLValueString($_REQUEST["customer_surname"], "text"),
						GetSQLValueString($_REQUEST["registration_date"], "text"),
						GetSQLValueString($_REQUEST["country_name"], "text"),	
						GetSQLValueString($_REQUEST["shipping_model"], "text"),
						GetSQLValueString($_REQUEST["tel"], "text"),
						GetSQLValueString($_REQUEST["weight"], "text"),
						GetSQLValueString($_REQUEST["address"], "text"),
						GetSQLValueString($_REQUEST["barcode-id"], "int"));
	$n2 = db_other_query($conn, $query2);	
			
	db_close($conn);	
	header("Location: barcode-list.php");
	?>

