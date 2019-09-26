
<style>
     #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
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
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
        
        height: 600px;
      }
	  #directions-panel1{
		  height:580px;
		  overflow:scroll;
		   line-height: 20px;
    background-color: #f9f9f9;
    padding: 10px;
 
    border: 1px solid #ddd;
	margin-left:10px;
	  }
	  #directions-panel1 b{
		    color:red;
	  }
	  #directions-panel1 b{
		    color:red;
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
.gm-svpc{
		  display:none;
	  }
hr {
    margin-top: 10px;
    margin-bottom: 10px;
    border: 0;
    border-top: 1px solid #eee;
}
    </style>

<section class="content">
	<!-- Exportable Table -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2><?php echo isset($v_details['truck_reg_no'])?$v_details['truck_reg_no']:''; ?>  &nbsp;&nbsp;&nbsp;Vehicle Route Map</h2> 
				</div>
				<div class="body">
				<form action="<?php echo base_url('hospital/vehicle_route_details/'); ?>" method="post" >
				<input type="hidden" name="t_id" value="<?php echo isset($v_details['t_id'])?$v_details['t_id']:''; ?>">
					   <div class="row">
						<div class="col-md-4">
						  <label>Pick Date</label>
							<div class="input-group date">
								<input type="text" name="from_date" class="form-control" id="jss-date" value="<?php echo isset($s_date)?$s_date:''; ?>" required>
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
				</form>
					<div class="row" >
					<?php if(count($lat_longs)>0){ ?>
						<div class="col-md-8">
							<div id="directions-panel"></div>
						</div>
						<div class="col-md-4">
						<div class="panel panel-default" style="margin-bottom:0;border-radius:0;border-bottom:none;padding:6px 10px;margin-left:10px;background:#f44336;color:#fff;font-size:20px;">
							Total KMS : <span id="km_val"></span>
						</div>
						<div id="directions-panel1"></div>
						</div>
					<?php }else{ ?>
					<div class="col-md-12">Vehicle data not found . Please try again</div>
					<?Php } ?>
						
<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&key=AIzaSyBHTMjAK03abscfm6m00ddeFAVcj58lSaM"></script>

<div id="map_canvas" style="width:100%;height:90%;"></div>
<script>
var map;
var directionDisplay;
var directionsService;
var stepDisplay;
var markerArray = [];
var position;
var marker = null;
var polyline = null;
var poly2 = null;
var speed = 0.000001000,
  wait = 1;
var infowindow = null;
var timerHandle = null;

function createMarker(latlng, label, html) {
  var contentString = '<b>' + label + '</b><br>' + html;
  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title: label,
    zIndex: Math.round(latlng.lat() * -100000) << 5
  });
  marker.myname = label;
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(contentString);
    infowindow.open(map, marker);
  });
  return marker;
}

function initialize() {
  infowindow = new google.maps.InfoWindow({
    size: new google.maps.Size(150, 50)
  });
  // Instantiate a directions service.
  directionsService = new google.maps.DirectionsService();

  // Create a map and center it on Manhattan.
  var myOptions = {
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("directions-panel"), myOptions);

  geocoder = new google.maps.Geocoder();
  geocoder.geocode({
    'address':  {lat: 13.6373, lng: 79.5037},
  }, function(results, status) {
    map.setCenter(results[0].geometry.location);
  });

  // Create a renderer for directions and bind it to the map.
  var rendererOptions = {
    map: map
  };
  directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

  // Instantiate an info window to hold step text.
  stepDisplay = new google.maps.InfoWindow();

  polyline = new google.maps.Polyline({
    path: [],
    strokeColor: '#FF0000',
    strokeWeight: 3
  });
  poly2 = new google.maps.Polyline({
    path: [],
    strokeColor: '#FF0000',
    strokeWeight: 3
  });
  calcRoute();
}

var steps = [];

