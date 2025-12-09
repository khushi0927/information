<?php
header("content-type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$query = "SELECT * FROM tbl_student";
$stmt = $conn->prepare($query);
$stmt->execute();

$student = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $student
]);
?>