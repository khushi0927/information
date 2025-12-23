<?php
trait A {
    public function showA() {
        echo "A<br>";
    }
}

trait B {
    public function showB() {
        echo "B";
    }
}

class Test {
    use A, B;
}

$obj = new Test();
$obj->showA();
$obj->showB();
?>
