<?php
$number = -495; 

if ($number > 0) {
    echo "The number $number is Positive.<br>";
    
    
    if ($number % 2 == 0) {
        echo "$number is an Even number.";
    } else {
        echo "$number is an Odd number.";
    }

} elseif ($number < 0) {
    echo "The number $number is Negative.<br>";
    

    if ($number % 2 == 0) {
        echo "$number is an Even number.";
    } else {
        echo "$number is an Odd number.";
    }

} else {
    echo "The number is Zero.<br>";
    echo "Zero is considered an Even number.";
}
?>