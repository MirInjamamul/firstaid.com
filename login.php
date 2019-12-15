<?php

 session_start();
   // connect to the database
   $db = mysqli_connect('localhost', 'root', '', 'firstaid');

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        $_SESSION['username'] = $myusername;
         header("location: order.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link href="css/login/login.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/login/login.js"></script>
  </head>
  <body>
    <div class="login-page">
      <div class="form">
          <form class="register-form">
              <input type="text" placeholder="name"/>
              <input type="password" placeholder="password"/>
              <input type="text" placeholder="email address"/>
              <button>create</button>
              <p class="message">Already registered? <a href="#">Sign In</a></p>
          </form>
          <!-- <form class="login-form">
              <input type="text" placeholder="username"/>
              <input type="password" placeholder="password"/>
              <button>login</button>
              <p class="message">Not registered? <a href="Signup.html">Create an account</a></p>
          </form> -->

          <form action="" method="post" class="login-form">
              <input type="text" name="username" placeholder="Enter your username" required>
              <input type="password" name="password" placeholder="Enter your password" required>
              <input type="submit" value="Submit">
          </form>
      </div>
    </div>
  </body>
</html>
