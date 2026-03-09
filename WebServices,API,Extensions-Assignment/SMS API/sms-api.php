<?php

$account_sid="";
$auth_token="";
$twilio_number="+";
$to="";

$data= http_build_query([
    "From"=>$twilio_number,
    "To"=>$to,
    "Body"=>"Hello! this is a test message."
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