function calcRoute() {

  if (timerHandle) {
    clearTimeout(timerHandle);
  }
  if (marker) {
    marker.setMap(null);
  }
  polyline.setMap(null);
  poly2.setMap(null);
  directionsDisplay.setMap(null);
  polyline = new google.maps.Polyline({
    path: [],
    strokeColor: '#FF0000',
    strokeWeight: 3
  });
  poly2 = new google.maps.Polyline({
    path: [],
    strokeColor: '#FF0000',
    strokeWeight: 3
  });
  // Create a renderer for directions and bind it to the map.
  var rendererOptions = {
    map: map
  };
  directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

  //var start = document.getElementById("start").value;
  //var end = document.getElementById("end").value;
  var travelMode = google.maps.DirectionsTravelMode.DRIVING;
var waypts = [];
        waypts.push(
		<?php if(isset($lat_longs) && count($lat_longs)>0){ ?>
		<?php foreach($lat_longs as $li){?>
			{
              location: {lat: <?php echo isset($li['lat'])?$li['lat']:'0'; ?>, lng: <?php echo isset($li['lng'])?$li['lng']:'0'; ?>},
              stopover: true
            },
		<?php } ?>
		<?php } ?>
			);
  var request = {
    origin: {lat: <?php echo isset($first['lat'])?$first['lat']:'0'; ?>, lng: <?php echo isset($first['lng'])?$first['lng']:'0'; ?>},
    destination: {lat: <?php echo isset($last['lat'])?$last['lat']:'0'; ?>, lng: <?php echo isset($last['lng'])?$last['lng']:'0'; ?>},
	waypoints: waypts,
    travelMode: travelMode
  };

  // Route the directions and pass the response to a
  // function to create markers for each step.
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
	   directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel1');
            summaryPanel.innerHTML = '';
			var totaldistance = 0;
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
             
			  summaryPanel.innerHTML += route.legs[i].duration.text + ' &nbsp;&nbsp;&nbsp;' + route.legs[i].distance.text +'<br>';
			  totaldistance = totaldistance + route.legs[i].distance.value ;
			  //alert(route.legs[i].distance.text);
			  total = Number(route.legs[i].distance.text);
            }
			var km = totaldistance / 1000;
			jQuery('#km_val').append(km);
			

      var bounds = new google.maps.LatLngBounds();
      var route = response.routes[0];
      startLocation = new Object();
      endLocation = new Object();

      // For each route, display summary information.
      var path = response.routes[0].overview_path;
      var legs = response.routes[0].legs;
      for (i = 0; i < legs.length; i++) {
        if (i === 0) {
          startLocation.latlng = legs[i].start_location;
          startLocation.address = legs[i].start_address;
          //   marker = createMarker(legs[i].start_location, "start", legs[i].start_address, "green");
        }
        endLocation.latlng = legs[i].end_location;
        endLocation.address = legs[i].end_address;
        var steps = legs[i].steps;
        for (j = 0; j < steps.length; j++) {
          var nextSegment = steps[j].path;
          for (k = 0; k < nextSegment.length; k++) {
            polyline.getPath().push(nextSegment[k]);
            bounds.extend(nextSegment[k]);
          }
        }
      }
      polyline.setMap(map);
      map.fitBounds(bounds);
      map.setZoom(18);
      startAnimation();
    }
	
	
	
  });
}



var step = 50; // 5; // metres
var tick = 1000; // milliseconds
var eol;
var k = 0;
var stepnum = 0;
var speed = "";
var lastVertex = 1;

//=============== animation functions ======================
function updatePoly(d) {
  // Spawn a new polyline every 20 vertices, because updating a 100-vertex poly is too slow
  if (poly2.getPath().getLength() > 20) {
    poly2 = new google.maps.Polyline([polyline.getPath().getAt(lastVertex - 1)]);
    // map.addOverlay(poly2)
  }

  if (polyline.GetIndexAtDistance(d) < lastVertex + 2) {
    if (poly2.getPath().getLength() > 1) {
      poly2.getPath().removeAt(poly2.getPath().getLength() - 1);
    }
    poly2.getPath().insertAt(poly2.getPath().getLength(), polyline.GetPointAtDistance(d));
  } else {
    poly2.getPath().insertAt(poly2.getPath().getLength(), endLocation.latlng);
  }
}

function animate(d) {
  if (d > eol) {
    map.panTo(endLocation.latlng);
    marker.setPosition(endLocation.latlng);
    return;
  }
  var p = polyline.GetPointAtDistance(d);
  map.panTo(p);
  var lastPosn = marker.getPosition();
  marker.setPosition(p);
  var heading = google.maps.geometry.spherical.computeHeading(lastPosn, p);
  icon.rotation = heading;
  marker.setIcon(icon);
  updatePoly(d);
  timerHandle = setTimeout("animate(" + (d + step) + ")", tick);
}

function startAnimation() {
  eol = polyline.Distance();
  map.setCenter(polyline.getPath().getAt(0));
  marker = new google.maps.Marker({
    position: polyline.getPath().getAt(0),
    map: map,
    icon: icon
  });

  poly2 = new google.maps.Polyline({
    path: [polyline.getPath().getAt(0)],
    strokeColor: "#0000FF",
    strokeWeight: 10
  });
  // map.addOverlay(poly2);
  setTimeout("animate(50)", 2000); // Allow time for the initial map display
}
google.maps.event.addDomListener(window, 'load', initialize);

//=============== ~animation funcitons =====================

