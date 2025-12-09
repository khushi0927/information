<?php

class database{

   private  $host="localhost";
   private $user="root";
   private  $pass="";
   private  $db="student";
   public $conn;

    public function connect()
    {
         $this->conn = null;

         try
         {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db,
                                 $this->user, $this->pass);
             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
         catch (PDOException $e)
         {
            echo "Connection Error: " . $e->getMessage();
         }
        
        

        return $this->conn;    
    }

}

?>
