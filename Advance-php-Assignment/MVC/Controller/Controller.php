<?php

include_once("Model/User.php");

class Controller {

    public function showUser() {
        $user = new User();
        $name = $user->getUserName();

        include("view/user.php");
    }
}
?>