<?php
public function __construct() {
$db = new Database();
$this->conn = $db->getConnection();
}


// Create
public function add($name, $price, $imageName, $quantity) {
$stmt = $this->conn->prepare("INSERT INTO tbl_product (product_name, product_price, product_image, quantity) VALUES (?, ?, ?, ?)");
$stmt->bind_param('sisi', $name, $price, $imageName, $quantity);
$stmt->execute();
$id = $stmt->insert_id;
$stmt->close();
return $id;
}


// Read (list + optional search)
public function all($search = '') {
if ($search !== '') {
$like = '%' . $search . '%';
$stmt = $this->conn->prepare("SELECT * FROM tbl_product WHERE product_name LIKE ? ORDER BY id DESC");
$stmt->bind_param('s', $like);
} else {
$stmt = $this->conn->prepare("SELECT * FROM tbl_product ORDER BY id DESC");
}
$stmt->execute();
$res = $stmt->get_result();
$rows = $res->fetch_all(MYSQLI_ASSOC);
$stmt->close();
return $rows;
}


public function getById($id) {
$stmt = $this->conn->prepare("SELECT * FROM tbl_product WHERE id = ? LIMIT 1");
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$stmt->close();
return $row;
}


// Update
public function update($id, $name, $price, $imageName, $quantity) {
if ($imageName === null) {
$stmt = $this->conn->prepare("UPDATE tbl_product SET product_name = ?, product_price = ?, quantity = ? WHERE id = ?");
$stmt->bind_param('siii', $name, $price, $quantity, $id);
} else {
$stmt = $this->conn->prepare("UPDATE tbl_product SET product_name = ?, product_price = ?, product_image = ?, quantity = ? WHERE id = ?");
$stmt->bind_param('sisii', $name, $price, $imageName, $quantity, $id);
}
$stmt->execute();
$affected = $stmt->affected_rows;
$stmt->close();
return $affected;
}


// Delete
public function delete($id) {
// fetch image name to remove file
$row = $this->getById($id);
if ($row && !empty($row['product_image'])) {
@unlink(__DIR__ . '/../uploads/' . $row['product_image']);
}
$stmt = $this->conn->prepare("DELETE FROM tbl_product WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$affected = $stmt->affected_rows;
$stmt->close();
return $affected;
}
}