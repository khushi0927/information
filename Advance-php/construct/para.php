<?php

class employee
{
    public $name;
    public $age;

    public function __construct( $name,$age)
    {
      
        echo "my name is ". $name;
        echo "<br>";    
        echo "my age is ". $age;  
    }
}
$e1=new employee("shreya",22);
?>