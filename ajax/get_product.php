<?php
$conn = new mysqli("localhost", "root", "", "ajax_example");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tbl_product WHERE id=$id");
if($row = $result->fetch_assoc()){
    echo json_encode($row);
}
?>