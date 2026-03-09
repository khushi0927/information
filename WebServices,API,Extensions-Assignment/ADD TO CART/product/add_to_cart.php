<?php
session_start();
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$product_id = $_GET['id'];

// Fetch product
$query = "SELECT * FROM products WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$product){
    echo "Product not found";
    exit;
}

// Create cart session if not exists
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

// If product already in cart
if(isset($_SESSION['cart'][$product_id])){
    $_SESSION['cart'][$product_id]['quantity']++;
} else {
    $_SESSION['cart'][$product_id] = [
        "name" => $product['name'],
        "price" => $product['price'],
        "quantity" => 1
    ];
}

header("Location: cart.php");
?>