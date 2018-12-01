
<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once 'Database.php';
  include_once 'PV_class.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog category object
  $pv = new PV_class($db);

  // Get ID
$pv->pv_id = isset($_GET['pv_id']) ? $_GET['pv_id'] : die();
//$data = json_decode(file_get_contents("php://input"));

  // Set ID to update
//$pv->pv_id = $data->pv_id;

  // Get post
  $pv->read_single();

  // Create array
  $pv_arr = array(
    'pv_id' => $pv->pv_id,
    'name' => $pv->name,
        'address'=>$pv->address,
        'city'=>$pv->city,
        'country'=> $pv->country,
        'zip_code'=>$pv->zip_code,
        'coordinate_x'=>$pv->coordinate_x,
        'coordinate_y'=>$pv->coordinate_y,
  );

  // Make JSON
  print_r(json_encode($pv_arr));
