<?php
class Student {

    public $name;
    public $age;
    public $grade;

    public function __construct($name, $age, $grade) {
        $this->name  = $name;
        $this->age   = $age;
        $this->grade = $grade;
    }

    public function displayDetails() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Grade: " . $this->grade . "<br><br>";
    }
}

$student1 = new Student("abc", 20, "A");
$student2 = new Student("xyz", 19, "B");

$student1->displayDetails();
$student2->displayDetails();
?>
