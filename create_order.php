<?php
require('razorpay/Razorpay.php');
use Razorpay\Api\Api;

$keyId = "rzp_test_37q3TkJwHdemr5";
$keySecret = "Yvz9aIhZwuiVVn883tqXPJdn";

$api = new Api($keyId, $keySecret);

// Create Razorpay Order
$order = $api->order->create([
    'receipt' => 'order_rcptid_11',
    'amount' => 20000, // in paise = ₹200
    'currency' => 'INR'
]);

echo json_encode($order);
?>
