<?php
header("Content-Type: application/json");
include_once("../config/databse.php");

$db = new Database();
$conn = $db->connect();

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "Product ID is required"
    ]);
    exit;
}

$id = $_GET['id'];

try {

    $query = "SELECT * FROM products WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => $product
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            "status" => "error",
            "message" => "Product not found"
        ]);
    }

} catch (PDOException $e) {

    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Server Error",
        "details" => $e->getMessage()
    ]);
}
?>