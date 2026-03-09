<?php

function getWeather($city) {

    $apiKey = "05af3fecbaeb6a7b50420af2de3bbad3"; // apni key yaha dalein
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if(curl_errno($ch)){
        return ["status"=>"error","message"=>"API Request Failed"];
    }

    curl_close($ch);

    $data = json_decode($response, true);

    if($data['cod'] != 200){
        return ["status"=>"error","message"=>"City not found"];
    }

    return [
        "status" => "success",
        "city" => $data['name'],
        "temperature" => $data['main']['temp'],
        "humidity" => $data['main']['humidity'],
        "weather" => $data['weather'][0]['description']
    ];
}
?>