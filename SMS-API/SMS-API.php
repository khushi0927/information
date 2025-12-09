<?php

$account_sid="ACf9a3ec839881c9a575bcc756a3c8e53e";
$auth_token="c7eae1390d549f784dc5e6249da0bd95";
$twilio_number="+19363123376";
$to="+916352606973";

$data= http_build_query([
    "From"=>$twilio_number,
    "To"=>$to,
    "Body"=>"Hello! Babu labbu."
]);

$url = "https://api.twilio.com/2010-04-01/Accounts/$account_sid/Messages.json";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$account_sid:$auth_token");

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "Error: $error";
} else {
    echo "SMS Sent Successfully!<br>";
    echo "<pre>$response</pre>";
}

?>