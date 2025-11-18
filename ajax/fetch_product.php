<?php

$conn = mysqli_connect("localhost","root","","ajax_example");

$result = $conn->query("SELECT * FROM tbl_product ORDER BY id DESC");

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
            </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td><img src='uploads/{$row['image']}' width='80'></td>
                <td>{$row['name']}</td>
                <td>₹ {$row['price']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No products found!";
}


?>