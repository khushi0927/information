<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM tbl_student WHERE id = :id";
$stmt = $conn->prepare($query);

$stmt->bindParam(":id", $data->id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "student deleted"]);
} else {
    echo json_encode(["status" => "error", "message" => "Delete failed"]);
}
?>