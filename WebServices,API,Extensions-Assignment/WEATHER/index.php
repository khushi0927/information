<?php
include("weather.php");

$result = null;

if(isset($_GET['city'])){
    $city = $_GET['city'];
    $result = getWeather($city);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; text-align:center; }
        .card {
            background:#fff;
            padding:20px;
            margin:20px auto;
            width:300px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
            border-radius:8px;
        }
    </style>
</head>
<body>

<h2>Weather Information</h2>

<form method="GET">
    <input type="text" name="city" placeholder="Enter City Name" required>
    <button type="submit">Get Weather</button>
</form>

<?php if($result && $result['status']=="success"): ?>
    <div class="card">
        <h3><?php echo $result['city']; ?></h3>
        <p>🌡 Temperature: <?php echo $result['temperature']; ?> °C</p>
        <p>💧 Humidity: <?php echo $result['humidity']; ?> %</p>
        <p>☁ Weather: <?php echo $result['weather']; ?></p>
    </div>
<?php elseif($result): ?>
    <p style="color:red;"><?php echo $result['message']; ?></p>
<?php endif; ?>

</body>
</html>