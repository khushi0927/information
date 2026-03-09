<?php
include_once("../config/database.php");

$db = new Database();
$conn = $db->connect();

$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container { width:90%; margin:auto; }
        .card {
            width:250px;
            background:#fff;
            padding:15px;
            margin:15px;
            display:inline-block;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            border-radius:8px;
            vertical-align:top;
        }
        .card img {
            width:100%;
            height:180px;
            object-fit:cover;
        }
        .price {
            color:green;
            font-weight:bold;
        }
        .stock {
            color:blue;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Product Catalog</h1>

    <?php foreach($products as $product): ?>
        <div class="card">
            <?php if($product['image']): ?>
                <img src="uploads/<?php echo $product['image']; ?>">
            <?php endif; ?>
            
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['description']; ?></p>
            <p class="price">₹ <?php echo $product['price']; ?></p>
            <p class="stock">Stock: <?php echo $product['stock']; ?></p>
            <p><b>Category:</b> <?php echo $product['category']; ?></p>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>