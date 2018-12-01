
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
