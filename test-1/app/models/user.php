<?php
class User {
    private $conn;
    private $table = "tbl_user";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register user
    public function register($name, $email, $password) {
        $email = $this->conn->real_escape_string($email);
        $name = $this->conn->real_escape_string($name);

        $check = $this->conn->query("SELECT id FROM {$this->table} WHERE email='$email'");
        if ($check->num_rows > 0) {
            return "Email already exists.";
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO {$this->table} (first_name, email, password) VALUES ('$name', '$email', '$hash')";
        return $this->conn->query($query) ? true : false;
    }

    // Login user
   // Login user
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

    


    // Get user by ID
    public function getUserById($id) {
        $id = (int)$id;
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id=$id");
        return $result->fetch_assoc();
    }
}