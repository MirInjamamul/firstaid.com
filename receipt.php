<?php
session_start();
  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'firstaid');

  $review = 1;
  $zero = 0;
  if($_SERVER["REQUEST_METHOD"] == "POST") {
     // username and password sent from form

     $bkash = mysqli_real_escape_string($db,$_POST['bkash']);
     $username = $_SESSION['username'];

     $sql1 = "update product_order SET bkash = '$bkash' where user_name = '$username' and flag= '$zero'";
     mysqli_query($db,$sql1);

     $sql2 = "update product_order SET flag = '$review' where user_name = '$username' and flag= '$zero'";
     mysqli_query($db,$sql2);

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
     <!-- MODAL Start
    	================================================== -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
		    	<div class="modal-content">
		    		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        		<h4 class="modal-title" id="myModalLabel">Banking System</h4>
		      		</div>
			      	<div class="modal-body clearfix">

						<form action="" method="post" id="create-account_form">
							<fieldset>
								<h3>Mobile Payment</h3>
								<div class="form_content clearfix">
									<h4>Enter your BKASH Number</h4>
									<p class="text">
										<label for="email_create">USERNAME</label>
										<span>
											<input placeholder="BKASH Number"  type="text" id="email_create" name="bkash" value="" class="account_input">
					                    </span>
									</p>
									<p class="submit">
										<button class="btn btn-primary">Enter Your Number</button>
									</p>
								</div>
							</fieldset>
						</form>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
		    	</div>
		  	</div>
		</div>
	</section>  <!-- End of /Section -->
     <div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>FIRST AID</strong>

                        <abbr title="Phone">P:</abbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo "" . date("Y/m/d") . "<br>";
                                  ?></em>
                    </p>
                    <p>
                        <em>Receipt #: #Rand_id</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $_SESSION['product_name']; ?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"><?php echo $_SESSION['quantity']; ?> </td>
                            <td class="col-md-1 text-center"><?php echo $_SESSION['price']; ?></td>
                            <td class="col-md-1 text-center"><?php echo $_SESSION['total_price']; ?></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: <?php echo $_SESSION['total_price']; ?></strong>
                            </p>
                            </td>
                        </tr>
                             <td > <a data-toggle="modal" data-target="#myModal" href="#">PAY</a></td>

                               </body>
 </html>
