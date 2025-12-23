<?php 
require_once ("class/DBcontroller.php");
class user
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
     function adduser($name, $email, $number) {
        $query = "INSERT INTO tbl_user (name, email, number) VALUES (?, ?, ?)";
        return $this->db_handle->insert($query, "sss", [$name, $email, $number]);
    }

    //view
     function getAlluser() 
    {
            $sql = "SELECT * FROM tbl_user";
            $result = $this->db_handle->runBaseQuery($sql);
            return $result;
    }
    
    
    //delete
     function deleteuser($user_id) 
     {
        $query = "DELETE FROM tbl_user WHERE id = ?";
        $paramType = "i";
        $paramValue = array($user_id);
        $this->db_handle->update($query, "sss", [$name, $email, $number]);
    }

    
    //edit
       function getuserById($user_id) {
        $query = "SELECT * FROM tbl_user WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        
        $result = $this->db_handle->runQuery($query, "i", [$user_id]);
        return $result;
    }


    //update
    function edituser($name, $email, $number, $user_id) {
        $query = "UPDATE tbl_user SET name = ?,email = ?,number = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = array(
            $name,
            $email,
            $number,
            $user_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    

}
?>