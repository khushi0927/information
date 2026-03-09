<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($product) {
    echo json_encode(["status" => "success", "data" => $product]);
} else {
    echo json_encode(["status" => "error", "message" => "Product not found"]);
}
?>