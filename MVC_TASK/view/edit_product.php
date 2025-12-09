<?php require_once "header.php"; ?>

<form id="editForm" enctype="multipart/form-data">
    <input type="hidden" name="id" id="edit_id">
    <input type="hidden" name="old_image" id="old_image">

    <div>
        <label>Product Name</label><br>
        <input type="text" name="product_name" id="edit_product_name" class="demoInputBox">
    </div>

    <div>
        <label>Product Price</label><br>
        <input type="text" name="product_price" id="edit_product_price" class="demoInputBox">
    </div>

    <div>
        <label>Current Image</label><br>
        <img id="current_image" src="" width="80" style="display:none;"><br>
        <label>New Image (optional)</label>
        <input type="file" name="product_image" id="edit_product_image" class="demoInputBox">
    </div>

    <div>
        <label>Quantity</label><br>
        <input type="text" name="quantity" id="edit_quantity" class="demoInputBox">
    </div>

    <div style="margin-top:10px;">
        <input type="hidden" name="action" value="update">
        <button type="submit">Update</button>
        <button type="button" id="cancelEdit">Cancel</button>
    </div>
</form>

<?php require_once "footer.php"; ?>
