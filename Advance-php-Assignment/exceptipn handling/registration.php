<?php
class Registration {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function registerUser($name, $email, $password) {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->execute($query, ['email' => $email]);
            if ($stmt->rowCount() > 0) {
                throw new Exception("Email already registered!");
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $this->db->execute($query, [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);

            echo "User registered successfully!";
        } catch (Exception $e) {
            echo "Registration Error: " . $e->getMessage();
        }
    }
}
?>
