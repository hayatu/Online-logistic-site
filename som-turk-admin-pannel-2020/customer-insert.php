<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

 if($_REQUEST["email"] != ""){			
		$query = sprintf("SELECT email FROM tble_customer_info where email = %s ", GetSQLValueString($_REQUEST["email"], "text"));
		$n = db_select_query($conn, $query, $rs_customers);

		if($n > 0){
		// do not insert
		echo " <div class='container pt-3'> 	
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				 The email address already exists!.		
				<button class='btn btn-primary btn-sm btn-link'><a href='http://localhost/somturk/admin/customer-registration-form.php'><span class='text-white'>Go Back</span></a></button>				 
			</div>
		</div>";
		exit();
		} else {
			// insert 
			   echo $query1 = sprintf("insert into tble_customer_info(customer_name,customer_surname,registration_date ,country_id, email, tel, fax, address) values(%s, %s, %s, %s, %s, %s,%s,%s)", 
									GetSQLValueString($_REQUEST["customer_name"], "text"),									
									GetSQLValueString($_REQUEST["customer_surname"], "text"),
									GetSQLValueString($_REQUEST["registration_date"], "text"),									
									GetSQLValueString($_REQUEST["country_id"], "int"),							
									GetSQLValueString($_REQUEST["email"], "text"),
									GetSQLValueString($_REQUEST["tel"], "text"),
									GetSQLValueString($_REQUEST["fax"], "text"),
									GetSQLValueString($_REQUEST["address"], "text"));
			$n1 = db_other_query($conn, $query1);
		db_close($conn);
		} 	
	}	
 header("Location: customers-list.php");
 
?>

