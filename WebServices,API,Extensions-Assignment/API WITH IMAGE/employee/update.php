<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$data = json_decode(file_get_contents("php://input"));

$query = "UPDATE employee SET name = :name, email = :email, image = :image WHERE id = :id";
$stmt = $conn->prepare($query);

$stmt->bindParam(":name", $data->name);
$stmt->bindParam(":email", $data->email);
$stmt->bindParam(":image", $data->image);
$stmt->bindParam(":id", $data->id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update"]);
}
?>