<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

   $query = sprintf("update tbl_package_list_item set order_receiver_name = %s, order_receiver_address = %s, order_no = %s, order_date = %s, item_name = %s, item_type = %s, order_item_quantity = %s, item_kg= %s,order_item_price= %s,
  order_item_final_amount = %s, order_item_lenght = %s, order_item_width = %s, order_item_height=%s, order_item_final_cbm=%s,order_item_volume_lenght=%s,
  order_item_volume_width=%s, order_item_volume_height=%s,order_item_final_volum=%s  where order_id = %s",     
			   GetSQLValueString($_REQUEST["order_receiver_name"], "text"),
				GetSQLValueString($_REQUEST["order_receiver_address"], "text"),							
				GetSQLValueString($_REQUEST["order_no"], "int"),
				GetSQLValueString($_REQUEST["order_date"], "text"),
				GetSQLValueString($_REQUEST["item_name"], "text"),
				GetSQLValueString($_REQUEST["item_type"], "text"),
				GetSQLValueString($_REQUEST["order_item_quantity"], "text"),
				GetSQLValueString($_REQUEST["item_kg"], "text"),
				GetSQLValueString($_REQUEST["order_item_price"], "text"),
				GetSQLValueString($_REQUEST["order_item_final_amount"], "text"),
				GetSQLValueString($_REQUEST["order_item_lenght"], "text"),
				GetSQLValueString($_REQUEST["order_item_width"], "text"),
				GetSQLValueString($_REQUEST["order_item_height"], "text"),
				GetSQLValueString($_REQUEST["order_item_final_cbm"], "text"),
				GetSQLValueString($_REQUEST["order_item_volume_lenght"], "text"),
				GetSQLValueString($_REQUEST["order_item_volume_width"], "text"),
				GetSQLValueString($_REQUEST["order_item_volume_height"], "text"),
				GetSQLValueString($_REQUEST["order_item_final_volum"], "text"),
				GetSQLValueString($_REQUEST["package-id"], "int"));
			$n1 = db_other_query($conn, $query);			
db_close($conn);
header("Location: package-list-update-form.php?package-id=".$_REQUEST["package-id"]); 
//header("Location: invoices-list.php");
?>

