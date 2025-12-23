<?php
final class Animal {
    public function sound() {
        echo "Animal makes a sound";
    }
}

class Dog extends Animal {
    public function bark() {
        echo "Dog barks";
    }
}
?>  