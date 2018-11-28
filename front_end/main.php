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

    <div id="map">

        <script>

            var map = L.map('map').setView([46.770920, 23.589920], 5);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

                      
            
            var url  = "read_all.php";
            var xhr  = new XMLHttpRequest()
            xhr.open('GET', url, true)
            xhr.onload = function () {
                var pvs = JSON.parse(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == "200") {
                   
                       

                 for (var i=0; i < pvs.data.length; i++){
                        var pv_name=pvs.data[i].name;
                        var pv_id=pvs.data[i].pv_id;
                        var pv_address=pvs.data[i].address;
                        var pv_zip_code=pvs.data[i].zip_code;
                        var pv_country=pvs.data[i].country;
                        var pv_city=pvs.data[i].city;
                        var pv_coordinate_x=pvs.data[i].coordinate_x;
                        var pv_coordinate_y=pvs.data[i].coordinate_y;

                         var details='<div class="" >\
                                <label>pv_id:</label><span id="pv_id">'+pv_id+'</span>\
                        <br>\
                                <label>name:</label><span id="name">'+pv_name+'</span>\
                                        <br>\
                                                <label>address:</label><span id="address">'+pv_address+'</span>\
                                                        <br>\
                                        <label>zip_code:</label><span id="zip_code">'+pv_zip_code+'</span>\
                       <br>\
                       <label>city:</label><span id="city">'+pv_city+'</span>\
                       <br>\
                       <label>country:</label><span id="country">'+pv_country+'</span>\
                       <br>\
                       <label>coordinate_x:</label><span id="coordinate_x">'+pv_coordinate_x+'</span>\
                       <br>\
                               <label>coordinate_y:</label><span id="coordinate_y">'+pv_coordinate_y+'</span>\
                                       <br>\
                        <input type="submit"  name="delete_button"  value="delete">\
                        <input type="submit" name="edit_button" value="edit">\
                        <input type="submit" onclick="close_popup()" name="submit" value="cancel">\
                        </div>';
                        
                         L.marker([pvs.data[i].coordinate_x,pvs.data[i].coordinate_y]).addTo(map)
                        .bindPopup(details)
                        .openPopup();

                    }

                } else {
                    window.alert("error");
                }
            }
            xhr.send(null);


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
            .bindPopup(ask_to_create)
            .openPopup();
            });
        </script>
   </div>
</body>
</html>
