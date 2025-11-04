<?php 
require_once ("classs/DBcontroller.php");
class Student
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addStudent($name, $roll_number, $dob, $class) {
        $query = "INSERT INTO tbl_student (name,roll_number,dob,class) VALUES (?, ?, ?, ?)";
        $paramType = "siss";
        $paramValue = array(
            $name,
            $roll_number,
            $dob,
            $class
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
}
?>