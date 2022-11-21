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
			html_code += '<td><input type="text" name="item_kg[]" value="kg" id="item_kg'+count+'" readonly class="form-control input-sm" /></td>';
			html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'"  class="form-control input-sm number_only order_item_price" /></td>';
			html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
			html_code += '</tr>';
			html_code += '<tr id="row_id_'+count+'">';
			html_code += '<td><input type="text" name="order_item_lenght[]" id="order_item_lenght'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_lenght" /></td>';
			html_code += '<td><input type="text" name="order_item_width[]" id="order_item_width'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_width" /></td>';
			html_code += '<td><input type="text" name="order_item_height[]" id="order_item_height'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_height" /></td>';
			html_code += '<td><input type="text" name="order_item_final_cbm[]" id="order_item_final_cbm'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_cbm" /></td>';
			html_code += '<td><input type="text" name="order_item_volume_lenght[]" id="order_item_volume_lenght'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_volume_lenght" /></td>';
			html_code += '<td><input type="text" name="order_item_volume_width[]" id="order_item_volume_width'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_volume_width" /></td>';
			html_code += '<td><input type="text" name="order_item_volume_height[]" id="order_item_volume_height'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_volume_height" /></td>';
			html_code += '<td><input type="text" name="order_item_final_volum[]" id="order_item_final_volum'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_volum" /></td>';
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
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {            
                item_total = parseFloat(price)*parseFloat(quantity);
				
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

      function cal_final_total_cbm(count)
        {
          var final_cbm_total = 0;
          for(i=1; i<=count; i++)
          {
            var lenght = 0;
            var width = 0;   
			var height = 0;			
            var item_total_cbm = 0;
            lenght = $('#order_item_lenght'+i).val();
            if(lenght > 0)
            {
				 width = $('#order_item_width'+i).val();
			  if(width > 0)
            {
              height = $('#order_item_height'+i).val();
			  if(height > 0)
            {
				
              width = $('#order_item_width'+i).val();
              if(width > 0)
              { 			  
                item_total_cbm = parseFloat(width)*parseFloat(lenght)*parseFloat(height)/1000000;
				
                final_cbm_total = parseFloat(final_cbm_total) + parseFloat(item_total_cbm);
                $('#order_item_final_cbm'+i).val(item_total_cbm);
              }
            }
          }
        }
		}
      }
      	
		 $(document).on('blur', '.order_item_height', function(){
          cal_final_total_cbm(count);
        });
		
		
		 function cal_final_total_volum(count)
        {
          var final_volum_total = 0;
          for(i=1; i<=count; i++)
          {
            var lenght = 0;
            var width = 0;   
			var height = 0;			
            var item_total_cbm = 0;
            lenght = $('#order_item_volume_lenght'+i).val();
            if(lenght > 0)
            {
				 width = $('#order_item_volume_width'+i).val();
			  if(width > 0)
            {
              height = $('#order_item_volume_height'+i).val();
			  if(height > 0)
            {
				
              width = $('#order_item_volume_width'+i).val();
              if(width > 0)
              { 			  
                item_total_volum = parseFloat(width)*parseFloat(lenght)*parseFloat(height)/6000;
				
                final_volum_total = parseFloat(final_volum_total) + parseFloat(item_total_volum);
                $('#order_item_final_volum'+i).val(item_total_volum);
              }
            }
          }
        }
		}
      }
      	
		 $(document).on('blur', '.order_item_volume_height', function(){
          cal_final_total_volum(count);
        });
        
      });
      </script>
 
<!-- /.Navbar -->
<main class="pl-1 pt-1">
	<div class="container">	
          
              <!-- Register form -->
              <form name="form1" method="post" action="package-list-insert.php" enctype="multipart/form-data">
		
                <p class="h5 text-center mb-0">Create Package list </p><p>All fields indicated in (*) are obligatory.</p>
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
						<td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" required /></td>
						<td><input type="text" name="item_type[]" id="item_type" class="form-control input-sm" /></td>
						<td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
						<td><input type="text" name="item_kg[]" value="kg" id="item_kg" class="form-control input-sm" readonly /></td>
						<td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
						<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
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
                    	<td><input type="text" name="order_item_lenght[]" id="order_item_lenght1" data-srno="1" class="form-control input-sm order_item_lenght" /></td>
						<td><input type="text" name="order_item_width[]" id="order_item_width1" data-srno="1" class="form-control input-sm number_only order_item_width" /></td>
						<td><input type="text" name="order_item_height[]" id="order_item_height1" data-srno="1" class="form-control input-sm number_only order_item_height" /></td>
						<td><input type="text" name="order_item_final_cbm[]" id="order_item_final_cbm1" data-srno="1" readonly class="form-control input-sm order_item_final_cbm" /></td>
						<td><input type="text" name="order_item_volume_lenght[]" id="order_item_volume_lenght1" data-srno="1" class="form-control input-sm order_item_volume_lenght" /></td>
						<td><input type="text" name="order_item_volume_width[]" id="order_item_volume_width1" data-srno="1" class="form-control input-sm number_only order_item_volume_width" /></td>
						<td><input type="text" name="order_item_volume_height[]" id="order_item_volume_height1" data-srno="1" class="form-control input-sm number_only order_item_volume_height" /></td>
						<td><input type="text" name="order_item_final_volum[]" id="order_item_final_volum1" data-srno="1" readonly class="form-control input-sm order_item_final_volum" /></td>
					</tr>						
                  </table>					  
				<div align="right">
					<button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
				</div>			  
				</td>
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