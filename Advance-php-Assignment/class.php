<?php
class Car {

    public $make;
    public $model;
    public $year;

    public function displayDetails() {
        echo "Make: " . $this->make . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year;
    }
}


$car = new Car();
$car->make = "Toyota";
$car->model = "Fortuner";
$car->year = 2022;


$car->displayDetails();
?>
