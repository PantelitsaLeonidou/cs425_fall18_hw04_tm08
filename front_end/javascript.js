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
                        xmlhttp.open("POST",url,true);
                        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                        xmlhttp.send(JSON.stringify(pv_jason));

                }

                function present_form(){
                        var form='<div class="" id="form_pv">\
                        <form  id="myForm">\
                        <input type="text" name="name" placeholder="name">\
                        <input type="text" name="address" placeholder="address ">\
                        <input type="text" name="zipcode" placeholder="zipcode">\
                        <input type="text" name="city" placeholder="city">\
                        <input type="text" name="country" placeholder="country">\
                        <input type="submit" name="submit"  value="create">\
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
                                  city:document.getElementsByName("city")[0].value,
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
                        }
                }
              
                function close_popup(){


                map.closePopup();
               }