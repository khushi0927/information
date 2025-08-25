<?php
$color = "red"; 

switch (strtolower($color)) {
    case "red":
        echo "You selected RED color.";
        break;
    case "green":
        echo "You selected GREEN color.";
        break;
    case "blue":
        echo "You selected BLUE color.";
        break;
    default:
        echo "Invalid color! Please enter red, green, or blue.";
}
?>