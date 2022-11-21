<?php require_once("authenticate.php");?>
<?php include_once("main-top-header.php"); ?>
<!-- Navigation -->
<?php include("top-header-main.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->
<script src="js/session-timeout.js"></script>
    <script>
      sessionTimeout({
        warnAfter: 60000,
        timeOutAfter: 60000,
      });
    </script>
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
							<h6 class="font-weight-bold pl-2 pt-1">Online Invoice System Admin Dashboard (<?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"];?>)</h6>
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
		<!--Section: Cascading panels-->
		<section class="mb-3">			
			<!--Grid row-->
			<div class="row">				
				<!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Customer Section
						</div>
						<!--/.Card-->
						<div class="card-body pt-0 px-1">							
							<!--Card content-->
							<div class="card-body text-center">								
								<div class="list-group list-panel">
									<a href="customer-registration-form.php" class="list-group-item d-flex justify-content-between text-info">Add Customer
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="customers-list.php" class="list-group-item d-flex justify-content-between text-info">Customer List
									<i class="fas fa-users ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="barcode-registration-form.php" class="list-group-item d-flex justify-content-between text-info">Add Barcode
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="barcode-list.php" class="list-group-item d-flex justify-content-between text-info">Barcode List
									<i class="fas fa-users ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
								</div>								
							</div>
							<!--/.Card content-->							
						</div>
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->	
                <!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Invoice Section
						</div>
						<!--/.Card-->
						<div class="card-body pt-0 px-1">							
							<!--Card content-->
							<div class="card-body text-center">								
								<div class="list-group list-panel">
									<a href="invoice-registration-form.php" class="list-group-item d-flex justify-content-between text-info">Add Invoice
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>									
									<a href="invoices-list.php" class="list-group-item d-flex justify-content-between text-info">Invoice List
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="package-registration-form.php" class="list-group-item d-flex justify-content-between text-info">Add Package List
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="package-list.php" class="list-group-item d-flex justify-content-between text-info">Package List
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
								</div>								
							</div>
							<!--/.Card content-->							
						</div>
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->	
                  <!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Users Section
						</div>
						<!--/.Card-->
						<div class="card-body pt-0 px-1">							
							<!--Card content-->
							<div class="card-body text-center">								
								<div class="list-group list-panel">
									<a href="user-registration-form.php" class="list-group-item d-flex justify-content-between text-info">Add User
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="users-list.php" class="list-group-item d-flex justify-content-between text-info">Users List
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									
								</div>								
							</div>
							<!--/.Card content-->							
						</div>
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->	
                 <!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Gallery Section
						</div>
						<!--/.Card-->
						<div class="card-body pt-0 px-1">							
							<!--Card content-->
							<div class="card-body text-center">								
								<div class="list-group list-panel">
									<a href="gallery.php" class="list-group-item d-flex justify-content-between text-info">Add Photos
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="event-gallery.php" class="list-group-item d-flex justify-content-between text-info">Add Event Photos
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="video-upload.php" class="list-group-item d-flex justify-content-between text-info">Add Video
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
								</div>								
							</div>
							<!--/.Card content-->							
						</div>
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->							
					
			</section>
			<!--Section: Cascading panels-->		
		</div>
	</div>
</main>
<!--Main layout-->

<!--/ Main layout -->
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->