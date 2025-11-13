<?php

require_once __DIR__ . '/../../DB/database.php';
require_once __DIR__ . '/../model/user.php';

class AuthController {
    private $database;
    private $user;

     public function __construct() {
        $database = new Database();
        $this->database = $database->connectDB();
        $this->user = new User($this->database);
    }

    public function index() {
        require __DIR__ . '/../view/login.php';
    }

    public function registerform() {
        require __DIR__ . '/../view/register.php';
    }
    
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $city = $_POST['city'];

            // if ($password !== $confirm) {
            //     $_SESSION['error'] = "Passwords do not match!";
            //     header("Location: index.php?controller=auth&action=register");
            //     exit;
            // }

            error_log("[AuthController] Register called for email: $email");
            $result = $this->user->register($first_name,$last_name, $email, $password, $gender, $city);
            error_log("[AuthController] Register result: " . var_export($result, true));

            if ($result === true) {
                $_SESSION['success'] = "Registration successful! Please login.";
                error_log("[AuthController] Registration success, redirecting to login/index");
                header("Location: index.php?controller=auth&action=index");
                exit;
            } else {
                $_SESSION['error'] = $result;
                // Redirect to the form renderer (registerform) instead of POST handler (register)
                error_log("[AuthController] Registration failed: " . var_export($result, true));
                header("Location: index.php?controller=auth&action=registerform");
                exit;
            }
        }
    }

     public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = $this->user->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: index.php?controller=auth&action=dashboard");
            } else {
                $_SESSION['error'] = "Invalid email or password!";
                header("Location: index.php?controller=auth&action=index");
            }
        }
    }

    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=index");
            exit;
        }
        require __DIR__ . '/../view/dashboard.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?controller=auth&action=index");
    }
}
?>