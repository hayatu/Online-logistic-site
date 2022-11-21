<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once("common/db_func.php");
	$conn = db_connect();
		$query1 = sprintf("select * from tbl_order_item order by order_date");
	$n1 = db_select_query($conn, $query1, $rs_invoice);
	$query = sprintf("select * from tbl_order_item where order_id = %s", GetSQLValueString($_REQUEST["invoice-id"], "int") );
	$n = db_select_query($conn, $query, $rs_invoice_info);
	db_close($conn);
?>
<script type="text/javascript" src="js/date-picker.min.js"></script> 
  
<!-- /.Navbar -->
<main class="pl-1 pt-1">
	<div class="container">	
          
              <!-- Register form -->
              <form name="form1" method="post" action="invoice_update.php" enctype="multipart/form-data">
		        <input name="invoice-id" type="hidden" id="invoice-id" value="<?php echo $rs_invoice_info[0]["order_id"]; ?>">
                <p class="h5 text-center mb-0">Update Invoice </p><p>All fields indicated in (*) are obligatory.</p>
				<div class="col-md-12">
				<div class="alert alert-success text-center" role="alert">
				<a href="invoices-list.php"><span class="font-weight-bold">Invoice List</span></a> Total Invoices (<?php echo $n1 ;  ?>) 					
				</div>
			</div>
                   <hr class="light-blue lighten-1 title-hr">
				<div class="row">
					<div class="col-md-8">
						To,<br />
						<b>RECEIVER (BILL TO)</b><br />
						<input type="text" name="order_receiver_name" id="order_receiver_name" value="<?php echo  $rs_invoice_info[0]["order_receiver_name"]; ?>" class="form-control input-sm" placeholder="Enter Receiver Name" />
						<textarea name="order_receiver_address" id="order_receiver_address" class="form-control"><?php echo  $rs_invoice_info[0]["order_receiver_address"]; ?></textarea>
					</div>
				<div class="col-md-4">
					Reverse Charge (Invoice#)<br />
					<input type="text" name="order_no" id="order_no" class="form-control input-sm" value="<?php echo  $rs_invoice_info[0]["order_no"]; ?>" />
					  
					<input type="text" name="order_date" id="datepicker" value="<?php echo  $rs_invoice_info[0]["order_date"]; ?>"  class="form-control input-sm" />
				</div>
				</div>
			<table id="invoice-item-table" class="table table-bordered">
				<tr>
                <td colspan="2">
                    <tr>
                      <th width="7%">Sr No.</th>
                      <th width="20%">Cartoon</th>
					   <th width="10%">Type (Normal)</th>
                      <th width="8%">Quantity</th>
					  <th width="8%">Perkg</th>
                      <th width="10%">Price</th>
					  <th width="10%">cleanse + awb</th>
                      <th width="10%">Actual Amt.</th>                      
                      <th width="12%" rowspan="2">Total</th>
                      <th width="5%" rowspan="2"></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                    </tr>
                    <tr>
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="item_name" value="<?php echo  $rs_invoice_info[0]["item_name"]; ?>" id="item_name1" class="form-control input-sm" /></td>
					   <td><input type="text" name="item_type" id="item_type" value="<?php echo  $rs_invoice_info[0]["item_type"]; ?>" class="form-control input-sm" /></td>
                      <td><input type="text" name="order_item_quantity" value="<?php echo  $rs_invoice_info[0]["order_item_quantity"]; ?>" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                       <td><input type="text" name="item_kg" value="<?php echo  $rs_invoice_info[0]["item_kg"]; ?>"  id="item_kg" class="form-control input-sm" /></td>
					  <td><input type="text" name="order_item_price" value="<?php echo  $rs_invoice_info[0]["order_item_price"]; ?>" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
					  <td><input type="text" name="order_item_cleanse" value="<?php echo  $rs_invoice_info[0]["order_item_cleanse"]; ?>" id="order_item_cleanse1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                      <td><input type="text" name="order_item_actual_amount" value="<?php echo  $rs_invoice_info[0]["order_item_actual_amount"]; ?>" id="order_item_actual_amount1" data-srno="1" class="form-control input-sm order_item_actual_amount" /></td>
                      <td><input type="text" name="order_item_final_amount" value="<?php echo  $rs_invoice_info[0]["order_item_final_amount"]; ?>" id="order_item_final_amount1" data-srno="1" class="form-control input-sm order_item_final_amount" /></td>
                      <td></td>
                    </tr>
                  </table>	
						  
				</td>
              </tr>
               <div class="text-center mt-4">
                 <input name="submit" type="submit" value="Update" id="submit" class="btn btn-primary"/>
                  <!--<button name="submit"  type="submit" class="btn btn-primary" id="submit" >Submit</button>-->
                </div>
				
              </form>
			
              <!-- Register form -->
			
        <!--Grid column-->
		 	
		 
	</div>
</main>
<!--Main layout-->

<script>	
$('#datepicker').datepicker(
{		
autoclose: true,
format: 'yyyy/mm/dd',
todayHighlight: true,
});  		
</script>
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->