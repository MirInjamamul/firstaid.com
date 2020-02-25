<?php
session_start();
  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'firstaid');

  $review = 1;
  $zero = 0;
  $mobile = 2;
  if($_SERVER["REQUEST_METHOD"] == "POST") {
     // username and password sent from form

     $bkash = mysqli_real_escape_string($db,$_POST['bkash']);
     $username = $_SESSION['username'];

     $sql1 = "update product_order SET bkash = '$bkash' where user_name = '$username' and flag= '$zero'";
     mysqli_query($db,$sql1);

     $sql2 = "update product_order SET flag = '$mobile' where user_name = '$username' and flag= '$zero'";
     mysqli_query($db,$sql2);

     header("location: receipt.php");

  }
 ?>