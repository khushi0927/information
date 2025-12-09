
$(function(){

    function loadList(search = "") {
        $.ajax({
            url: "../controller/product_controller.php",
            method: "GET",
            data: { action: "list", search: search },
            success: function(html) {
                $("#productListArea").html(html);
            }
        });
    }

    loadList();

    $("#addForm").on("submit", function(e){
        e.preventDefault();
        var fd = new FormData(this);
        fd.append('action', 'add');

        $.ajax({
            url: "../controller/product_controller.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(resp) {
                if (resp.status === 'success') {
                    alert("Product added (id: " + resp.id + ")");
                    $("#addForm")[0].reset();
                    loadList();
                } else {
                    alert(resp.message || 'Error adding product');
                }
            }
        });
    });

    $("#btnSearch").on("click", function(){
        var q = $("#searchBox").val();
        loadList(q);
    });
    $("#btnRefresh").on("click", function(){ loadList(); });

    $(document).on("click", ".deleteBtn", function(){
        if (!confirm("Delete this product?")) return;
        var id = $(this).data("id");
        $.post("../controller/product_controller.php", { action: "delete", id: id }, function(resp){
            try { resp = (typeof resp === 'string') ? JSON.parse(resp) : resp; } catch(e){}
            if (resp.status === 'success') {
                loadList();
            } else {
                alert('Delete failed');
            }
        });
    });

    $(document).on("click", ".editBtn", function(){
        var id = $(this).data("id");
        $.getJSON("../controller/product_controller.php", { action: "get", id: id }, function(data){
            if (!data) { alert('Not found'); return; }
            $("#edit_id").val(data.id);
            $("#edit_product_name").val(data.product_name);
            $("#edit_product_price").val(data.product_price);
            $("#edit_quantity").val(data.quantity);
            if (data.product_image) {
                $("#current_image").attr("src", "../uploads/" + data.product_image).show();
                $("#old_image").val(data.product_image);
            } else {
                $("#current_image").hide();
                $("#old_image").val('');
            }
            
            $('html,body').animate({scrollTop: $("#editArea").offset().top}, 400);
        });
    });

    $("#editForm").on("submit", function(e){
        e.preventDefault();
        var fd = new FormData(this);
        fd.append('action','update');

        $.ajax({
            url: "../controller/product_controller.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(resp){
                if (resp.status === 'success') {
                    alert('Updated');
                    $("#editForm")[0].reset();
                    $("#current_image").hide();
                    loadList();
                } else {
                    alert('Update failed');
                }
            }
        });
    });

    $("#cancelAdd").on("click", function(){ $("#addForm")[0].reset(); });
    $("#cancelEdit").on("click", function(){ $("#editForm")[0].reset(); $("#current_image").hide(); });
});
