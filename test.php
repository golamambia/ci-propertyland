<?php
//ror_reporting(0);
$going="1600+Amphitheatre+Parkway,+Mountain+View,+CA";

    $address =$going; // Google HQ
    $prepAddr = str_replace(' ','+',$address);
    
// $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
//         $output= json_decode($geocode);
//         var_dump($geocode);
//         $data['lat'] = $output->results[0]->geometry->location->lat;
//         $data['lng'] = $output->results[0]->geometry->location->lng;

  
       if(isset($_POST['submit_address']))
{
    $address =$_POST['address']; // Google HQ
  $prepAddr = str_replace(' ','+',$address);
  $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
  $output= json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;
	
  echo "latitude - ".$latitude;
  echo "longitude - ".$longitude;
}
   
?>

<html>
<head>
    <script>
var myCenter = new google.maps.LatLng(37.422230, -122.084058);
function initialize(){
    var mapProp = {
        center:myCenter,
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"),mapProp);

    var marker = new google.maps.Marker({
        position:myCenter,
    });

    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>

<form method="post">
  <p>Enter Your Street name,City state,Country</p>
  <textarea name='address' placeholder='Street name,City state,Country'></textarea>
  <input type="submit" name="submit_address" value="Get Coordinates">
</form>

<form method="post" action='get_data.php'>
  <p>Enter Latitude</p>
  <input type='text' name='latitude' placeholder='Enter Latitude'>
  <p>Enter Longitude</p>
  <input type='text' name='longitude' placeholder='Enter Longitude'>
  <input type="submit" name="submit_coordinates" value="Get Address">
</form>

</body>
</html>


Now i need HTML area where i will display map :

<div id="map" style="width: 100%; height: 300px;"></div> 


<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>

</body>
</html>