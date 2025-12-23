<?php
require_once 'config/database.php';

class Post {
    private $conn;
    private $table = "posts";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)");
        return $stmt->execute(['title' => $title, 'content' => $content]);
    }

    public function update($id, $title, $content) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id");
        return $stmt->execute(['title'=>$title, 'content'=>$content, 'id'=>$id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
