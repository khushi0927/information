<?php
session_start(); 

class LoginSystem {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function login($nameOrEmail, $password, $rememberMe = false) {
        try {
            $query = "SELECT * FROM users WHERE name = :ue OR email = :ue";
            $stmt = $this->db->execute($query, ['ue' => $nameOrEmail]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];

             
                if ($rememberMe) {
                    setcookie("rememberme", $user['id'], time() + (30*24*60*60), "/");
                }

                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Login Error: " . $e->getMessage();
        }
    }

    public function checkRememberMe() {
        if (!isset($_SESSION['user_id']) && isset($_COOKIE['rememberme'])) {
            $userId = $_COOKIE['rememberme'];
            $query = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->db->execute($query, ['id' => $userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        setcookie("rememberme", "", time() - 3600, "/"); // Delete cookie
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}
?>
