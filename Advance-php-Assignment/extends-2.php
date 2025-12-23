<?php

class Employee {

    public $name;
    public $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }
}


class FullTimeEmployee extends Employee {

    public function calculateBonus() {
        return $this->salary * 0.20; 
    }
}


class PartTimeEmployee extends Employee {

    public function calculateBonus() {
        return $this->salary * 0.10; 
    }
}


$emp1 = new FullTimeEmployee("a", 50000);
$emp2 = new PartTimeEmployee("b", 30000);

echo $emp1->name . " Bonus: " . $emp1->calculateBonus() . "<br>";
echo $emp2->name . " Bonus: " . $emp2->calculateBonus();
?>
