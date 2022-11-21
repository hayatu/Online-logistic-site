<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();
     $query2 = sprintf("update tble_customer_info set customer_name = %s, customer_surname = %s, registration_date= %s ,country_id= %s, email = %s, tel = %s, fax= %s, address = %s  where id = %s",						
						GetSQLValueString($_REQUEST["customer_name"], "text"),						
						GetSQLValueString($_REQUEST["customer_surname"], "text"),
						GetSQLValueString($_REQUEST["registration_date"], "text"),
						GetSQLValueString($_REQUEST["country_id"], "int"),	
						GetSQLValueString($_REQUEST["email"], "text"),
						GetSQLValueString($_REQUEST["tel"], "text"),
						GetSQLValueString($_REQUEST["fax"], "text"),
						GetSQLValueString($_REQUEST["address"], "text"),
						GetSQLValueString($_REQUEST["customer-id"], "int"));
	$n2 = db_other_query($conn, $query2);	
			
	db_close($conn);	
	header("Location: customers-list.php");
	?>

