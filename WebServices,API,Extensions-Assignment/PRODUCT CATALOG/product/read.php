<?php
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();

return $stmt->fetchAll(PDO::FETCH_ASSOC);
?>