<?php

if(isset($_POST['submit'])){

    $to=$_POST['mail'];
    $subject="Bill past due";
    $message="You have pending bill to be paid!";
    $headers="From: karthickvenkatesh28@gmail.com";

    if(mail($to,$subject,$message,$headers)){
        echo "<h2>Notice sent successfully</h2>";
    }
    else{
        echo "Something went wrong";
    }
}
?>
