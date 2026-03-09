<?php
require_once "config/database.php";

class CommentModel {

    public function getComments(){
        global $conn;
        return $conn->query("SELECT * FROM comments ORDER BY id DESC");
    }

    public function insertComment($username,$comment){
        global $conn;
        $stmt = $conn->prepare("INSERT INTO comments (username,comment) VALUES (?,?)");
        $stmt->bind_param("ss",$username,$comment);
        $stmt->execute();
    }

    public function deleteComment($id){
        global $conn;
        $stmt = $conn->prepare("DELETE FROM comments WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
    }

    public function updateComment($id,$comment){
        global $conn;
        $stmt = $conn->prepare("UPDATE comments SET comment=? WHERE id=?");
        $stmt->bind_param("si",$comment,$id);
        $stmt->execute();
    }

}
?>