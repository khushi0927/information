<?php
    
    header("Content-Type: application/json");
    include_once("../config/database.php");

    $db = new Database();
    $conn = $db->connect();

    $data = json_decode(file_get_contents("php://input"));

    $query = "INSERT INTO employee (name, email, image) VALUES (:name, :email, :image)";
$stmt = $conn->prepare($query);

$stmt->bindParam(":name", $data->name);
$stmt->bindParam(":email", $data->email);
$stmt->bindParam(":image", $data->image);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee created"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to create employee"]);
}

?>