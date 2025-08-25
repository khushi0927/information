<?php
$operation = "^"; 
$num1 = 5;
$num2 = 2; 

switch ($operation) {
    case "+":
        $result = $num1 + $num2;
        echo "$num1 + $num2 = $result";
        break;

    case "-":
        $result = $num1 - $num2;
        echo "$num1 - $num2 = $result";
        break;

    case "*":
        $result = $num1 * $num2;
        echo "$num1 * $num2 = $result";
        break;

    case "/":
        if ($num2 != 0) {
            $result = $num1 / $num2;
            echo "$num1 / $num2 = $result";
        } else {
            echo "Division by zero is not allowed.";
        }
        break;

    case "%":
        $result = $num1 % $num2;
        echo "$num1 % $num2 = $result";
        break;

    case "^":
        $result = pow($num1, $num2);
        echo "$num1 ^ $num2 = $result";
        break;

    case "√":
        $result = sqrt($num1);
        echo "√$num1 = $result";
        break;

    default:
        echo "Invalid operation!";
}
?>
