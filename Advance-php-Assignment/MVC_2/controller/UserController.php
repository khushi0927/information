<?php
include "model/User.php";

class UserController {
    private $user;

    public function __construct($conn) {
        $this->user = new User($conn);
    }

    public function handleRequest() {

        if (isset($_POST["add"])) {
            $this->user->insertUser($_POST["name"]);
        }

        if (isset($_POST["update"])) {
            $this->user->updateUser($_POST["id"], $_POST["name"]);
        }

        if (isset($_GET["delete"])) {
            $this->user->deleteUser($_GET["delete"]);
        }

        return $this->user->getUsers();
    }
}
?>
