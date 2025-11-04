<?php
require_once ("classs/DBcontroller.php");
require_once ("classs/student.php");
$db_handle = new DBController();

$action = "";
if (! empty($_GET["action"])) 
    {
    $action = $_GET["action"];
}
switch ($action) {
   
    case "student-add":
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $roll_number = $_POST['roll_number'];
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $class = $_POST['class'];
            
            $student = new Student();
            $insertId = $student->addStudent($name, $roll_number, $dob, $class);
            
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/student-add.php";
        break;
    
    
    default:
        $student = new Student();
         require_once "web/student.php";
        break;
}
?>