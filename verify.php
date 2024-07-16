<?php

include("db.php"); 
include("auth.php");

require('config.php');

//session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


$success = true;

$error = "Payment Failed";


if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    $conn = mysqli_connect('localhost', 'root', '','payroll');
        if (!$conn)
        {
           die("Database Connection Failed" . mysql_error());
        }

        /*$query=mysqli_query($conn,"select * from employee ORDER BY emp_id asc")or die(mysql_error());
        while($row=mysqli_fetch_array($query))
        {
            $id     =$row['emp_id'];
        }*/
      
        //$query = "SELECT * from employee where fname='".$uname."'";

        $uname = $_SESSION['uname'];
        $query = "SELECT * from employee where fname='".$uname."'";
        $result = mysqli_query($connection,$query) or die ( mysql_error());

        while ($row = mysqli_fetch_array($result))
        {
            $id = $row['emp_id'];

            $sql = mysqli_query($conn,"UPDATE employee SET deduction='PAID' WHERE emp_id=$id");
        }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;

        
