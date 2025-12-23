<?php
class Car {

    public $make;
    public $model;
    public $year;

    public function displayDetails() {
        echo "Make: " . $this->make . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br><br>";
    }
}

$car1 = new Car();
$car1->make = "Toyota";
$car1->model = "Fortuner";
$car1->year = 2022;

$car2 = new Car();
$car2->make = "Honda";
$car2->model = "City";
$car2->year = 2021;

$car1->displayDetails();
$car2->displayDetails();
?>
