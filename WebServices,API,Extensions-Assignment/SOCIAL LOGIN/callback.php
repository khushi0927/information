<?php
require 'vendor/autoload.php';
session_start();

$conn = new mysqli("localhost","root","","social_auth");

$client = new Google_Client();
$client->setClientId("YOUR_CLIENT_ID");
$client->setClientSecret("YOUR_CLIENT_SECRET");
$client->setRedirectUri("http://localhost/social-login/callback.php");

if(isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $user_info = $google_oauth->userinfo->get();

    $google_id = $user_info->id;
    $name = $user_info->name;
    $email = $user_info->email;

    // Insert if not exists
    $check = $conn->prepare("SELECT * FROM users WHERE google_id=?");
    $check->bind_param("s",$google_id);
    $check->execute();
    $result = $check->get_result();

    if($result->num_rows == 0){
        $stmt = $conn->prepare("INSERT INTO users (google_id,name,email) VALUES (?,?,?)");
        $stmt->bind_param("sss",$google_id,$name,$email);
        $stmt->execute();
    }

    $_SESSION['user'] = $name;

    header("Location: dashboard.php");
}