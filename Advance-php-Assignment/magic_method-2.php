<?php
class DynamicProperties {

    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return isset($this->data[$name]) ? $this->data[$name] : "Property '$name' not set";
    }
}

$user = new DynamicProperties();

$user->name = "Khushi";
$user->age  = 21;

echo "Name: " . $user->name . "<br>";
echo "Age: " . $user->age . "<br>";

echo "Email: " . $user->email;
?>
