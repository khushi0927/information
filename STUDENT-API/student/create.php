<?php

header("Content-Type: application/json");
include_once '../config/database.php';

  $db = new Database();
  $conn = $db->connect();

  $data = json_decode(file_get_contents("php://input"));

  $query= "INSERT INTO tbl_student (name,marks) VALUES (:name,:marks)";
  $stmt = $conn->prepare($query);

  $stmt->bindParam(":name", $data->name);
  $stmt->bindParam(":marks", $data->marks);

  if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee created"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to create employee"]);
}

?>