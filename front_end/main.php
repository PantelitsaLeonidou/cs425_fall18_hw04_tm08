
<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'Database.php';
  include_once 'PV_class.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $pv = new PV_class($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $pv->pv_id = $data->pv_id;

  $pv->name = $data->name;
  $pv->address = $data->address;
  $pv->zip_code= $data->zip_code;
  $pv->city = $data->city;
  $pv->country=$data->country;
  $pv->coordinate_x=$data->coordinate_x;
  $pv->coordinate_y=$data->coordinate_y;

  // Update post
  if($pv->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }
ubuntu@ip-172-31-23-175:/var/www/html/project$ ^C
ubuntu@ip-172-31-23-175:/var/www/html/project$ ls
Database.php       delete.php     mystyle.css      test.php
PV_class.php       javascript.js  read_all.php     update.php
create_new_pv.php  main.php       read_single.php
ubuntu@ip-172-31-23-175:/var/www/html/project$ cat main.php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
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

        <script>

            var map = L.map('map').setView([46.770920, 23.589920], 5);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);


        readAllFunction();



            map.on('click', function(e) {

                    popLocation= e.latlng;
            var lat=popLocation.lat;
            var lng=popLocation.lng;

            var ask_to_create='<div  class="" id="clickPV">\
            Do you want to create a new PV system?<br>\
            <button id="yes" onclick="present_form();" type="button" >yes</button>\
            <button id="no" onclick="close_popup();" type="button">no</button>\
            </div>';

            var popup = L.popup()
                .setLatLng(popLocation)
                L.marker(popLocation).addTo(map)
        //      .on('click',setpopup);
        .bindPopup(ask_to_create)
        .openPopup();
            });
        </script>
   </div>
</body>
</html>
