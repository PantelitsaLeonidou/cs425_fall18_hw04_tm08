<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>PV system</title>
<meta name="author" content="Christia Charilaou, Pantelitsa Leonidou">
<meta name="keywords" content="map,PV System,photovoltaic,system,energy,sun,power,environment,environment friendtly,source of energy,solar energy">
<meta name="description" content="This webpage contains information about photovoltaic systems. It gives the coordinates of the existing Pv's on a world wide map">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin="">
    </script>
    <script src="javascript.js"></script>
</head>
<body>



<div class="setinvisible" id="update_form">
<form id="update_f">
<br>PV Id:<br>
<input type="text" id="pv_id1" value="" disabled>
<br>Pv name:<br>
<input type="text" id="pv_name" value="" placeholder="">
<br>Addres:<br>
<input type="text" id="address" value="" placeholder="">
<br>City:<br>
  <input type="text" id="city" value="" placeholder="">
<br>Country:<br>
  <input type="text" id="country" value="" placeholder="">
<br>Zip code:<br>
  <input type="text" id="zip_code" value="" placeholder="">
<br>Coordinate x:<br>
<input type="text" id="coordinate_x" value="" placeholder="">
<br>Coordinate_y:<br>
<input type="text" id="coordinate_y" value="" placeholder="">
  <br>
<input type="submit" id="save_button"  value="save" >
<button onclick()="invisible()" id="cancel1" >cancel </button>

</form>
</div>
    <div id="map">
<script src="javascript.js"></script>


   </div>
</body>
</html>
