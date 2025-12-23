<?php

interface PaymentInterface {
    public function processPayment($amount);
    public function refund($amount);
}

class CreditCardPayment implements PaymentInterface {

    public function processPayment($amount) {
        return "Credit Card payment of ₹$amount processed";
    }

    public function refund($amount) {
        return "Credit Card refund of ₹$amount successful";
    }
}

class PaypalPayment implements PaymentInterface {

    public function processPayment($amount) {
        return "PayPal payment of ₹$amount processed";
    }

    public function refund($amount) {
        return "PayPal refund of ₹$amount successful";
    }
}


$credit = new CreditCardPayment();
$paypal = new PaypalPayment();

echo $credit->processPayment(1000) . "<br>";
echo $credit->refund(500) . "<br><br>";

echo $paypal->processPayment(2000) . "<br>";
echo $paypal->refund(1000);
?>
