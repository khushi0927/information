<?php

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->userModel = new User($this->db);
    }

    public function index() {
        require __DIR__ . '/../views/login.php';
    }

    public function registerPage() {
        require __DIR__ . '/../views/register.php';
    }

    public function register() {

        echo "enterd";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['first_name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];

            if ($password !== $confirm) {
                $_SESSION['error'] = "Passwords do not match!";
                header("Location: index.php?controller=auth&action=registerPage");
                exit;
            }

            $result = $this->userModel->register($name, $email, $password);

            if ($result === true) {
                $_SESSION['success'] = "Registration successful! Please login.";
                header("Location: index.php?controller=auth&action=index");
            } else {
                $_SESSION['error'] = $result;
                header("Location: index.php?controller=auth&action=registerPage");
            }
        }
    }

}