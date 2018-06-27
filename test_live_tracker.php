<?php

error_reporting(0);

$iss_satellite_id="25544";
$locate_link = "https://api.wheretheiss.at/v1/satellites/";
$iss = $locate_link.$iss_satellite_id;

$catch_iss = file_get_contents($iss, true);
$decodeISS = json_decode($catch_iss, true);
$catch_iss_lat = $decodeISS["latitude"];
$catch_iss_long = $decodeISS["longitude"];
$m1 = substr($catch_iss_lat, 0, 8);
$m2 = substr($catch_iss_long, 0, 8);

$gmap_link = "https://maps.googleapis.com/maps/api/geocode/json?latlng=";
$gmapper = $gmap_link."".$m1.",".$m2;
$mapper = file_get_contents($gmapper);

$decodeMap = json_decode($mapper, true);
$fetchLocation = $decodeMap['results'][0]['formatted_address'];

echo '<b>'."Current ISS Location: ".'</b>'.$fetchLocation;
echo '<br>';
echo "Latitude: ".$m1;
echo '<br>';
echo "Longtitude: ".$m2;

// ashu
?>
