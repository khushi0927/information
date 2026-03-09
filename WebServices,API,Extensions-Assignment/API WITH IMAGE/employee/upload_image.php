<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

if (!isset($_POST['id'])) {
    echo json_encode(["status" => "error", "message" => "Employee ID required"]);
    exit;
}

$employee_id = $_POST['id'];

if (!isset($_FILES['image'])) {
    echo json_encode(["status" => "error", "message" => "Image file required"]);
    exit;
}

$file = $_FILES['image'];

$allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
$max_size = 2 * 1024 * 1024; // 2MB

if ($file['error'] !== 0) {
    echo json_encode(["status" => "error", "message" => "File upload error"]);
    exit;
}

if (!in_array($file['type'], $allowed_types)) {
    echo json_encode(["status" => "error", "message" => "Only JPG, JPEG, PNG allowed"]);
    exit;
}

if ($file['size'] > $max_size) {
    echo json_encode(["status" => "error", "message" => "File must be less than 2MB"]);
    exit;
}

$upload_dir = "uploads/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}


$new_name = time() . "_" . basename($file['name']);
$destination = $upload_dir . $new_name;


if (move_uploaded_file($file['tmp_name'], $destination)) {

  
    $query = "UPDATE employee SET image = :image WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":image", $new_name);
    $stmt->bindParam(":id", $employee_id);

    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success",
            "message" => "Image uploaded successfully",
            "file_name" => $new_name
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database update failed"]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Failed to upload image"]);
}
?>