<?php

    class employee
{
    public $email;
    public $password;

    public function displayinfo($email,$password)
    {
        echo $email." ".$password."<br>";
    }    
}

$emp1=new employee();
$emp1->displayinfo("khushi@gmail.com","khushi123");

$emp2=new employee();
$emp2->displayinfo("kanchi@gmail.com","kanchi123");


$emp1=new employee();
$emp1->displayinfo("avni@gmail.com","avni123")
?>