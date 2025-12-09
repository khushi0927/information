<?php

header("content-type:application/json");
include_once("config.php");

$method = $_SERVER['REQUEST_METHOD'];

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) 
 {
    case "GET":
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);
            echo json_encode($result->fetch_assoc());
        }
        else
        {
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            $rows = [];
            while ($row = $result->fetch_assoc()) 
            {
                $rows[] = $row;
            }
            echo json_encode($rows);
        }
    break;

      case "POST":
        $name     = $data["name"];
        $company    = $data["company"];
        $price = $data["price"];

        $sql = "INSERT INTO products (name, company, price)
                VALUES ('$name', '$company', '$price')";

        if ($conn->query($sql)) {
            echo json_encode(["message" => "product created successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
        break;

   case "PUT":
     if (!isset($_GET['id'])) {
        echo json_encode(["error" => "product ID required"]);
        exit;
    }

    $id = $_GET['id'];

    $name = $data["name"];
    $company = $data["company"];
    $price = $data["price"];

    $sql = "UPDATE products SET 
            name='$name', 
            company='$company', 
            price='$price' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "product updated"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }

break;


    case "DELETE":
         if (!isset($_GET['id'])) {
            echo json_encode(["error" => "product ID required"]);
            exit;
        }

        $id = $_GET['id'];

        $sql = "DELETE FROM products WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode(["message" => "product deleted"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    break;
     default:
        echo json_encode(["message" => "Invalid Request"]);
        break;

}
?>
