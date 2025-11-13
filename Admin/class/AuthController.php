<?php 
require_once ("DB/database.php");
require_once ("class/User.php");

class AuthController {

    private $database;
    private $User;

        public function __construct() {
        $database = new Database();
        $this->database = $database->connectDB();
        $this->User = new User($this->database);
    }

    
     public function index() {
        require __DIR__ . '/../web/login.php';
    }

     public function signup() {
        require __DIR__ . '/../web/register.php';
    }

     public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Username = trim($_POST['Username']);
            $Email = trim($_POST['Email']);
            $Password = $_POST['Password'];
            


            $result = $this->User->register($Username, $Email, $Password);

            if ($result === true) {
                $_SESSION['success'] = "Registration successful! Please login.";
                header("Location: index.php?controller=auth&action=index");
            } else {
                $_SESSION['error'] = $result;
                header("Location: index.php?controller=auth&action=registerPage");
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Email=trim($_POST['Email']);
            $Password =$_POST['Password'];

            $User = $this->User->login($Email, $Password);

            if ($User) {
                $_SESSION['id'] = $User['id'];
                $_SESSION['Email'] = $User['Email'];
                $_SESSION['Password'] = $User['Password'];
                header("Location: index.php?controller=auth&action=dashboard");
            } else {
                $_SESSION['error'] = "Invalid Email or password!";
                header("Location: index.php?controller=auth&action=index");
            }
        }
    }

 public function dashboard() {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?controller=auth&action=index");
            exit;
        }
        require __DIR__ . '/../views/dashboard.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?controller=auth&action=index");
    }

}

?>