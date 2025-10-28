<?php

class bank 
{
    public function bank()
    {
        echo "banking";
    }
}

class current extends bank
{
     public function current()
    {
        echo "current";
    }
}

class save extends bank
{
     public function save()
    {
        echo "save";
    }
}

$c1 = new current();
$s1 = new save();

$c1->current();
echo "<br>";
$s1->save();
echo "<br>";
$c1->bank();

?>