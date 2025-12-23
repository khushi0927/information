<?php
class Calculator {

    public function calculate($a, $b, $operation = "add") {

        if ($operation == "add") {
            return $a + $b;
        }
        elseif ($operation == "subtract") {
            return $a - $b;
        }
        elseif ($operation == "multiply") {
            return $a * $b;
        }
        else {
            return "Invalid operation";
        }
    }
}


$calc = new Calculator();

echo "Add: " . $calc->calculate(10, 5) . "<br>";
echo "Subtract: " . $calc->calculate(10, 5, "subtract") . "<br>";
echo "Multiply: " . $calc->calculate(10, 5, "multiply");
?>
