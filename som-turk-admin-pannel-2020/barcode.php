<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
	.dotted-line {
    border: 1px dashed #000;
	width:100%;

</style>
 
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<body onload="window.print();">
	<div class="container p-5">
		<?php
		require_once("common/db_func.php");
		$conn = db_connect();
		include 'barcode128.php';
		$text='&nbsp&nbsp';
		$customer_name = $_POST['customer_name'];
		$customer_surname = $_POST['customer_surname'];
		$registration_date = $_POST['registration_date'];
		$country_name = $_POST['country_name'];
		$shipping_model = $_POST['shipping_model'];
		$weight = $_POST['weight'];
		$b_code = $_POST['b_code'];
		$print_qty = $_POST['print_qty'];
		$tel = $_POST['tel'];
		$address = $_POST['address'];
		
		  $query1 = sprintf("insert into tble_barcode_info(customer_name,customer_surname,registration_date ,country_name, shipping_model, weight, b_code,print_qty,tel, address) values(%s, %s, %s, %s, %s, %s,%s,%s,%s,%s)", 
									GetSQLValueString($_REQUEST["customer_name"], "text"),									
									GetSQLValueString($_REQUEST["customer_surname"], "text"),
									GetSQLValueString($_REQUEST["registration_date"], "text"),									
									GetSQLValueString($_REQUEST["country_name"], "text"),							
									GetSQLValueString($_REQUEST["shipping_model"], "text"),
									GetSQLValueString($_REQUEST["weight"], "text"),
									GetSQLValueString($_REQUEST["b_code"], "text"),
									GetSQLValueString($_REQUEST["print_qty"], "text"),
									GetSQLValueString($_REQUEST["tel"], "text"),
									GetSQLValueString($_REQUEST["address"], "text"));
			$n1 = db_other_query($conn, $query1);
		db_close($conn);
		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "
			<div class='d-flex justify-content-center row'>
        <div class='col-md-6'>
            <div class='card border-0'>
				
                <div class='card-body d-flex flex-column justify-content-between text-white p-0'>
					<div class='bg-top text-dark'>
					
						<div class='d-flex flex-row justify-content-between'>
                            				
							<div class='row'>                               									
								<div class='col-md-6'>
									<span class='font-weight-bold'>From</span>
									<span class='mb-2'> <p><img src='img/barcode.png' alt='Somturk'/></p>Mesihpasa Mah.Mesihpasa Cad.No:8/207 Aksa is Merkezi Aksaray Fatih Istanbul 34096.<p> 0212 638 00 97 / +90 534 216 42 76 / +90 542 278 02 77</p></span>
								</div>
							<div class='col-md-6'>
							<span class='font-weight-bold'>Ship to</span>
							<span class='mb-2'> <p>".$customer_name." ".$customer_surname."</p>".$address." ".$country_name." , ".$tel."</span>
							</div>
							</div>                   
						</div>						  
					</div>
					  
					<hr class='dotted-line'>
				 
                    <div class='text-dark'>
                        <div class='d-flex flex-column justify-content-between'>
                            <div class='d-flex flex-row justify-content-between text-center'>
                                <div><span class='d-block font-weight-bold text-dark text-uppercase'>Shipping Model</span><span>".$shipping_model."</span></div>
                                <div><span class='d-block font-weight-bold text-dark text-uppercase'>Weight</span><span>".$weight."</span></div>
                                <div><span class='d-block font-weight-bold text-dark text-uppercase'>Date</span><span>".$registration_date."</span></div>                              
                            </div>
                            
                            <div class='d-flex flex-row justify-content-between'>                                
                                <div class='d-flex flex-column justify-content-between text-dark'><p class='inline'><span><b>Barcode:</b>".bar128 ($text)."<b class='p-0'>".$b_code."</b></div>
                            </div>
							 <hr class='dotted-line'>                           
                        </div>
						
                    </div>
					
                </div>
            </div>
        </div>
    </div>";
		}?>
</div>
</body>

