<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once 'Database.php';
  include_once 'PV_class.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $pv = new PV_class($db);

  // Category read query
  $result = $pv->read_all();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        
        $cat_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            'address'=>$address,
            'city'=>$city,
            'zip_code'=>$zip_code,
            'country'=>$country,
            'pv_id'=>$pv_id,
            'name' => $name,
            'coordinate_x'=> $coordinate_x,
            'coordinate_y'=> $coordinate_y,
          );

          // Push to "data"
          array_push($cat_arr['data'], $cat_item);
        }

        // Turn to JSON & output
        return json_encode($cat_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No PV Found')
        );
  }