<?php
$apiKey = "AIzaSyA06QvMNhXMpib3hLyMi8ABnUkW8iW-E8s";
$latitude = "rajkot";
$longitude = "junagadh";
$address = "motibag,junagadh";

if(isset($_GET['address'])) {

    $address = urlencode($_GET['address']);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$apiKey}";
    
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if($data['status'] == "OK") {
        $latitude = $data['results'][0]['geometry']['location']['lat'];
        $longitude = $data['results'][0]['geometry']['location']['lng'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Geocoding App</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiKey; ?>"></script>
    <style>
        body { font-family: Arial; text-align:center; }
        #map { height: 400px; width: 80%; margin:20px auto; }
    </style>
</head>
<body>

<h2>Location Finder</h2>

<form method="GET">
    <input type="text" name="address" placeholder="Enter Address" required>
    <button type="submit">Find Location</button>
</form>

<?php if($latitude && $longitude): ?>

<p><strong>Latitude:</strong> <?php echo $latitude; ?></p>
<p><strong>Longitude:</strong> <?php echo $longitude; ?></p>

<div id="map"></div>

<script>
function initMap() {
    var location = { lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?> };

    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: location
    });

    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
}

initMap();
</script>

<?php endif; ?>

</body>
</html>