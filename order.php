<?php

 session_start();
   // connect to the database
   $db = mysqli_connect('localhost', 'root', '', 'firstaid');

   $total_price = 0;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $product_id = mysqli_real_escape_string($db,$_POST['product_id']);
      $quantity = mysqli_real_escape_string($db,$_POST['quantity']);

      $sql = "SELECT price FROM product_list WHERE product_id = '$product_id'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $price = $row['price'];

      $total_price = $price * $quantity ;

      // If result matched $myusername and $mypassword, table row must be 1 row
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

      <h4>Total Price</h4>
      <p id="total price"> <?php echo $total_price; ?> </p>

  </body>
</html>
