<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>

<script type="text/javascript" src="js/date-picker.min.js"></script> 
 <script>
      $(document).ready(function(){
        var count = 1;        
        $(document).on('click', '#add_row', function(){
          count++;
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
		  html_code += '<td><input type="text" name="item_type[]" id="item_type'+count+'" class="form-control input-sm" /></td>';          
          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
		  html_code += '<td><input type="text" name="item_kg[]" value="kg" id="item_kg'+count+'" class="form-control input-sm" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
		  html_code += '<td><input type="text" name="order_item_cleanse[]" id="order_item_cleanse'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_cleanse" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
        });
        
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();          
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });

        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var price = 0;
            var actual_amount = 0;
			var cleanse_rate = 0;
            var cleanse_amount = 0;
            
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {
                actual_amount = parseFloat(quantity) * parseFloat(price);
                $('#order_item_actual_amount'+j).val(actual_amount);
				cleanse_rate = $('#order_item_cleanse'+j).val();
                if(cleanse_rate > 0)
                {
                  cleanse_amount = parseFloat(cleanse_rate);
                  $('#order_item_cleanse'+j).val(cleanse_amount);
                }
                item_total = parseFloat(actual_amount);
				item_total = parseFloat(actual_amount) + parseFloat(cleanse_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_cleanse', function(){
          cal_final_total(count);
        });
      
        
      });
      </script>
 
<!-- /.Navbar -->
<main class="pl-1 pt-1">
	<div class="container">	
          
              <!-- Register form -->
              <form name="form1" method="post" action="invoice-insert.php" enctype="multipart/form-data">
		
                <p class="h5 text-center mb-0">Create Invoice </p><p>All fields indicated in (*) are obligatory.</p>
                   <hr class="light-blue lighten-1 title-hr">
				<div class="row">
					<div class="col-md-8">
						To,<br />
						<b>RECEIVER (BILL TO)</b><br />
						<input type="text" name="order_receiver_name" id="order_receiver_name" class="form-control input-sm" placeholder="Enter Receiver Name" />
						<textarea name="order_receiver_address" id="order_receiver_address" class="form-control" placeholder="Enter Billing Address"></textarea>
					</div>
				<div class="col-md-4">
					Reverse Charge<br />
					<input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." />
					  
					<input type="text" name="order_date" id="datepicker" class="form-control input-sm" readonly placeholder="Select Invoice Date" />
				</div>
				</div>
			<table id="invoice-item-table" class="table table-bordered">
				<tr>
                <td colspan="2">
                    <tr>
                      <th width="7%">Sr No.</th>
                      <th width="20%">Cartoon</th>
					   <th width="10%">Type (Normal)</th>
                      <th width="5%">Quantity</th>
					  <th width="5%">Perkg</th>
                      <th width="5%">Price</th>
					  <th width="10%">cleanse + awb</th>
                      <th width="10%">Actual Amt.</th>                      
                      <th width="12.5%" rowspan="2">Total</th>
                      <th width="3%" rowspan="2"></th>
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
                      <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" required /></td>
					   <td><input type="text" name="item_type[]" id="item_type" class="form-control input-sm" /></td>
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                       <td><input type="text" name="item_kg[]" value="kg" id="item_kg" class="form-control input-sm" readonly /></td>
					  <td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
					  <td><input type="text" name="order_item_cleanse[]" id="order_item_cleanse1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                      <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1" data-srno="1" class="form-control input-sm order_item_actual_amount" readonly /></td>
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
                      <td></td>
                    </tr>
                  </table>	
				<div align="right">
					<button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
				</div>			  
				</td>
              </tr>
               <div class="text-center mt-4">
                 <input name="submit" type="submit" value="Create" id="submit" class="btn btn-primary"/>
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