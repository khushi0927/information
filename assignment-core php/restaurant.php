<?php
$choice = 2; // You can change this value or get input from user

switch ($choice) {
    case 1:
        echo "Category: Starter<br>";
        echo "Dish: Tomato Soup";
        break;
    case 2:
        echo "Category: Main Course<br>";
        echo "Dish: Paneer Butter Masala with Naan";
        break;
    case 3:
        echo "Category: Dessert<br>";
        echo "Dish: Chocolate Brownie with Ice Cream";
        break;
    default:
        echo "Invalid choice! Please select 1, 2, or 3.";
}
?>