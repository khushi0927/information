<?php
class Person {

    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name];
    }
}

$p = new Person();

$p->name = "Khushi";
$p->age = 20;

echo $p->name . "<br>";
echo $p->age;
?>
