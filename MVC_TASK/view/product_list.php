<?php

?>
<div>
    <table role="grid" style="width:100%; margin-top:10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($rows)): ?>
            <tr><td colspan="6">No products found.</td></tr>
        <?php else: ?>
            <?php foreach ($rows as $r): ?>
            <tr>
                <td><?php echo htmlspecialchars($r['id']); ?></td>
                <td><?php echo htmlspecialchars($r['product_name']); ?></td>
                <td><?php echo htmlspecialchars($r['product_price']); ?></td>
                <td>
                    <?php if (!empty($r['product_image'])): ?>
                     <img src="../public/uploads/<?php echo htmlspecialchars($r['product_image']); ?>" width="60">

                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($r['quantity']); ?></td>
                <td>
                    <button class="editBtn" data-id="<?php echo $r['id']; ?>">Edit</button>
                    <button class="deleteBtn" data-id="<?php echo $r['id']; ?>">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
