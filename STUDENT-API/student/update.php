<?php
header("Content-Type: application/json");
include_once("../config/database.php");


$db = new Database();
$conn = $db->connect();

$data = json_decode(file_get_contents("php://input"));

$query = "UPDATE tbl_student SET name = :name, marks = :marks WHERE id = :id";
$stmt = $conn->prepare($query);

$stmt->bindParam(":name", $data->name);
$stmt->bindParam(":marks", $data->marks);
$stmt->bindParam(":id", $data->id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "student updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update"]);
}
?>