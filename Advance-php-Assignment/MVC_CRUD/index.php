<?php
require_once ("class/DBcontroller.php");
require_once ("class/user.php");
$db_handle = new DBController();

$action = "";
if (! empty($_GET["action"])) 
    {
    $action = $_GET["action"];
}
switch ($action) {
   
    case "user-add":
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['number'];
  
            
            $user = new user();
            $insertId = $user->adduser($name, $email, $number);
            
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/user-add.php";
        break;

          case "user-edit":
    
        $user_id = $_GET["id"];
        $user = new user();
          if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['number'];

            $user->edituser($name, $email, $number, $user_id);
            
            header("Location: index.php");
        }
          
        $result = $user->getuserById($user_id);
        require_once "web/user-edit.php";

    break;

         case "user-delete":
            $user_id = $_GET["id"];
            $user = new user();
            $user->deleteuser($user_id);
            $result = $user->getAlluser();
            require_once "web/user.php";
        break;
    
    
    default:
        $user = new user();
        $result = $user->getAlluser();
         require_once "web/user.php";
        break;
}
?>