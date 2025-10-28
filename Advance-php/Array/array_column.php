<?php

$arr=array(

    array(
        "id"=>100,
        "name"=>"khushi",
        "age"=>19,
    ),

    array(
        "id"=>101,
        "name"=>"shreya",
        "age"=>18,
    ),

    array(
        "id"=>102,
        "name"=>"priya",
        "age"=>20,
    ),
);

print_r(array_column($arr,"name"));

?>