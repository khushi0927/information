<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Deatil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
<!-- 
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="style/style.css"
    /> -->

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>

    <script src="main.js"></script>
    <title>Car Form</title>
    <style>
        body{
    background-color:rgb(183, 233, 183);
    
}
.card{

    margin-top:50px;    
    margin-left:500px;
    background-color:lightyellow;
    padding:20px;
    border-radius:10px;
}

form{
    
    margin-top:20px;
    width: 260px;
}
form input{
    width: 300px;
    margin-top:5px;
    margin-bottom:10px;
}
form label{
    font-weight: bold;
}
form button{
    width: 200px;
    margin-top:10px;
    margin-bottom:5px;
    
}
form button:hover{
    background-color:green;
    color:white;
    font-weight: bold;
}
form input:hover{
    background-color:lightgreen;
    font-weight: bold;
}
.result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            background: #e9f7ef;
            border: 1px solid #c3e6cb;
        }
        .result h3 {
            margin-top: 0;
            color: #155724;
        }


    div input.border-success {
      border: 1px solid #198754;
      border-radius: 10px;       
      padding: 6px;
      resize: none;           
    }
     
  </style>
</head>
<body>
   <div class="card border-success  mb-3" style="max-width: 25rem;">
  <div class="card-header text-success">
    <h4 align="center">Calculate</h4>
  </div>
  <form method="post" >  
    <div class="card-body text-success">
    <Label>Add First No. :</Label>
    <input type="text" name="number1" class="border-success" required>
  </div>

  <div class="card-body text-success">
    <Label>Add Second No. :</Label>
    <input type="text" name="number2" class="border-success " required>
  </div>

  <div class="card-body text-success ">
    <Label>Select Operation :</Label>
   <select name="operation">
            <option >--Select Operation--</option>
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select><br><br>
  </div>



  <div class="d-grid gap-2 col-6 mx-auto mb-2">
  <button class="btn btn-success" type="submit">Submit</button>
 
</div>
</form>
<?php
class Calculator {
    public $number1;
    public $number2;
    public $op;
    public $result;

    
    public function __construct($a, $b, $operation) {
        $this->number1 = $a;
        $this->number2 = $b;
        $this->op   = $operation;

        switch($this->op) {
            case '+':
                $this->result = $this->number1 + $this->number2;
                break;

            case '-':
                $this->result = $this->number1 - $this->number2;
                break;

            case '*':
                $this->result = $this->number1 * $this->number2;
                break;

            case '/':
                if ($this->number2 != 0) {
                    $this->result = $this->number1 / $this->number2;
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
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $op = $_POST['operation'];

    $calc = new Calculator($number1, $number2, $op);
    $calc->showResult();
}
?>

</div>
</body>
</html>