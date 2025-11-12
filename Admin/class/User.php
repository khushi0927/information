<?php 
class User {
    private $conn;
    private $table = "tbl_user";

    public function __construct($database) {
        $this->conn = $database;
    }

    
    public function register($Username, $Email, $Password) {
        $Email = $this->conn->real_escape_string($Email);
        $Username = $this->conn->real_escape_string($Username);

        $check = $this->conn->query("SELECT id FROM {$this->table} WHERE Email='$Email'");
        if ($check->num_rows > 0) {
            return "Email already exists.";
        }

        $hash = password_hash($Password, PASSWORD_BCRYPT);
        $query = "INSERT INTO {$this->table} (Username, Email, Password) VALUES ('$Username', '$Email', '$hash')";
        return $this->conn->query($query) ? true : false;
    }

     
    public function login($Email, $Password) {
        $Email = $this->conn->real_escape_string($Email);
        $query = "SELECT * FROM {$this->table} WHERE Email='$Email'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $User = $result->fetch_assoc();
            if (password_verify($Password , $User['Password'])) {
                return $User;
            }
        }
        return false;
    }

    
    public function getUserById($id) {
        $id = (int)$id;
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id=$id");
        return $result->fetch_assoc();
    }
}
?>