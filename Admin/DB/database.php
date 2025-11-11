<?php

class database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "Admin";
    private $conn;
    
    // function __construct() {
    //     $this->database = $this->connectDB();
    // }   
    
    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
         if (!$conn) {
            die("Database Connection Failed: " . mysqli_connect_error());
        }
        return $conn;
    }


}
?>