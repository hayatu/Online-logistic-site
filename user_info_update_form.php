<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("authenticate.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/configs.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/common/db_func.php");
	$conn = db_connect();
	$query1 = sprintf("select C_CODE, C_SHORT_NAME_ENG from countries order by C_SHORT_NAME_ENG ");
	$n1 = db_select_query($conn, $query1, $rs_country);
	
	$query = sprintf("select * from health_user_info where id = %s", GetSQLValueString($_REQUEST["user-id"], "int") );
	$n = db_select_query($conn, $query, $rs_user_info);
	db_close($conn);
?>
<?php include_once($CommonAssets ."/top-header-slider.php"); ?>
<!-- Navigation -->
<?php include("top-header-main.php"); ?>
<!-- Main layout -->
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
				<form name="form1" action="user_update.php" method="post" enctype="multipart/form-data">
					<input name="id" type="hidden" id="id" value="<?php echo $rs_user_info[0]["id"]; ?>">
					<p class="h5 text-center mb-0">User Registration Update Form</p>
					<hr class="light-blue lighten-1 title-hr">
					<div class="md-form">						
						<i class="fas fa-university prefix grey-text"></i>
						<input name="institution_name" type="text" id="institution_name" class="form-control"  value="<?php echo  $rs_user_info[0]["institution_name"]; ?>">               
					</div>					
					
					<div class="md-form">                 
						<i class="fas fa-globe prefix grey-text"></i>
						<select name="c_code" class=" form-control pl-5" required>
							<option value="" selected >Select Country</option>
							<?php 
								for($i=0; $i<$n1; $i++){
								?>
								<option value="<?php echo $rs_country[$i]["C_CODE"]; ?>"<?php if($rs_country[$i]["C_CODE"] == $rs_user_info[0]["c_code"]) echo " selected"; ?>><?php echo $rs_country[$i]["C_SHORT_NAME_ENG"]; ?></option>
								
								<?php 
								} 
							?>
						</select>
					</div>
					
					<div class="md-form">
						<i class="fas fa-envelope prefix grey-text"></i>
						<input  name="email" type="email" id="email" class="form-control" value="<?php echo  $rs_user_info[0]["email"]; ?>">                 
					</div>
					<div class="md-form">
						<i class="far fa-file-pdf prefix grey-text"></i>
						  <span class="text-danger pl-5"><small>Please Upload your Nomination Letter (PDF format) max: 2 mb</small></span>
						<input  name="userfile" type="file" id="userfile" class="form-control">  
						<p class="pl-5"><a href="../user/<?php echo $rs_user_info[0]["nomination_letter_link"]; ?>" target="_blank">Click to View the Nomination Letter</a></p>
						<p id="error1" style="display:none; color:#FF0000;">Invalid File Format! File Format Must Be PDF.</p>
					   <p id="error2" style="display:none; color:#FF0000;">Maximum File Size Limit is 2MB.</p>
					</div>
					
					<div class="md-form">
						<i class="fas fa-phone-volume prefix grey-text"></i>
						<input name="tel" type="text" id="tel" class="form-control"  value="<?php echo  $rs_user_info[0]["tel"]; ?>">               
					</div>
					
					<div class="md-form">
						<i class="fas fa-fax prefix grey-text"></i>
						<input name="fax" type="text" id="fax" class="form-control"value="<?php echo  $rs_user_info[0]["fax"]; ?>">                 
					</div>				
					
					<div class="md-form">
						<i class="fas fa-address-card prefix grey-text"></i>
						<textarea name="address" type="text" class="form-control" id="address" rows="3"> <?php echo  $rs_user_info[0]["address"]; ?></textarea>                        
					</div>
					
					<div>
					<!-- Default inline 1-->
						<i class="far fa-check-circle prefix grey-text"></i>
						<div class="custom-control custom-radio custom-control-inline">
							<input name="is_confirmed" type="radio" class="custom-control-input" id="confirmed" value="1"<?php if($rs_user_info[0]["is_confirmed"] == 1) echo " checked"; ?>>
							<label class="custom-control-label" for="confirmed">Confirmed</label>
						</div>
						
						<!-- Default inline 2-->
						<i class="far fa-times-circle"></i>
						<div class="custom-control custom-radio custom-control-inline">
							<input name="is_confirmed" type="radio" class="custom-control-input" id="Unconfirmed" value="0"<?php if($rs_user_info[0]["is_confirmed"] == 0) echo " checked"; ?>>
							<label class="custom-control-label" for="Unconfirmed">Not Confirmed</label>
						</div>	
					</div>					
					
					<div class="text-center mt-4">
						<!--<button class="btn btn-primary" type="submit">Submit</button>-->
						 <input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary"/>
					</div>
					
					<script>				
					//binds to onchange event of your input field
					$('#userfile').bind('change', function() {

					var ext = $('#userfile').val().split('.').pop().toLowerCase();
					if ($.inArray(ext, ['pdf']) == -1){
					$('input:submit').attr('disabled',false);
					$('input:submit').attr('disabled',true);
					$('#error1').slideDown("slow");
					$('#error2').slideUp("slow");
					a=0;
					}else{
					var picsize = (this.files[0].size);
					if (picsize > 2500000){
					$('input:submit').attr('disabled',false);
					$('input:submit').attr('disabled',true);
					$('#error2').slideDown("slow");
					a=0;
					}else{
					a=1;
					$('#error2').slideUp("slow");
					}
					$('#error1').slideUp("slow");
					if (a==1){
					$('input:submit').attr('disabled',false);
					}
					}
					});
					</script>
					
				</form>
				<!-- Register form -->
			</div>
		</div>
		<!--/.Card-->
		<!--Grid column-->
	</div>
</main>
<!--Main layout-->

<!--/ Main layout -->
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->