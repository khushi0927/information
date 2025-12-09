<?php
class controller {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "mvc_task";
    private $conn;
    
    function __construct() {
        $this->conn = $this->connectDB();
    }   
    
    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if (!$conn) {
            die("DB Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }


    function bindQueryParams($sql, $param_type, $param_value_array) 
    {
        if (empty($param_type) || empty($param_value_array)) return;
        $param_value_reference = array();
        $param_value_reference[] = & $param_type;
        
        for($i=0; $i<count($param_value_array); $i++) 
        {
            $param_value_reference[] = & $param_value_array[$i];
        }

        call_user_func_array(array($sql, 'bind_param'), $param_value_reference);
    }
    
    function insert($query, $param_type = "", $param_value_array = array()) {
        $sql = $this->conn->prepare($query);
        if (!$sql) {
            die("Prepare failed: " . $this->conn->error);
        }
        if ($param_type !== "" && !empty($param_value_array)) {
            $this->bindQueryParams($sql, $param_type, $param_value_array);
        }
        $sql->execute();
        $insertId = $sql->insert_id;
        $sql->close();
        return $insertId;
    }

    function runBaseQuery($query) 
    {
        $resultset = array();
        $result = $this->conn->query($query);   
        if ($result && $result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }

    
    function update($query, $param_type = "", $param_value_array = array()) 
    {
        $sql = $this->conn->prepare($query);
        if (!$sql) {
            die("Prepare failed: " . $this->conn->error);
        }
        if ($param_type !== "" && !empty($param_value_array)) {
            $this->bindQueryParams($sql, $param_type, $param_value_array);
        }
        $res = $sql->execute();
        $sql->close();
        return $res;
    }

    function runQuery($query, $param_type = "", $param_value_array = array()) 
    {
        $resultset = array();
        $sql = $this->conn->prepare($query);
        if (!$sql) {
            die("Prepare failed: " . $this->conn->error);
        }
        if ($param_type !== "" && !empty($param_value_array)) {
            $this->bindQueryParams($sql, $param_type, $param_value_array);
        }
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        $sql->close();
        return $resultset;
    }
}
?>
