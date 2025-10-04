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

    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="style/style.css"
    />

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
    <h4 align="center">Car Detail</h4>
  </div>
  <form  >  
    <div class="card-body text-success">
    <Label>Car Brand :</Label>
    <input type="text" name="brand-name" class="border-success" required>
  </div>

  <div class="card-body text-success">
    <Label>Car Model :</Label>
    <input type="text" name="brand-model" class="border-success " required>
  </div>

  <div class="card-body text-success ">
    <Label>Car Year :</Label>
    <input type="text" name="brand-year " class="border-success " required>
  </div>



  <div class="d-grid gap-2 col-6 mx-auto mb-2">
  <button class="btn btn-success" type="button">Submit</button>
 
</div>
</form>

<?php
  class car 
  {
    public $brand;
    public $model;
    public $year;

    public function display()
    {
      echo "<div class='result'>";
      echo "<p> <strong> Brand :</strong>".$this->brand." </p>";
      echo "<p> <strong> Model :</strong>".$this->model." </p>";
      echo "<p> <strong> Year :</strong>".$this->year." </p>";
      echo "</div>";
    }
  }

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $car = new car();
    $car->brand = $_POST['brand-name'];
    $car->model = $_POST['brand-model'];
    $car->year = $_POST['brand-year'];
    $car->display();
  }
?>

</div>
</body>
</html>