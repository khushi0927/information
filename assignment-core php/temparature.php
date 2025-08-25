<?php
$temperature = 37; 
$unit = "C";       

if ($unit == "C") {
    $converted = ($temperature * 9/5) + 32;
    echo "$temperature °C = $converted °F";
} elseif ($unit == "F") {
    $converted = ($temperature - 32) * 5/9;
    echo "$temperature °F = $converted °C";
} else {
    echo "Please enter C for Celsius or F for Fahrenheit.";
}
?>
