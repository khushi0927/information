<?php

$conn = mysqli_connect("localhost","root","","ajax_example");

$id = $_POST['id'] ?? '';
$name = $_POST['name'];
$price = $_POST['price'];


$imageName = '';
if(!empty($_FILES['image']['name'])){
    $imageName = time() . '_' . $_FILES['image']['name'];
    $target = "uploads/" . basename($imageName);
    if(!move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "❌ Image Upload Failed!";
        exit;
    }
}

if($id)
{ 
    // Update
    if($imageName){
        $sql = "UPDATE tbl_product SET name='$name', price='$price', image='$imageName' WHERE id='$id'";
    } else {
        $sql = "UPDATE tbl_product SET name='$name', price='$price' WHERE id='$id'";
    }
    if($conn->query($sql)){
        echo "✅ Product Updated Successfully!";
    } else {
        echo "❌ Update Failed!";
    }
} else {
     // Insert
    if(!$imageName){
        echo "❌ Please select an image!";
        exit;
    }
    $sql = "INSERT INTO tbl_product (name, price, image) VALUES ('$name', '$price', '$imageName')";
    if($conn->query($sql)){
        echo "✅ Product Added Successfully!";
    } else {
        echo "❌ Insert Failed!";
    }
}


    


?>