<?php

include("db.php"); 
include("auth.php");

require('config.php');
require('razorpay-php/Razorpay.php');
//session_start();

// Create the Razorpay Order

$conn = mysqli_connect('localhost', 'root', '','payroll');
    if (!$conn)
    {
        die("Database Connection Failed" . mysql_error());  
    }

    $query=mysqli_query($conn,"select * from employee ORDER BY emp_id asc")or die(mysql_error());
    while($row=mysqli_fetch_array($query))
    {
        $id     =$row['emp_id'];
        $deduction   =$row['deduction'];
    }
    $query = "SELECT * from employee where emp_id='".$id."'";
    $result = mysqli_query($connection,$query) or die ( mysql_error());

    while ($row = mysqli_fetch_assoc($result))
        {
            $deduction  = $row['deduction'];

            if($deduction == 'PAID')
            {
                 //session_abort();
            }
        }

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);


$conn = mysqli_connect('localhost', 'root', '','payroll');
    if (!$conn)
    {
        die("Database Connection Failed" . mysql_error());  
    }

    /*$query=mysqli_query($conn,"select * from employee ORDER BY emp_id asc")or die(mysql_error());
    while($row=mysqli_fetch_array($query))
    {
        $id     =$row['emp_id'];
        $deduction   =$row['deduction'];
        $overtime   =$row['overtime'];
        $bonus   =$row['bonus'];
    }*/

    $uname = $_SESSION['uname'];

    $query = "SELECT * from employee where fname='".$uname."'";
    $result = mysqli_query($connection,$query) or die ( mysql_error());


    while ($row = mysqli_fetch_array($result))
        {
            $id     =$row['emp_id'];
            $overtime     = $row['overtime'];
            $bonus     = $row['bonus'];
            $deduction  = $row['deduction'];
            $vehicle = $row['gender'];
            //$income   = $overtime + $bonus + $salary;
            $parkingfee = 0;
            if($vehicle=='Yes')
            {
              $parkingfee=1000;
            }

            $netpay   = $overtime + $bonus + $parkingfee;
        

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $netpay * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Apartment Management",
    "description"       => "Test_payment",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => "Test",
    "email"             => "customer@merchant.com",
    "contact"           => "9999999999",
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
        }
