
<?php
  class PV_class {
    // DB stuff
    private $conn;
    private $table = 'PV';

    // Post Properties
    public $pv_id;
    public $name;
    public $address;
    public $zip_code;
    public $city;
    public $country;
    public $coordinate_x;
    public $coordinate_y;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // // Get Posts
    // public function read() {
    //   // Create query
    //   $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
    //                             FROM ' . $this->table . ' p
    //                             LEFT JOIN
    //                               categories c ON p.category_id = c.id
    //                             ORDER BY
    //                               p.created_at DESC';

    //   // Prepare statement
    //   $stmt = $this->conn->prepare($query);

    //   // Execute query
    //   $stmt->execute();

    //   return $stmt;
    // }

    // // Get Single Post
    // public function read_single() {
    //       // Create query
    //       $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
    //                                 FROM ' . $this->table . ' p
    //                                 LEFT JOIN
    //                                   categories c ON p.category_id = c.id
    //                                 WHERE
    //                                   p.id = ?
    //                                 LIMIT 0,1';

    //       // Prepare statement
    //       $stmt = $this->conn->prepare($query);

    //       // Bind ID
    //       $stmt->bindParam(1, $this->id);

    //       // Execute query
    //       $stmt->execute();

    //       $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //       // Set properties
    //       $this->title = $row['title'];
    //       $this->body = $row['body'];
    //       $this->author = $row['author'];
    //       $this->category_id = $row['category_id'];
    //       $this->category_name = $row['category_name'];
    // }
       // // Get Single Post
    public function read_all() {
          // Create query
          $query = 'SELECT pv_id,name,address,city,country,zip_code,coordinate_x,coordinate_y FROM '. $this->table ;

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Execute query
          $stmt->execute();
      return $stmt;
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET name = :name, address = :address, zip_code = :zip_code, city = :city, country= :country, coordinate_x= :coordinate_x, coordinate_y= :coordinate_y';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->address = htmlspecialchars(strip_tags($this->address));
          $this->zip_code = htmlspecialchars(strip_tags($this->zip_code));
          $this->city = htmlspecialchars(strip_tags($this->city));
          $this->country = htmlspecialchars(strip_tags($this->country));
          $this->coordinate_x = htmlspecialchars(strip_tags($this->coordinate_x));
          $this->coordinate_y = htmlspecialchars(strip_tags($this->coordinate_y));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':address', $this->address);
          $stmt->bindParam(':zip_code', $this->zip_code);
          $stmt->bindParam(':city', $this->city);
          $stmt->bindParam(':country', $this->country);
          $stmt->bindParam(':coordinate_x', $this->coordinate_x);
          $stmt->bindParam(':coordinate_y', $this->coordinate_y);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // // Update Post
    // public function update() {
    //       // Create query
    //       $query = 'UPDATE ' . $this->table . '
    //                             SET title = :title, body = :body, author = :author, category_id = :category_id
    //                             WHERE id = :id';

    //       // Prepare statement
    //       $stmt = $this->conn->prepare($query);

    //       // Clean data
    //       $this->title = htmlspecialchars(strip_tags($this->title));
    //       $this->body = htmlspecialchars(strip_tags($this->body));
    //       $this->author = htmlspecialchars(strip_tags($this->author));
    //       $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    //       $this->id = htmlspecialchars(strip_tags($this->id));

    //       // Bind data
    //       $stmt->bindParam(':title', $this->title);
    //       $stmt->bindParam(':body', $this->body);
    //       $stmt->bindParam(':author', $this->author);
    //       $stmt->bindParam(':category_id', $this->category_id);
    //       $stmt->bindParam(':id', $this->id);

    //       // Execute query
    //       if($stmt->execute()) {
    //         return true;
    //       }

    //       // Print error if something goes wrong
    //       printf("Error: %s.\n", $stmt->error);

    //       return false;
    // }

    public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE pv_id = :pv_id';

      // Prepare Statement
      $stmt = $this->conn->prepare($query);

      // clean data
      $this->pv_id = htmlspecialchars(strip_tags($this->pv_id));

      // Bind Data
      $stmt-> bindParam(':pv_id', $this->pv_id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: $s.\n", $stmt->error);

      return false;
    }






    public function read_single(){
  // Create query
  $query = 'SELECT
        pv_id,
        name,address,country,city,zip_code,coordinate_x,coordinate_y
      FROM
        ' . $this->table . '
    WHERE pv_id = ?
    LIMIT 0,1';

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->pv_id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set properties
    $this->pv_id = $row['pv_id'];
    $this->name = $row['name'];
  $this->country = $row['country'];
    $this->city = $row['city'];
    $this->address=$row['address'];
  $this->zip_code = $row['zip_code'];
  $this->coordinate_x = $row['coordinate_x'];
  $this->coordinate_y = $row['coordinate_y'];
}
public function update() {

          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET name = :name, address = :address, city = :city, country = :country, zip_code= :zip_code,
                                                                coordinate_x= :coordinate_x,coordinate_y= :coordinate_y
                                WHERE pv_id = :pv_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->address = htmlspecialchars(strip_tags($this->address));
          $this->country = htmlspecialchars(strip_tags($this->country));
          $this->city = htmlspecialchars(strip_tags($this->city));
          $this->coordinate_x = htmlspecialchars(strip_tags($this->coordinate_x));
          $this->coordinate_y = htmlspecialchars(strip_tags($this->coordinate_y));
          $this->pv_id = htmlspecialchars(strip_tags($this->pv_id));
           $this->zip_code = htmlspecialchars(strip_tags($this->zip_code));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':address', $this->address);
          $stmt->bindParam(':city', $this->city);
          $stmt->bindParam(':country', $this->country);
                      $stmt->bindParam(':zip_code', $this->zip_code);
                      $stmt->bindParam(':coordinate_x',$this->coordinate_x);
                      $stmt->bindParam(':coordinate_y',$this->coordinate_y);
          $stmt->bindParam(':pv_id', $this->pv_id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

  }
