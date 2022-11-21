	<div class="container my-4">
	<!--Grid row-->
		<div class="row">
		<!--Grid column-->
			<div class="col-md-12 mb-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Track shipments</h5>
					</div>
					<div class="form-group">
					<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
						<script type="text/javascript">
						function Redirect() {
						var  tracking_number=$("#tracking_number").val();
						tracking_number=tracking_number.replace("#","-");
						//var url="https://www.maersk.com/tracking/#tracking/"+tracking_number
						window.open("https://www.maersk.com/tracking/#tracking/"+tracking_number,'_blank');
						//window.location=url;
						}
						</script>
				<form action="https://www.maersk.com/tracking/" target="_blank">
					<i class="fa fa-search" aria-hidden="true"></i>	  
					<input type="text" placeholder="Enter a tracking ID" class="news-input" id="tracking_number" name="tracking_no">
					<button type="submit" class="button button-primary" onclick="Redirect();">
					TRACK
					</button>
					</div>
				</form>  
				</div>
			</div>
		</div>
	<!--Grid column-->
	</div>