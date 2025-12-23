<?php
class Database {
    
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "db_test";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select($query) {
        $result = $this->conn->query($query);
        if ($result === false) {
            return false;
        }
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function execute($query) {
        return $this->conn->query($query);
    }

    public function close() {
        $this->conn->close();
    }
}
?>
