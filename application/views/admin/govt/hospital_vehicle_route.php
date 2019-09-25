
<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Vehicle Route Map
                            </h2>
                         
                        </div>
                        <div class="body">
						
							<div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">

				
 
  
    <div id="map"></div>
    <script>

      // This example creates a 2-pixel-wide red polyline showing the path of
      // the first trans-Pacific flight between Oakland, CA, and Brisbane,
      // Australia which was made by Charles Kingsford Smith.

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
