<?php
class User {
    private $conn;
    private $table = "tbl_user";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register user
    public function register($first_name, $email, $password) {
        $email = $this->conn->real_escape_string($email);
        $first_name = $this->conn->real_escape_string($first_name);

        $check = $this->conn->query("SELECT id FROM {$this->table} WHERE email='$email'");
        if ($check->num_rows > 0) {
            return "Email already exists.";
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO {$this->table} (first_name, email, password) VALUES ('$first_name', '$email', '$hash')";
        return $this->conn->query($query) ? true : false;
    }

}