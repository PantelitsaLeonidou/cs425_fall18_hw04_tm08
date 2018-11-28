<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once 'Database.php';
  include_once 'PV_class.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog pv object
  $pv = new PV_class($db);

  //Get raw pv data
  $data=json_decode(file_get_contents("php://input"));

 $pv->name=$data->name;
 $pv->address=$data->address;
 $pv->zip_code=$data->zipcode;
 $pv->city=$data->city;
 $pv->country=$data->country;
 $pv->coordinate_x=$data->coordinate_x;
 $pv->coordinate_y=$data->coordinate_y;

 if($pv->create()){
     echo json_encode(
        array('message'=>'Pv Created')
     );
    }
else{
    echo json_encode(
        array('message'=> 'Pv not Created')
    );
}
