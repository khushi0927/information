<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey("sk_test_51T7HHzFMFQssZ6WhO6SbLhlSYg2MNsayCK5cyQneZIpgwLrkZl2w6n1BiZLWD0sj0VsajBh1J3HP6kMVbcmc8uv700Rl0iKDwN");

header('Content-Type: application/json');

$YOUR_DOMAIN = "http://localhost/PAYMENT";

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'inr',
      'product_data' => [
        'name' => 'Test Product',
      ],
      'unit_amount' => 50000, // 500 INR (Stripe uses paisa)
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
]);

header("Location: " . $checkout_session->url);
exit();