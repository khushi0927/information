<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$id = $_GET['id'];

$query = "SELECT * FROM employees WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();

$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if ($employee) {
    echo json_encode(["status" => "success", "data" => $employee]);
} else {
    echo json_encode(["status" => "error", "message" => "Employee not found"]);
}
?>