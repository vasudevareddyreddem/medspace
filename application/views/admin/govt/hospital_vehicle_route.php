<section class="content">
	<!-- Exportable Table -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>Vehicle Route Map</h2>
				</div>
				<div class="body">
				<div class="row">
						<div class="col-md-4">
						  <label>Pick Date</label>
							<div class="input-group date">
								<input type="text" name="from_date" class="form-control" id="jss-date" required>
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						  <label>&nbsp;</label>
							<div class="input-group date">
								<button class="btn btn-primary ">Search</button>
							</div>
						</div>
					
					
				</div>
					<div >
						<div style="min-height:400px;" id="map"></div>
						<script>
							
							      function initMap() {
							        var map = new google.maps.Map(document.getElementById('map'), {
							          zoom: 3,
							          center: {lat: 0, lng: -180},
							          mapTypeId: 'terrain'
							        });
							
							        var flightPlanCoordinates = [
							          {lat: 37.772, lng: -122.214},
							          {lat: 21.291, lng: -157.821},
							          {lat: -18.142, lng: 178.431},
							          {lat: -27.467, lng: 153.027}
							        ];
							        var flightPath = new google.maps.Polyline({
							          path: flightPlanCoordinates,
							          geodesic: true,
							          strokeColor: '#FF0000',
							          strokeOpacity: 1.0,
							          strokeWeight: 2
							        });
							
							        flightPath.setMap(map);
							      }
						</script>
						<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHTMjAK03abscfm6m00ddeFAVcj58lSaM&callback=initMap">
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- #END# Exportable Table -->
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#js-date').datepicker(
		{  
			format: 'mm-dd-yyyy',
			autoclose:true,
			endDate: "today",
		});
		
	}); 
	 $(document).ready(function() {
	    $('#jss-date').datepicker(
		{  
			format: 'mm-dd-yyyy',
			autoclose:true,
			endDate: "today",
		});
		
	});
</script>