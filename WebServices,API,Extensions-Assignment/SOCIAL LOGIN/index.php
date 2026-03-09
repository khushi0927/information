<?php
require 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId("YOUR_CLIENT_ID");
$client->setClientSecret("YOUR_CLIENT_SECRET");
$client->setRedirectUri("http://localhost/social-login/callback.php");
$client->addScope("email");
$client->addScope("profile");

$login_url = $client->createAuthUrl();
?>

<a href="<?= $login_url ?>">
    <button>Login with Google</button>
</a>