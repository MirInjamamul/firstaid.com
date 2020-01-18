<?php

 session_start();
   // connect to the database
   $db = mysqli_connect('localhost', 'root', '', 'firstaid');

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
  </head>
  <body>
      <h1 align="center">Order</h1>

      <form action="" method="post">
        <table border="0">
          <tr>
            <td>Product Id : </td>
            <td><input type="text" name="product_id" placeholder="Product Id"></td>
          </tr>
          <tr>
            <td>Product Quantity :</td>
            <td><input type="number" name="quantity" min="1" max="25"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" value="Order"></td>
          </tr>
        </table>

      </form>

  </body>
</html>
