<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // INSERT
    public function insertUser($name) {
        $stmt = $this->conn->prepare("INSERT INTO users(name) VALUES(?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
    }

    // READ
    public function getUsers() {
        return $this->conn->query("SELECT * FROM users");
    }

    // UPDATE
    public function updateUser($id, $name) {
        $stmt = $this->conn->prepare("UPDATE users SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
        $stmt->execute();
    }

    // DELETE
    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
