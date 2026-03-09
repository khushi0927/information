<?php
header("Content-Type: application/json");
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

try {

    $query = "SELECT * FROM products";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($products) {
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "count" => count($products),
            "data" => $products
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            "status" => "error",
            "message" => "No products found"
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