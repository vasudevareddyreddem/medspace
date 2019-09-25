
<style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
		width:100%
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        
        height: 100%;
      }
      #right-panel {
       
        border-width: 2px;
        width: 100%;
        height: 800px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
       line-height:20px;
        background-color: #f9f9f9;
        padding: 10px;
        overflow: scroll;
        height: 500px;
		border:1px solid #ddd;
      } 
	  #directions-panel b{
   color:red;
      }
	  .gm-svpc{
		  display:none;
	  }
	  .sidebar {
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-family: "Roboto", sans-serif;
    background: #fdfdfd;
    width: 208px;
    overflow: hidden;
    display: inline-block;
    height: calc(100vh - 70px);
    position: fixed;
    top: 70px;
    left: 0;
    -webkit-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 11 !important;
	
}
section.content {
    margin: 100px 15px 0 220px;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    -webkit-transition: 0.5s;
    transition: 0.5s;
}
    </style>

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
					<div class="row" >
						<div class="col-md-8" style="min-height:540px;" id="map">
						</div>
						<div class="col-md-4">
						<div class="panel panel-default" style="margin-bottom:0;border-radius:0;border-bottom:none;padding:6px 10px;margin-left:10px;background:#f44336;color:#fff;font-size:20px;">
							Total KMS : 250
						</div>
						<div id="right-panel">
							<div id="directions-panel"></div>
						</div>
						</div>
						<script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
           center: {lat: 13.6373, lng: 79.5037}
        });
        directionsRenderer.setMap(map);
		calculateAndDisplayRoute(directionsService, directionsRenderer);
        
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var waypts = [];
        waypts.push({
              location: {lat: 13.6373, lng: 79.5037},
              stopover: true
            },{
              location: {lat: 13.636569674389497, lng: 79.42275737892919},
              stopover: true
            },{
              location: {lat: 13.637646197519338, lng: 79.42465638291173},
              stopover: true
            },{
              location: {lat: 13.640174573949073, lng: 79.4252089179688},
              stopover: true
            },{
              location: {lat: 13.64245236361076, lng: 79.42883057346444},
              stopover: true
            },{
              location: {lat: 13.6373, lng: 79.5037},
              stopover: true
            }
			
			);

        directionsService.route({
          origin: {lat: 13.6373, lng: 79.5037},  // Haight.
          destination: {lat: 13.64245236361076, lng: 79.42883057346444},  // Domlur.
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsRenderer.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<hr>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
						<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHTMjAK03abscfm6m00ddeFAVcj58lSaM&callback=initMap">
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