<?php

trait Logger {
    public function log($message) {
        echo "Log: $message<br>";
    }
}

trait Notifier {
    public function notify($message) {
        echo "Notification: $message<br>";
    }
}

class User {
    use Logger, Notifier;

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function performAction($action) {
        $this->log("$this->name performed $action");
        $this->notify("$this->name, you have a new notification about $action");
    }
}

$user = new User("a");
$user->performAction("login");
?>
