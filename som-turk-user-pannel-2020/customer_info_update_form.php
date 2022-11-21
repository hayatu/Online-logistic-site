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
	require_once("authenticate.php");
	require_once("common/db_func.php");
	$conn = db_connect();
	$query1 = sprintf("select country_id, country_name from countries order by country_name ");
	$n1 = db_select_query($conn, $query1, $rs_country);
	
	$query = sprintf("select * from customer_info where id = %s", GetSQLValueString($_REQUEST["customer-id"], "int") );
	$n = db_select_query($conn, $query, $rs_customers);
	db_close($conn);
?>

<script type="text/javascript" src="js/date-picker.min.js"></script> 

<main class="pl-1 pt-1">
	<div class="container">		
		
		<!--Card-->
		<div class="card card-cascade narrower">        
			
			<!--Card content-->
			<div class="card-body">
				<!-- Register form -->
				<form name="form1" action="customer-update.php" method="post" enctype="multipart/form-data">
					<input name="customer-id" type="hidden" id="customer-id" value="<?php echo $rs_customers[0]["id"]; ?>">
					<p class="h5 text-center mb-0">Customer Update Form</p>
					<hr class="light-blue lighten-1 title-hr">
					<div class="md-form">						
						<i class="fas fa-user prefix grey-text"></i>
						<input name="customer_name" type="text" id="customer_name" class="form-control"  value="<?php echo  $rs_customers[0]["customer_name"]; ?>">               
					</div>	
<div class="md-form">						
						<i class="fas fa-user prefix grey-text"></i>
						<input name="customer_surname" type="text" id="customer_surname" class="form-control"  value="<?php echo  $rs_customers[0]["customer_surname"]; ?>">               
					</div>						
					
				<div class="md-form">						
						<i class="fas fa-calendar prefix grey-text"></i>
						<input name="registration_date" type="text" id="datepicker" class="form-control pl-5"  value="<?php echo  $rs_customers[0]["registration_date"]; ?>">               
					</div>		
						<div class="md-form">                 
						<i class="fas fa-globe prefix grey-text"></i>
						<select name="country_id" class=" form-control pl-5" required>
							<option value="" selected >Select Country</option>
							<?php 
								for($i=0; $i<$n1; $i++){
								?>
								<option value="<?php echo $rs_country[$i]["country_id"]; ?>"<?php if($rs_country[$i]["country_id"] == $rs_customers[0]["country_id"]) echo " selected"; ?>><?php echo $rs_country[$i]["country_name"]; ?></option>
								
								<?php 
								} 
							?>
						</select>
					</div>
					
					<div class="md-form">
						<i class="fas fa-envelope prefix grey-text"></i>
						<input  name="email" type="email" id="email" class="form-control" value="<?php echo  $rs_customers[0]["email"]; ?>">                 
					</div>
										
					<div class="md-form">
						<i class="fas fa-phone-volume prefix grey-text"></i>
						<input name="tel" type="text" id="tel" class="form-control"  value="<?php echo  $rs_customers[0]["tel"]; ?>">               
					</div>
					
					<div class="md-form">
						<i class="fas fa-fax prefix grey-text"></i>
						<input name="fax" type="text" id="fax" class="form-control"value="<?php echo  $rs_customers[0]["fax"]; ?>">                 
					</div>				
					
					<div class="md-form">
						<i class="fas fa-address-card prefix grey-text"></i>
						<textarea name="address" type="text" class="form-control" id="address" rows="3"> <?php echo  $rs_customers[0]["address"]; ?></textarea>                        
					</div>				
					
					<hr class="light-blue lighten-1 title-hr">
					
				<div class="text-center mt-4">
                 <input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary"/>
                  <!--<button name="submit"  type="submit" class="btn btn-primary" id="submit" >Submit</button>-->
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

