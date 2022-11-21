<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();
   $query = sprintf("update tbl_order_item set order_receiver_name = %s, order_receiver_address = %s, order_no = %s, order_date = %s, item_name = %s, item_type = %s, order_item_quantity = %s, item_kg= %s,order_item_price= %s,
  order_item_cleanse = %s,order_item_actual_amount = %s, order_item_final_amount = %s where order_id = %s",     
			   GetSQLValueString($_REQUEST["order_receiver_name"], "text"),
				GetSQLValueString($_REQUEST["order_receiver_address"], "text"),							
				GetSQLValueString($_REQUEST["order_no"], "int"),
				GetSQLValueString($_REQUEST["order_date"], "text"),
				GetSQLValueString($_REQUEST["item_name"], "text"),
				GetSQLValueString($_REQUEST["item_type"], "text"),
				GetSQLValueString($_REQUEST["order_item_quantity"], "text"),
				GetSQLValueString($_REQUEST["item_kg"], "text"),
				GetSQLValueString($_REQUEST["order_item_price"], "text"),
				GetSQLValueString($_REQUEST["order_item_cleanse"], "text"),
				GetSQLValueString($_REQUEST["order_item_actual_amount"], "text"),
				GetSQLValueString($_REQUEST["order_item_final_amount"], "text"),
				GetSQLValueString($_REQUEST["invoice-id"], "int"));
			$n1 = db_other_query($conn, $query);			
db_close($conn);
header("Location: invoice-update-form.php?invoice-id=".$_REQUEST["invoice-id"]); 
//header("Location: invoices-list.php");
?>

