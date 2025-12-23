<?php
class Database {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_test");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        echo "Database connected<br>";
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
            echo "Database connection closed";
        }
    }
}


$db = new Database();

?>
