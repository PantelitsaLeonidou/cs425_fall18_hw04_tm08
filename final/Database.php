
<?php
  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'PV Database';
    private $username = 'admin';
    private $password = '=@!#254tecmint';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;
 echo "skaata";
      try {
              echo "skaata1";
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

               echo "skaat22a";
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "skaata";
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
?>
