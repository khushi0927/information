<?php

class Vehicle {

    public $brand;

    public function start() {
        echo "Vehicle is starting<br>";
    }
}


class Car extends Vehicle {

    public $model;

    public function showDetails() {
        echo "Brand: " . $this->brand . "<br>";
        echo "Model: " . $this->model . "<br>";
    }
}

$car = new Car();
$car->brand = "Toyota";
$car->model = "Fortuner";

$car->start();

$car->showDetails();
?>
