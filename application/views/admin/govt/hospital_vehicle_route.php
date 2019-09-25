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
							          zoom: 13,
							          center: {lat: 13.6295, lng: 79.3971},
							          mapTypeId: google.maps.MapTypeId.ROADMAP,
							        });
									var iconBase = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/';
									var icons = {
										  parking: {
											icon: iconBase + 'parking_lot_maps.png'
										  },
										  library: {
											icon: iconBase + 'library_maps.png'
										  },
										  info: {
											icon: iconBase + 'info-i_maps.png'
										  }
										};
							
							        var flightPlanCoordinates = [
							          {lat: 13.6295, lng: 79.4259},
							          {lat: 13.6288, lng: 79.4192},
							          {lat: 13.6269, lng: 79.3971}
							        ];
									var flightPath = new google.maps.Polyline({
							          path: flightPlanCoordinates,
							          geodesic: true,
									  strokeColor: '#FF0000',
									  strokeOpacity: 1.0,
									  strokeWeight: 2

							        });
									var features = [
									   {
										position: new google.maps.LatLng(13.6295, 79.4259),
										title: 'Hello Worldwwww!',
										type: 'parking',

									  }, {
										position: new google.maps.LatLng(13.6288, 79.4192),
										title: 'Hello',
										type: 'parking'
									  }, {
										position: new google.maps.LatLng(13.6269, 79.3971),
										title: 'Hello one',
										type: 'parking'
									  }
									];
									for (var i = 0; i < features.length; i++) {
									  var marker = new google.maps.Marker({
										position: features[i].position,
										title: features[i].title,
										icon: icons[features[i].type].icon,
										map: map,
									  });
									};
							        
									
							
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