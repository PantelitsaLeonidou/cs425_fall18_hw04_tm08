
 function visible(id){

                var e=document.getElementById(id);
                if (e.classList.contains("setinvisible")){
                            e.classList.remove('setinvisible');
                            e.classList.add('setvisible');

                    }
                    else{ e.classList.remove('setvisible');
        e.classList.add('setinvisible');
                    }}



                    function invisible(id){
                        var e = document.getElementById(id);
                        if(e.classList.contains("setvisible")){
                                e.classList.remove("setvisible");
                                e.classList.add("setinvisible");}
                        else{
                        }
                }
                        function delete_pv(){
                        var pv_id=document.getElementById("pv_id").innerText;

                        document.location.reload(true);
                        var pv_jason ={
                                pv_id: pv_id ,
                         };
                        var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance
                        var url="delete.php";
                        xmlhttp.open("DELETE",url,true);
                        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                        xmlhttp.send(JSON.stringify(pv_jason));
                  //      xmlhttp.onreadystatechange = function() {

                         //        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        //      window.alert("FFF");
                        //      readAllFunction();
                        //       }
                //      }
                //               xmlhttp.send(JSON.stringify(pv_jason));
                }

                         function update_pv(){

                        document.getElementById("update_form").className="setvisible";
                        var pv_id=document.getElementById("pv_id").innerText;
                        //document.location.reload(true);
                        var pv_jason ={
                                pv_id: pv_id ,
                         };

                         var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance
                         var url="read_single.php";
                        var params="pv_id="+pv_id;
                         xmlhttp.open("GET",url+"?"+params,true);
                         xmlhttp.onreadystatechange = function() {

                                 if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                 var pvs = JSON.parse(xmlhttp.responseText);

                           document.getElementById("pv_id1").value=pvs['pv_id'];
                           document.getElementById("pv_name").value=pvs['name'];
                           document.getElementById("city").value=pvs['city'];
                           document.getElementById("address").value=pvs['address'];
                           document.getElementById("zip_code").value=pvs['zip_code'];
                           document.getElementById("country").value=pvs['country'];
                           document.getElementById("coordinate_x").value=pvs['coordinate_x'];
                           document.getElementById("coordinate_y").value=pvs['coordinate_y'];

                         }

                        }
                        xmlhttp.send(null);



                        var update_f= document.getElementById("update_f");

                        update_f.addEventListener("submit", function (event) {
                                event.preventDefault();

                                updateData();
                              });

                         }
                         function updateData() {
                               close_popup();
                        //       L.marker(popLocation).addTo(map).bindPopup("dddd").openPopup();
                                var pv_jasonn ={
                                  pv_id:document.getElementById("pv_id1").value,
                                  name:document.getElementById("pv_name").value ,
                                  address:document.getElementById("address").value,
                                  zip_code:document.getElementById("zip_code").value,
                                  city:document.getElementById("city").value,
                                  country:document.getElementById("country").value,
                                  coordinate_x:document.getElementById("coordinate_x").value,
                                  coordinate_y:document.getElementById("coordinate_y").value
                                };
                          document.getElementById("update_form").className="setinvisible";
//                          document.location.reload(true);

                        var x = new XMLHttpRequest();   // new HttpRequest instance
                        var url1="update.php";
                        x.open("PUT",url1,true);
                        x.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                //       x.onreadystatechange = function() {

                                 //if(x.readyState == 4 && x.status == 200) {

                //                       readAllFunction();
                                // }
                        x.send(JSON.stringify(pv_jasonn));
                                 readAllFunction();

                                 //     document.location.reload(true);

                         }


                function present_form(){
                        var form='<div class="" id="form_pv">\
                        <form  id="myForm">\
                        <input type="text" name="name" placeholder="name" required>\
                        <input type="text" name="address" placeholder="address "required>\
                        <input type="text" name="zipcode" placeholder="zipcode"required>\
                        <input type="text" name="city" placeholder="city"required>\
                        <input type="text" name="country" placeholder="country"required>\
                        <br><input type="submit" name="submit"  value="create"required>\
                        </form>\
                        </div>';
                        L.marker(popLocation).addTo(map)
                        .bindPopup(form)
                        .openPopup();



                        var form1 = document.getElementById("myForm");

                        form1.addEventListener("submit", function (event) {

                                event.preventDefault();

                                sendData();
                              });


                         function sendData() {

                                var pv_jason ={
                                  name:document.getElementsByName("name")[0].value ,
                                  address:document.getElementsByName("address")[0].value,
                                  zipcode:document.getElementsByName("zipcode")[0].value,
                                  city: document.getElementsByName("city")[0].value,
                                  country:document.getElementsByName("country")[0].value,
                                  coordinate_x:this.popLocation.lat,
                                  coordinate_y:this.popLocation.lng
                                };


                        var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance
                        var url="create_new_pv.php";
                        xmlhttp.open("POST",url,true);
                        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                        xmlhttp.send(JSON.stringify(pv_jason));
                        close_popup();
                        readAllFunction();
                         }




                }

                function close_popup(){
                        map.closePopup();


               }


function readAllFunction(){

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
                        <input type="submit"  name="delete_button" onclick="delete_pv()" value="delete">\
                        <input type="submit" name="edit_button" onclick="update_pv()" value="edit">\
                        <input type="submit" onclick="close_popup()" name="submit" value="cancel">\
                        </div>';

                         L.marker([pvs.data[i].coordinate_x,pvs.data[i].coordinate_y]).addTo(map)
                        .bindPopup(details);

                    }

                } else {
                    window.alert("error");
                }
            }
            xhr.send(null);




}
