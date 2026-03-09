<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$query = "SELECT * FROM employees";
$stmt = $conn->prepare($query);
$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $employees
]);
?>