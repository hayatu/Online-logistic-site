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
		
	$query = sprintf("select * from tbl_package_list_item where order_id = %s", GetSQLValueString($_REQUEST["package-id"], "int") );
	$n = db_select_query($conn, $query, $rs_package_info);
	db_close($conn);
?>
<script type="text/javascript" src="js/date-picker.min.js"></script> 
  
<!-- /.Navbar -->
<main class="pl-1 pt-1">
	<div class="container">	
          
              <!-- Register form -->
              <!-- Register form -->
              <form name="form1" method="post" action="package-list-update.php" enctype="multipart/form-data">
		    <input name="package-id" type="hidden" id="package-id" value="<?php echo $rs_package_info[0]["order_id"]; ?>">
                <p class="h5 text-center mb-0">Create Package list </p><p>All fields indicated in (*) are obligatory.</p>
                   <hr class="light-blue lighten-1 title-hr">
				<div class="row">
					<div class="col-md-8">
						To,<br />
						<b>RECEIVER (BILL TO)</b><br />
						<input  name="order_receiver_name" type="text" value="<?php echo  $rs_package_info[0]["order_receiver_name"]; ?>" id="order_receiver_name" class="form-control input-sm" placeholder="Enter Receiver Name" />
						<textarea name="order_receiver_address" id="order_receiver_address" class="form-control" placeholder="Enter Billing Address"><?php echo  $rs_package_info[0]["order_receiver_address"]; ?></textarea>
					</div>
				<div class="col-md-4">
					Reverse Charge<br />
					<input type="text" name="order_no" value="<?php echo  $rs_package_info[0]["order_no"]; ?>" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." />
					  
					<input type="text" name="order_date" value="<?php echo  $rs_package_info[0]["order_date"]; ?>" id="datepicker" class="form-control input-sm" placeholder="Select Invoice Date" />
				</div>
				</div>
				
			<table id="invoice-item-table" class="table table-bordered">
			
				<tr>
              <td>
                    <tr>
                      <th width="2%">Sr No.</th>
                      <th width="15%">Item Name</th>
					   <th width="10%">Box</th>
                      <th width="10%">Quantity</th>
					  <th width="10%">Kg</th>
                      <th width="10%">Price</th>
                      <th width="10%" rowspan="2">Total Price</th>                      
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
						<td><input type="text" name="item_name" value="<?php echo  $rs_package_info[0]["item_name"]; ?>" id="item_name1" class="form-control input-sm" required /></td>
						<td><input type="text" name="item_type" value="<?php echo  $rs_package_info[0]["item_type"]; ?>" id="item_type" class="form-control input-sm" /></td>
						<td><input type="text" name="order_item_quantity" value="<?php echo  $rs_package_info[0]["order_item_quantity"]; ?>" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
						<td><input type="text" name="item_kg" value="<?php echo  $rs_package_info[0]["item_kg"]; ?>" id="item_kg" class="form-control input-sm"/></td>
						<td><input type="text" name="order_item_price" value="<?php echo  $rs_package_info[0]["order_item_price"]; ?>" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
						<td><input type="text" name="order_item_final_amount" value="<?php echo  $rs_package_info[0]["order_item_final_amount"]; ?>" id="order_item_final_amount1" data-srno="1" class="form-control input-sm order_item_final_amount" /></td>
					</tr>					
				<tr>
                <td>
                    <tr>
                      <th width="1%">Lenght</th>
					  <th width="1%">Width</th>
					  <th width="1%">Height</th>
					   <th width="10%" rowspan="2">CBM</th>
					   <th width="5%">Lenght</th>
					  <th width="5%">Width</th>
					  <th width="5%">Height</th>
					   <th width="15%" rowspan="2">Volume</th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>                      
                    </tr>
                    	<td><input type="text" name="order_item_lenght" value="<?php echo  $rs_package_info[0]["order_item_lenght"]; ?>"  id="order_item_lenght1" data-srno="1" class="form-control input-sm order_item_lenght" /></td>
						<td><input type="text" name="order_item_width"  value="<?php echo  $rs_package_info[0]["order_item_width"]; ?>" id="order_item_width1" data-srno="1" class="form-control input-sm number_only order_item_width" /></td>
						<td><input type="text" name="order_item_height" value="<?php echo  $rs_package_info[0]["order_item_height"]; ?>" id="order_item_height1" data-srno="1" class="form-control input-sm number_only order_item_height" /></td>
						<td><input type="text" name="order_item_final_cbm"  value="<?php echo  $rs_package_info[0]["order_item_final_cbm"]; ?>" id="order_item_final_cbm1" data-srno="1" class="form-control input-sm order_item_final_cbm" /></td>
						<td><input type="text" name="order_item_volume_lenght" value="<?php echo  $rs_package_info[0]["order_item_volume_lenght"]; ?>" id="order_item_volume_lenght1" data-srno="1" class="form-control input-sm order_item_volume_lenght" /></td>
						<td><input type="text" name="order_item_volume_width" value="<?php echo  $rs_package_info[0]["order_item_volume_width"]; ?>"  id="order_item_volume_width1" data-srno="1" class="form-control input-sm number_only order_item_volume_width" /></td>
						<td><input type="text" name="order_item_volume_height" value="<?php echo  $rs_package_info[0]["order_item_volume_height"]; ?>" id="order_item_volume_height1" data-srno="1" class="form-control input-sm number_only order_item_volume_height" /></td>
						<td><input type="text" name="order_item_final_volum" value="<?php echo  $rs_package_info[0]["order_item_final_volum"]; ?>" id="order_item_final_volum1" data-srno="1" class="form-control input-sm order_item_final_volum" /></td>
					</tr>						
                  </table>	  
				</td>
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