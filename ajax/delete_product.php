<?php
$conn = new mysqli("localhost", "root", "", "ajax_example");

$id = $_POST['id'];
$result = $conn->query("SELECT image FROM tbl_product WHERE id=$id");
$row = $result->fetch_assoc();
if($row){
    if(file_exists("uploads/".$row['image'])){
        unlink("uploads/".$row['image']);
    }
}

if($conn->query("DELETE FROM tbl_product WHERE id=$id")){
    echo "✅ Product Deleted Successfully!";
} else {
    echo "❌ Delete Failed!";
}
?>