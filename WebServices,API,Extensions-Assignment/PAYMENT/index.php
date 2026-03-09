<?php
require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout Page</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<h2>Checkout - Product</h2>
<p>Product: Test Product</p>
<p>Price: ₹500</p>

<form action="charge.php" method="POST">
    <button type="submit">Pay ₹500</button>
</form>

</body>
</html>