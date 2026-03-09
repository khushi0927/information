<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$data = json_decode(file_get_contents("php://input"));

$query = "INSERT INTO products (name, price, description)
          VALUES (:name, :price, :description)";

$stmt = $conn->prepare($query);

$stmt->bindParam(":name", $data->name);
$stmt->bindParam(":price", $data->price);
$stmt->bindParam(":description", $data->description);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Product created"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to create product"]);
}
?>