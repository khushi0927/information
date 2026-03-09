<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<h2>Shopping Cart</h2>

<?php if(empty($cart)): ?>
    <p>Cart is empty</p>
<?php else: ?>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php
$grand_total = 0;
foreach($cart as $id => $item):
    $total = $item['price'] * $item['quantity'];
    $grand_total += $total;
?>

<tr>
    <td><?= $item['name'] ?></td>
    <td>₹<?= $item['price'] ?></td>
    <td>
        <form action="update_cart.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1">
            <button type="submit">Update</button>
        </form>
    </td>
    <td>₹<?= $total ?></td>
    <td>
        <a href="remove_cart.php?id=<?= $id ?>">Remove</a>
    </td>
</tr>

<?php endforeach; ?>

<tr>
    <td colspan="3"><strong>Grand Total</strong></td>
    <td colspan="2"><strong>₹<?= $grand_total ?></strong></td>
</tr>

</table>

<?php endif; ?>