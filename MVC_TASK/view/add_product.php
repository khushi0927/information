<?php require_once "header.php"; ?>

<form id="addForm" enctype="multipart/form-data">
    <div>
        <label>Product Name</label>
        <span id="name-info" class="info"></span><br>
        <input type="text" name="product_name" id="product_name" class="demoInputBox">
    </div>

    <div>
        <label>Product Price</label>
        <span id="product_price-info" class="info"></span><br>
        <input type="text" name="product_price" id="product_price" class="demoInputBox">
    </div>

    <div>
        <label>Product Image</label>
        <span id="product_image-info" class="info"></span><br>
        <input type="file" name="product_image" id="product_image" class="demoInputBox">
    </div>

    <div>
        <label>Quantity</label>
        <span id="quantity-info" class="info"></span><br>
        <input type="text" name="quantity" id="quantity" class="demoInputBox">
    </div>

    <div style="margin-top:10px;">
        <input type="hidden" name="action" value="add">
        <button type="submit">Add Product</button>
        <button type="button" id="cancelAdd">Cancel</button>
    </div>
</form>

<?php require_once "footer.php"; ?>
