<?php

class Employee {
    public $name;
    public $baseSalary;

    public function __construct($name, $baseSalary) {
        $this->name = $name;
        $this->baseSalary = $baseSalary;
    }

   
    public function calculateSalary() {
        return $this->baseSalary;
    }
}


class Manager extends Employee {
    public $bonus;

    public function __construct($name, $baseSalary, $bonus) {
        parent::__construct($name, $baseSalary);
        $this->bonus = $bonus;
    }

   
    public function calculateSalary() {
        return $this->baseSalary + $this->bonus;
    }
}


class Developer extends Employee {
    public $incentive;

    public function __construct($name, $baseSalary, $incentive) {
        parent::__construct($name, $baseSalary);
        $this->incentive = $incentive;
    }

  
    public function calculateSalary() {
        return $this->baseSalary + $this->incentive;
    }
}


$employees = [
    new Manager("khushi", 10000, 5000),
    new Developer("avani", 30000, 20000)
];

foreach ($employees as $emp) {
    echo "Employee Name: " . $emp->name . "<br>";
    echo "Total Salary: " . $emp->calculateSalary() . "<br><br>";
}
?>
