<?php

interface Vehicle {
    public function start();
    public function stop();
}


class Car implements Vehicle {
    public function start() {
        echo "Car started<br>";
    }

    public function stop() {
        echo "Car stopped<br>";
    }
}


class Bike implements Vehicle {
    public function start() {
        echo "Bike started<br>";
    }

    public function stop() {
        echo "Bike stopped<br>";
    }
}

// Objects
$car = new Car();
$bike = new Bike();

$car->start();
$car->stop();

$bike->start();
$bike->stop();
?>