var car ="M6 224 c-3 -9 -6 -51 -6 -95 0 -64 3 -79 15 -79 9 0 18 -7 21 -15 8 -19 28 -19 44 0 16 20 84 20 100 0 17 -21 41 -19 47 4 3 12 11 17 19 14 11 -4 14 6 14 47 0 63 -28 110 -66 110 -15 0 -24 6 -24 15 0 23 -155 22 -164 -1z";
var icon = {
  path: car,
  scale: .7,
  strokeColor: 'white',
  strokeWeight: .10,
  fillOpacity: 1,
  fillColor: '#404040',
  offset: '5%',
  // rotation: parseInt(heading[i]),
  anchor: new google.maps.Point(10, 25) // orig 10,50 back of car, 10,0 front of car, 10,25 center of car
};

// === first support methods that don't (yet) exist in v3
google.maps.LatLng.prototype.distanceFrom = function(newLatLng) {
  var EarthRadiusMeters = 6378137.0; // meters
  var lat1 = this.lat();
  var lon1 = this.lng();
  var lat2 = newLatLng.lat();
  var lon2 = newLatLng.lng();
  var dLat = (lat2 - lat1) * Math.PI / 180;
  var dLon = (lon2 - lon1) * Math.PI / 180;
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = EarthRadiusMeters * c;
  return d;
}

google.maps.LatLng.prototype.latRadians = function() {
  return this.lat() * Math.PI / 180;
}

google.maps.LatLng.prototype.lngRadians = function() {
  return this.lng() * Math.PI / 180;
}

// === A method which returns the length of a path in metres ===
google.maps.Polygon.prototype.Distance = function() {
  var dist = 0;
  for (var i = 1; i < this.getPath().getLength(); i++) {
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i - 1));
  }
  return dist;
}

// === A method which returns a GLatLng of a point a given distance along the path ===
// === Returns null if the path is shorter than the specified distance ===
google.maps.Polygon.prototype.GetPointAtDistance = function(metres) {
  // some awkward special cases
  if (metres == 0) return this.getPath().getAt(0);
  if (metres < 0) return null;
  if (this.getPath().getLength() < 2) return null;
  var dist = 0;
  var olddist = 0;
  for (var i = 1;
    (i < this.getPath().getLength() && dist < metres); i++) {
    olddist = dist;
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i - 1));
  }
  if (dist < metres) {
    return null;
  }
  var p1 = this.getPath().getAt(i - 2);
  var p2 = this.getPath().getAt(i - 1);
  var m = (metres - olddist) / (dist - olddist);
  return new google.maps.LatLng(p1.lat() + (p2.lat() - p1.lat()) * m, p1.lng() + (p2.lng() - p1.lng()) * m);
}

// === A method which returns an array of GLatLngs of points a given interval along the path ===
google.maps.Polygon.prototype.GetPointsAtDistance = function(metres) {
  var next = metres;
  var points = [];
  // some awkward special cases
  if (metres <= 0) return points;
  var dist = 0;
  var olddist = 0;
  for (var i = 1;
    (i < this.getPath().getLength()); i++) {
    olddist = dist;
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i - 1));
    while (dist > next) {
      var p1 = this.getPath().getAt(i - 1);
      var p2 = this.getPath().getAt(i);
      var m = (next - olddist) / (dist - olddist);
      points.push(new google.maps.LatLng(p1.lat() + (p2.lat() - p1.lat()) * m, p1.lng() + (p2.lng() - p1.lng()) * m));
      next += metres;
    }
  }
  return points;
}

// === A method which returns the Vertex number at a given distance along the path ===
// === Returns null if the path is shorter than the specified distance ===
google.maps.Polygon.prototype.GetIndexAtDistance = function(metres) {
    // some awkward special cases
    if (metres == 0) return this.getPath().getAt(0);
    if (metres < 0) return null;
    var dist = 0;
    var olddist = 0;
    for (var i = 1;
      (i < this.getPath().getLength() && dist < metres); i++) {
      olddist = dist;
      dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i - 1));
    }
    if (dist < metres) {
      return null;
    }
    return i;
  }
  // === Copy all the above functions to GPolyline ===
google.maps.Polyline.prototype.Distance = google.maps.Polygon.prototype.Distance;
google.maps.Polyline.prototype.GetPointAtDistance = google.maps.Polygon.prototype.GetPointAtDistance;
google.maps.Polyline.prototype.GetPointsAtDistance = google.maps.Polygon.prototype.GetPointsAtDistance;
google.maps.Polyline.prototype.GetIndexAtDistance = google.maps.Polygon.prototype.GetIndexAtDistance;

</script>
<script>
$(document).ready(function() {
    $('#jss-date').datepicker(
	{  
		format: 'yyyy-mm-dd',
		autoclose:true,
		endDate: "today",
	});
	
});
</script>