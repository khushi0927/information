<?php 

class User {
    private $conn;
    private $table = "tbl_user";

    public function __construct($database) {
        $this->conn = $database;
    }

    // Register user
    public function register($first_name,$last_name,$email, $password, $gender, $city) {
        if (!$this->conn) {
            return "Database connection not initialized.";
        }

        $email = $this->conn->real_escape_string($email);
        $first_name = $this->conn->real_escape_string($first_name);
        $last_name = $this->conn->real_escape_string($last_name);
        $gender = $this->conn->real_escape_string($gender);
        $city = $this->conn->real_escape_string($city);

        $check = $this->conn->query("SELECT id FROM {$this->table} WHERE email='$email'");
        if ($check->num_rows > 0) {
            return "Email already exists.";
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO {$this->table} (first_name,last_name, email, password,gender,city) VALUES ('$first_name', '$last_name','$email', '$password', '$gender', '$city')";
        if ($this->conn->query($query)) {
            return true;
        }

        return $this->conn->error;
    }

     public function login($email, $password) {
        $email = $this->conn->real_escape_string($email);
        $query = "SELECT * FROM {$this->table} WHERE email='$email'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
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