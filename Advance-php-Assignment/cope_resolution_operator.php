<?php
class Counter {

    public static $count = 0;

    public static function showCount() {
        echo self::$count;
    }
}


Counter::$count = 100;

Counter::showCount();
?>
