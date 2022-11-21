<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>

<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	$query1 = sprintf("select country_id, country_name from tble_countries order by country_name ");
	$n1 = db_select_query($conn, $query1, $rs_country);
	db_close($conn);
?>
<script type="text/javascript" src="js/date-picker.min.js"></script> 
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->

<main class="pl-1 pt-1">
	<div class="container">
		<!--Section: Main panel-->
		<section class="mb-3">
			<!--Card-->
			<div class="card card-cascade narrower">         
				<!--Section: Table-->
				<section class="text-dark">
					
					<!--Top Table UI-->
					<div class="table-ui p-0 mb-0 mx-0 mb-0">
						<!--Grid row-->						
						<h6 class="font-weight-bold pl-2 pt-1">Admin Dashboard</h6>
						<hr class="light-blue lighten-1 title-hr">
						<!--Grid row-->
					</div>
					<!--Top Table UI--> 				
				</section>
				<!--Section: Table-->			
			</div>
			<!--/.Card-->			
		</section>
		<!--Section: Main panel-->
		<!--Grid column-->     
		
		<!--Card-->
		<div class="card card-cascade narrower">        
			
			<!--Card content-->
			<div class="card-body">
				<!-- Register form -->
				<form name="form1" action="customer-insert.php" method="post" enctype="multipart/form-data">
					<p class="h5 text-center mb-0">Customer Registration Form</p>
					<hr class="light-blue lighten-1 title-hr">
					<div class="md-form">						
						<i class="fas fa-user prefix grey-text"></i>
						<input name="customer_name" type="text" id="customer_name" class="form-control" placeholder="Customer Name" required>               
					</div>
					<div class="md-form">						
						<i class="fas fa-user prefix grey-text"></i>
						<input name="customer_surname" type="text" id="customer_surname" class="form-control" placeholder="Customer Surname" required>               
					</div>
					<div class="md-form">      
                  <input name="registration_date" type="text" id="datepicker" placeholder="Registration Date" class="form-control" required>                  
                </div>	
					
					<div class="md-form">                 
						<i class="fas fa-globe prefix grey-text"></i>
						<select name="country_id" class=" form-control pl-5" required>
							<option value="" selected >Select Country</option>
							<?php 
								for($i=0; $i<$n1; $i++){
								?>
								
								<option value="<?php echo $rs_country[$i]["country_id"]; ?>"><?php echo $rs_country[$i]["country_name"]; ?></option>
								<?php 
								} 
							?>
						</select>
					</div>
					
					<div class="md-form">
						<i class="fas fa-envelope prefix grey-text"></i>
						<input  name="email" type="email" id="email" class="form-control" placeholder="Email Address">                 
					</div>
					
					<div class="md-form">
						<i class="fas fa-phone-volume prefix grey-text"></i>
						<input name="tel" type="text" id="tel" class="form-control" placeholder="Telephone">               
					</div>
					
					<div class="md-form">
						<i class="fas fa-fax prefix grey-text"></i>
						<input name="fax" type="text" id="fax" class="form-control" placeholder="Fax">                 
					</div>				
					
					<div class="md-form">
						<i class="fas fa-address-card prefix grey-text"></i>
						<textarea name="address" type="text" class="form-control" id="address" placeholder="Address" required rows="3"></textarea>                        
					</div>
					
					<div class="text-center mt-4">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
				</form>
				<!-- Register form -->
			</div>
		</div>
		<!--/.Card-->
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