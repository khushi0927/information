<?php

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MVC TASK</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1 align=center>PRODUCT MANAGEMENT</h1>
    <h2>Add Product</h2>
    <?php include __DIR__ . '/../view/add_product.php'; ?>

    <h3>Products</h3>
    <div>
        <input type="text" id="searchBox" placeholder="Search by name">
        <button id="btnSearch">Search</button>
        <button id="btnRefresh">Refresh</button>
    </div>

    <div id="productListArea" style="margin-top:10px;"></div>

    <h3>Edit Product</h3>
    <div id="editArea">
        <?php include __DIR__ . '/../view/edit_product.php'; ?>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
