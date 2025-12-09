<?php

header("content-type:application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$id = $_GET['id'];

$query = "SELECT * FROM tbl_student WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();

$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($student) {
    echo json_encode(["status" => "success", "data" => $student]);
} else {
    echo json_encode(["status" => "error", "message" => "student not found"]);
}
?>