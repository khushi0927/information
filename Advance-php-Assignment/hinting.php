<?php
class Calculator {

    public function add(int $a, int $b) {
        echo $a + $b;
    }
}

$obj = new Calculator();


$obj->add(10, 20);
?>
