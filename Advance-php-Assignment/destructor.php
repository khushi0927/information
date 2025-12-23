<?php
class file {

    public function __construct() {
        echo "Object created<br>";
    }

 
    public function __destruct() {
        echo "Clean up done. Object destroyed";
    }
}

$obj = new file();
?>