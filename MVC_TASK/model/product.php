<?php
require_once __DIR__ . '/../controller/controller.php';

class product
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new controller();
    }
    
    function addproduct($product_name, $product_price, $product_image, $quantity) {
    $query = "INSERT INTO tbl_product (product_name, product_price, product_image, quantity) VALUES (?, ?, ?, ?)";
    $paramType = "sisi"; 
    $paramValue = array($product_name, $product_price, $product_image, $quantity);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}
    function getAllproduct($search = "") 
    {
        if ($search !== "") {
            $search_term = "%{$search}%";
            $sql = "SELECT * FROM tbl_product WHERE product_name LIKE ? ORDER BY id DESC";
            $result = $this->db_handle->runQuery($sql, "s", array($search_term));
        } else {
            $sql = "SELECT * FROM tbl_product ORDER BY id DESC";
            $result = $this->db_handle->runBaseQuery($sql);
        }
        return $result;
    }
    

    function deleteproduct($id) 
    {
    
        $row = $this->getproductById($id);
        if (!empty($row) && !empty($row[0]['product_image'])) {
            @unlink(__DIR__ . '/../uploads/' . $row[0]['product_image']);
        }

        $query = "DELETE FROM tbl_product WHERE id = ?";
        $paramType = "i";
        $paramValue = array($id);
        return $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getproductById($id) {
        $query = "SELECT * FROM tbl_product WHERE id = ?";
        $paramType = "i";
        $paramValue = array($id);
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }


    function editproduct($product_name, $product_price, $product_image, $quantity, $id) {
        if ($product_image === null) {
          
            $query = "UPDATE tbl_product SET product_name = ?, product_price = ?, quantity = ? WHERE id = ?";
            $paramType = "siii";
            $paramValue = array(
                $product_name,
                $product_price,
                $quantity,
                $id
            );
        } else {
            $query = "UPDATE tbl_product SET product_name = ?, product_price = ?, product_image = ?, quantity = ? WHERE id = ?";
            $paramType = "sisii";
            $paramValue = array(
                $product_name,
                $product_price,
                $product_image,
                $quantity,
                $id
            );
        }
        
        return $this->db_handle->update($query, $paramType, $paramValue);
    }
}
?>
