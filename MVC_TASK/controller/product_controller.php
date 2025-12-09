<?php

require_once __DIR__ . '/../model/product.php';
$model = new product();

function uploadImage($fileField) {
    if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $f = $_FILES[$fileField];
    $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
    $safe = uniqid('img_') . '.' . $ext;
    $target = __DIR__ . '/../public/uploads/' . $safe;
    if (move_uploaded_file($f['tmp_name'], $target)) {
        return $safe;
    }
    return null;
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($action === 'add') {
    $name = $_POST['product_name'] ?? '';
    $price = intval($_POST['product_price'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 0);
    $image = uploadImage('product_image'); 

    if ($name === '') {
        echo json_encode(['status'=>'error','message'=>'Product name required']);
        exit;
    }

    $id = $model->addproduct($name, $price, $image, $quantity);
    echo json_encode(['status'=>'success','id'=>$id]);
    exit;
}
if ($action === 'list') {

    $search = $_GET['search'] ?? '';
    $rows = $model->getAllproduct($search);
    require __DIR__ . '/../view/product_list.php'; 
}

if ($action === 'get') {
    $id = intval($_GET['id'] ?? 0);
    $row = $model->getproductById($id);
    if (!empty($row)) {
      
        echo json_encode($row[0]);
    } else {
        echo json_encode([]);
    }
    exit;
}

if ($action === 'update') {
    $id = intval($_POST['id'] ?? 0);
    $name = $_POST['product_name'] ?? '';
    $price = intval($_POST['product_price'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 0);

    $image = null;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        
        $old = $_POST['old_image'] ?? '';
        if ($old !== '') {
            @unlink(__DIR__ . '/../uploads/' . $old);
        }
        $image = uploadImage('product_image');
    } else {
     
    }

    $res = $model->editproduct($name, $price, $image, $quantity, $id);
    echo json_encode(['status'=>'success','affected'=>$res]);
    exit;
}

if ($action === 'delete') {
    $id = intval($_POST['id'] ?? 0);
    $res = $model->deleteproduct($id);
    echo json_encode(['status'=>'success','affected'=>$res]);
    exit;
}


echo json_encode(['status'=>'error','message'=>'No action']);
