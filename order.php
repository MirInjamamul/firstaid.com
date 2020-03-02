<?php

 session_start();
   // connect to the database
   $db = mysqli_connect('localhost', 'root', '', 'firstaid');
   $getProductId = 0;
   $total_price = 0;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $product_id = mysqli_real_escape_string($db,$_POST['product_id']);
      $quantity = mysqli_real_escape_string($db,$_POST['quantity']);

      $sql = "SELECT * FROM product_list WHERE product_id = '$product_id'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $price = $row['price'];

      $total_price = $price * $quantity ;

      $_SESSION['product_name'] = $row['product_name'];
      $_SESSION['price'] = $row['price'];
      $_SESSION['total_price'] = $total_price;
      $_SESSION['quantity'] = $quantity;
      $username = $_SESSION['username'];
      $flag = 0;
      $bkash = "null";
      $query1 = "INSERT INTO product_order (product_id,user_name,total,bkash,flag)
    			  VALUES('$product_id','$username','$total_price','$bkash','$flag')";
    	mysqli_query($db, $query1);
       header("location: receipt.php");


   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
     <title></title>
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

     <!-- MODAL Link Start -->
     <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

	<!-- Css -->
	<link rel="stylesheet" href="modal/css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="modal/css/owl.carousel.css">
	<link rel="stylesheet" href="modal/css/owl.theme.css">
	<link rel="stylesheet" href="modal/css/bootstrap.min.css">
	<link rel="stylesheet" href="modal/css/font-awesome.min.css">
	<link rel="stylesheet" href="modal/css/style.css">
	<link rel="stylesheet" href="modal/css/responsive.css">

	<!-- jS -->
	<script src="modal/js/jquery.min.js" type="text/javascript"></script>
	<script src="modal/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="modal/js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="modal/js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="modal/js/jquery.nicescroll.js"></script>
	<script src="jmodal/s/jquery.scrollUp.min.js"></script>
	<script src="modal/js/main.js" type="text/javascript"></script>
  </head>
  <body>
  <div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>FIRST AID</strong>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    
                    <p>
                        <em>Order : </em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Order</h1>
                </div>
                </span>
                <form action="" method="post">
                <table class="table table-hover">
                    <thead>
                    <tr>
            <td>Product Id : </td>
            <td><input type="text" name="product_id"></td>
          </tr>
                    </thead>
                    <tbody>
                    <tr>
            <td>Product Quantity :</td>
            <td><input type="number" name="quantity" min="1" max="25"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" value="Order"></td>
          </tr>
                    </tbody>
                  </table>
                </form>

  </body>
     

	
     

</html>
