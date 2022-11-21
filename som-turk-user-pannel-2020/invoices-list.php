<?php require_once("authenticate.php");?>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();			
	$query1 = sprintf("select * from tbl_order_item order by order_date");
	$n = db_select_query($conn, $query1, $rs_invoice);
	db_close($conn);
	//header("Location: register-sucess.php");
?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- DataTables CSS -->
<main class="pl-1 pt-1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success text-center" role="alert">
				<a href="invoice-registration-form.php"><span class="font-weight-bold">Create New Invoice</span></a> Total Invoices (<?php echo $n ;  ?>) 					
				</div>
			</div>
				
		</div>
		
		<table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Customer Name
					</th>
					<th class="th-sm">Customer Address
					</th>
					<th class="th-sm">Order Number
					</th>
					<th class="th-sm">Order Date
					</th>
					<th class="th-sm">Cartoon
					</th>
					<th class="th-sm">Type (Normal)	
					</th>
					<th class="th-sm">Quantity	
					</th>
					<th class="th-sm">Perkg	
					</th>
					<th class="th-sm">Price	
					</th>
					<th class="th-sm">cleanse + awb 
					</th>
					<th class="th-sm">Actual Amt.	
					</th>
					<th class="th-sm">Total	
					</th>
					<th class="th-sm text-center" colspan="2">Action
					</th>
					<th class="th-sm" style="display: none">
					</th>
					</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					for($i=0; $i<$n; $i++){
					?>
					<tr>	
						<td><?php echo $rs_invoice[$i]["order_receiver_name"]; ?></td>								
						<td><?php echo $rs_invoice[$i]["order_receiver_address"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_no"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_date"]; ?></td>
						<td><?php echo $rs_invoice[$i]["item_name"]; ?></td>
						<td><?php echo $rs_invoice[$i]["item_type"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_item_quantity"]; ?></td>
						<td><?php echo $rs_invoice[$i]["item_kg"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_item_price"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_item_cleanse"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_item_actual_amount"]; ?></td>
						<td><?php echo $rs_invoice[$i]["order_item_final_amount"]; ?></td>
						<td><a href="invoice-update-form.php?invoice-id=<?php echo $rs_invoice[$i]["order_id"]; ?>"class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>	
						<td><a href="generate_pdf.php?invoice-id=<?php echo $rs_invoice[$i]["order_id"]; ?>" class="btn btn-sm" role="button"><i class="fas fa-print"></i>PDF</a></td>	
					<td style="display: none"></td>						
					</tr>
					<?php
					}
				?>  
			</tbody>
			
			<tfoot>
				<tr>
					<th>Customer Name
					</th>
					<th>Customer Address
					</th>
					<th>Order Number
					</th>
					<th>Order Date
					</th>
					<th>Cartoon
					</th>
					<th>Type (Normal)	
					</th>
					<th>Quantity	
					</th>
					<th>kg	
					</th>
					<th>Price	
					</th>
					<th>cleanse + awb 	
					</th>
					<th>Actual Amt.	
					</th>
					<th>Total 	
					</th>
					<th>Update
					</th>
					<th>Delete
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
	
	<script>
		$(document).ready(function () {
			$('#dtBasicExample').DataTable();
			$('.dataTables_length').addClass('bs-select');
		});
	</script>	
</div>
</main>
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->
