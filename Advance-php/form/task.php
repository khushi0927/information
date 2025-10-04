
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
    <h2>Simple Calculator (Using Constructor + Switch)</h2>
    <form method="post">
        <label>Enter First Number:</label>
        <input type="number" name="num1" required><br><br>

        <label>Enter Second Number:</label>
        <input type="number" name="num2" required><br><br>

        <label>Select Operation:</label>
        <select name="operation">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select><br><br>

        <button type="submit" >Calculate</button>
    </form>
    <?php
class Calculator {
    public $num1;
    public $num2;
    public $op;
    public $result;

    // Parameterized Constructor
    public function __construct($a, $b, $operation) {
        $this->num1 = $a;
        $this->num2 = $b;
        $this->op   = $operation;

        switch($this->op) {
            case '+':
                $this->result = $this->num1 + $this->num2;
                break;

            case '-':
                $this->result = $this->num1 - $this->num2;
                break;

            case '*':
                $this->result = $this->num1 * $this->num2;
                break;

            case '/':
                if ($this->num2 != 0) {
                    $this->result = $this->num1 / $this->num2;
                } else {
                    $this->result = "Division by zero not allowed!";
                }
                break;

            default:
                $this->result = "Invalid operation!";
        }
    }

    public function showResult() {
        echo "<h3>Result = " . $this->result . "</h3>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];
    $op = $_POST['operation'];

    $calc = new Calculator($n1, $n2, $op);
    $calc->showResult();
}
?>

</body>
</html>
