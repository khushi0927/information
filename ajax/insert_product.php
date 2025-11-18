<?php

$conn = mysqli_connect("localhost","root","","ajax_example");

if (!empty($_FILES['image']['name']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target))
    {
        $sql = "insert into tbl_product (name,price,image) values ('$name','$price','$image')";
        if($conn->query($sql))
        {
            echo "Success";
        }
        else
        {
            echo "Fail";
        }
    }
    else
    {
        echo "❌ Image Upload Failed!";
    }

}
    


?>