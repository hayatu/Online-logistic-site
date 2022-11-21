<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("authenticate.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/configs.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/common/db_func.php");
	$conn = db_connect();			
	 $query1 = sprintf("select ui.id, ui.customer_name,ui.customer_surname,ui.registration_date, ui.email,ui.tel,ui.fax,ui.address, tble_countries.country_name "
	."from tble_customer_info ui "
	."left join tble_countries on ui.country_id = tble_countries.country_id "
	."where ui.deleteflag = 0 order by ui.customer_name, tble_countries.country_name");
	$n = db_select_query($conn, $query1, $rs_customers);
	db_close($conn);
	//header("Location: register-sucess.php");
?>
<?php include_once("main-top-header.php"); ?>
<!-- Navigation -->
<?php include("top-header-main.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- DataTables CSS -->
<main class="pl-1 pt-1">
	<div class="container">
				<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success text-center" role="alert">
				<a href="customer-registration-form.php"><span class="font-weight-bold">Add New Customer</span></a> Total Customers (<?php echo $n ;  ?>) 					
				</div>
			</div>
				
		</div>
		<table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Customer Name
					</th>
					<th class="th-sm">Customer Surname
					</th>
					<th class="th-sm">Registration Date
					</th>
					<th class="th-sm">Country
					</th>
					<th class="th-sm">Email Address
					</th>
					<th class="th-sm">Telephone
					</th>
					<th class="th-sm">Fax
					</th>
					<th class="th-sm">Address
					</th>
					<th class="th-sm text-center" colspan="2">Action
					</th>
					<th class="th-sm" style="display: none">
					</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					for($i=0; $i<$n; $i++){
					?>
					<tr>	
						<td><?php echo $rs_customers[$i]["customer_name"]; ?></td>	
						<td><?php echo $rs_customers[$i]["customer_surname"]; ?></td>							
						<td><?php echo $rs_customers[$i]["registration_date"]; ?></td>
						<td><?php echo $rs_customers[$i]["country_name"]; ?></td>
						<td><?php echo $rs_customers[$i]["email"]; ?></td>
						<td><?php echo $rs_customers[$i]["tel"]; ?></td>
						<td><?php echo $rs_customers[$i]["fax"]; ?></td>
						<td><?php echo $rs_customers[$i]["address"]; ?></td>
						<td><a href="customer_info_update_form.php?customer-id=<?php echo $rs_customers[$i]["id"]; ?>" class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>	
						
						<td>
						
						<!-- Delete trigger modal-->
							<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header pl-5">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
										</div>
										<div class="modal-body">
											<p>You are about to delete one track, this procedure is irreversible.</p>
											<p>Do you want to proceed?</p>
											<p class="debug-url"></p>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
											<a class="btn btn-danger btn-ok">Yes</a>
										</div>
									</div>
								</div>
							</div>

							<a href="#" data-href="customer_info_delete.php?customer-id=<?php echo $rs_customers[$i]["id"]; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm" role="button"><i class="fas fa-trash-alt"></i></a>  

						<script>
						$('#confirm-delete').on('show.bs.modal', function(e) {
						$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

						 $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
						});
						</script>
						<!--Modal: modalConfirmDelete-->		
						</td>
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
					<th>Customer Surname
					</th>
					<th class="th-sm">Registration Date
					</th>
					<th>Country
					</th>
					<th>Email Address
					</th>
					<th>Telephone
					</th>
					<th>Fax
					</th>
					<th>Address
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
