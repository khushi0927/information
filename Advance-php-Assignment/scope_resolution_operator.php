<?php
class Counter {

    public static $count = 0; 

    public function __construct() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}

$obj1 = new Counter();
$obj2 = new Counter();
$obj3 = new Counter();

echo "Number of instances created: " . Counter::$count . "<br>";
echo "Number of instances (via method): " . Counter::getCount();
?>
