<?php
  session_start();
  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'firstaid');//Upcoming Exams Query
  //Query
$query = "SELECT * FROM product_order Where flag = 0";
$result1 = mysqli_query($db,$query);
$rows1 = mysqli_num_rows($result1);

$query1 = "SELECT * FROM product_order Where flag = 1";
$result2 = mysqli_query($db,$query1);
$rows2 = mysqli_num_rows($result2);

if(isset($_POST['product_entry'])){

  $id = mysqli_real_escape_string($db,$_POST['id']);
  $name = mysqli_real_escape_string($db,$_POST['name']);
  $price = mysqli_real_escape_string($db,$_POST['price']);

  $query1 = "INSERT INTO product_list (product_id,product_name,price)
        VALUES('$id','$name','$price')";
  mysqli_query($db, $query1);
   header("location: admin.php");
}

/*
//Notice List
$queryNotice = "SELECT * FROM notice";
$resultNotice = mysqli_query($con,$queryNotice) or die(mysql_error());
$rowsNotice = mysqli_num_rows($resultNotice);

//Upload Upcoming Exam Name
if(isset($_POST['upcomingExamFormImport'])){

    $exam_name = $_POST['exam_name'];
    $new_date = date('Y-m-d', strtotime($_POST['examDate']));

    $con->query("INSERT INTO upcoming_exam (exam_name,exam_date) VALUES('$exam_name', '$new_date')");
}

// notice Update
if(isset($_POST['product_entry'])){

    $notice = $_POST['notice'];

    $con->query("INSERT INTO notice (notice) VALUES('$notice')");
} */
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>FirstAid - Admin Panel</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- required -->
	<link rel="stylesheet" type="text/css" media="all" href="css/stellarnav.css">
	<!-- required -->

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">

</head>


<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="row">

            <!-- <div class="header-logo">
                <a class="site-logo" href="index.html"><img src="images/logo.svg" alt="Homepage"></a>
            </div> -->

            <!-- <nav class="header-nav-wrap">
                <ul class="header-nav">

                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="#about" title="kits">Kits</a></li>
                    <li><a class="smoothscroll"  href="#services" title="medicines">Medicines</a></li>
                    <li><a class="smoothscroll"  href="#works" title="safety equipment">Safety Equipment</a></li>
                    <li><a class="smoothscroll"  href="#NewArrival" title="New Arrival">New Arrival</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="how to use">How To Use</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="smart suggetions">Smart Suggetions</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="Quick Order">Quick Order</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="Sign Up">Sign Up</a></li>
                </ul>
            </nav> <!-- end header-nav-wrap -->

            <a class="header-menu-toggle" href="#0">
                <span class="header-menu-icon"></span>
            </a>

        </div> <!-- end row -->

    </header> <!-- end s-header -->
    <header class="s-header">
      <div class="stellarnav">
      <ul>
        <li><a class="site-logo" href="#"><img src="images/first_aid_logo.jpg" alt="Homepage"></a></li>
        <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
        <li><a class="smoothscroll"  href="#about" title="kits">Kits</a>
          <ul>
            <li><a href="homeKit.html" title="Home Kit">Home Kit</a></li>
            <li><a href="travelKit.html" title="Travel Kit">Travel Kit</a></li>
            <li><a href="sportsKit.html" title="Sports Kit">Sports Kit</a></li>
            <li><a href="biohazardProtectionKit.html" title="Biohazard Protection">Biohazard Protection</a></li>
            <li><a href="firstAidBag.html" title="First Aid Bag">First Aid Bag</a></li>
            <li><a href="hearingAidKit.html" title="Hearing Aid">Hearing Aid</a></li>
          </ul>
        </li>
        <li><a class="#"  href="medicine.html" title="medicines">Medicines</a></li>
        <li><a class="#"  href="safetyEquipment.html" title="Safety Equipment">Safety Equipment</a></li>
        <li><a class="smoothscroll"  href="#NewArrival" title="New Arrival">New Arrival</a></li>
        <li><a class="#"  href="howToUse.html" title="how to use">How To Use</a></li>
        <li><a class="smoothscroll"  href="#contact" title="smart suggetions">Smart Suggetions</a></li>
        <li><a class="smoothscroll"  href="#contact" title="Quick Order">Quick Order</a></li>
        <li><a class="#"  href="signup.php" title="Sign Up">Sign Up</a></li>
      </ul>
    </div><!-- .stellarnav -->
  </header>



    <!-- home
    ================================================== -->
    <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h1>
                ADMIN PANEL
                </h1>

                <div class="home-content__button">
                    <a href="#about" class="smoothscroll btn btn-animatedbg">
                        More About Us
                    </a>
                </div>

                <div class="home-content__video">
                    <a class="video-link" href="https://player.vimeo.com/video/117310401?color=01aef0&title=0&byline=0&portrait=0" data-lity>
                        <span class="video-icon"></span>
                        <span class="video-text">Play Video</span>
                    </a>
                </div>

            </div> <!-- end home-content__main -->

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    Scroll
                </a>
            </div>

        </div> <!-- end home-content -->

        <!-- <ul class="home-social">
            <li>
                <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
            </li>
        </ul> <!-- end home-social --> -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id="about" class="s-about target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="01" class="subhead">Not Yet Paid</h3>
                <h1 class="display-1">
                Here is the list for Ordered but not paid
                </h1>
                <p class="lead">
                  <div class="row">
                      <div class="col-md-12 text-center"><h1 style="color: brown">Not Paid List</h1></div>
                      <br>
                      <?php
                      if($rows1>0){
                      ?>
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th><center>User Name</center></th>
                              <th><center>Product Id</center></th>
                              <th><center>Total Price</center></th>
                          </thead>
                          <?php
                          $count= 0;
                          while ($rowTS = mysqli_fetch_array($result1)) {
                              $count++;
                              ?>
                              <tr>
                                  <td><center><?php $summary = $rowTS['user_name']; echo $summary;?></center></td>
                                  <td><center><?php $summary = $rowTS['product_id']; echo $summary;?></center></td>
                                  <td><center><?php $summary = $rowTS['total']; echo $summary;?></center></td>
                              </tr>
                          <?php
                          }
                          }
                          else
                          {
                          ?>
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                <th><center>User Name</center></th>
                                <th><center>Product Id</center></th>
                                <th><center>Total Price</center></th>
                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="7" style="color: red"><center><?php echo "No result to show"; ?></center></td>
                              </tr>
                              <?php }
                              ?>
                          </table>
                  </div>
                </p>
            </div>
        </div>

    </section> <!-- end s-about -->


    <!-- services
    ================================================== -->
    <section id="services" class="s-services target-section">

      <div class="row section-header" data-aos="fade-up">
          <div class="col-full">
              <h3 data-num="01" class="subhead">Paid</h3>
              <h1 class="display-1">
              Here is the list for Ordered and Paid
              </h1>
              <p class="lead">
                <div class="row">
                    <div class="col-md-12 text-center"><h1 style="color: brown">Paid List</h1></div>
                    <br>
                    <?php
                    if($rows2>0){
                    ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><center>User Name</center></th>
                            <th><center>Product Id</center></th>
                            <th><center>Total Price</center></th>
                            <th><center>Bkash Number</center></th>
                            <th>Content Control</th>
                        </thead>
                        <?php
                        $count= 0;
                        while ($rowTS = mysqli_fetch_array($result2)) {
                            $count++;
                            ?>
                            <tr>
                                <td><center><?php $summary = $rowTS['user_name']; echo $summary;?></center></td>
                                <td><center><?php $summary = $rowTS['product_id']; echo $summary;?></center></td>
                                <td><center><?php $summary = $rowTS['total']; echo $summary;?></center></td>
                                <td><center><?php $summary = $rowTS['bkash']; echo $summary;?></center></td>
                                <td ><a href="orderPaid.php?edit_id=<?php echo $rowTS['id']; ?>">Paid</a></td>
                            </tr>
                        <?php
                        }
                        }
                        else
                        {
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                              <th><center>User Name</center></th>
                              <th><center>Product Id</center></th>
                              <th><center>Total Price</center></th>
                            </tr>
                            </thead>
                            <tr>
                                <td colspan="7" style="color: red"><center><?php echo "No result to show"; ?></center></td>
                            </tr>
                            <?php }
                            ?>
                        </table>
                </div>
              </p>
          </div>
      </div>

    </section> <!-- end s-services -->


    <!-- works
    ================================================== -->
    <section id="works" class="s-works target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="03" class="subhead">Product Entry</h3>
                <h1 align="center">Product Entry</h1>

                <form action="" method="post">
                  <table border="0">
                    <tr>
                      <td>Product Id : </td>
                      <td><input type="number" name="id" placeholder="Product Id"></td>
                    </tr>
                    <tr>
                      <td>Product Name :</td>
                      <td><input type="text" name="name" placeholder="Product Name"></td>
                    </tr>
                    <tr>
                      <td>Price :</td>
                      <td><input type="number" name="price" placeholder="price"></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input type="submit" name="product_entry" value="Order"></td>
                    </tr>
                  </table>

                </form>
            </div>
        </div>
    </section> <!-- end s-works -->

    <!-- New Arrival
    ================================================== -->
    <section id="NewArrival" class="s-works target-section">

    </section> <!-- end New Arrival -->


    <!-- clients
    ================================================== -->
    <section id="clients" class="s-clients target-section">




    </section> <!-- end s-clients -->


    <!-- stats
    ================================================== -->
    <section id="stats" class="s-stats">



    </section> <!-- end s-stats -->


    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="05" class="subhead">Get In Touch</h3>
                <h1 class="display-1 display-1--light">Have an idea or an epic project in mind? Talk to
                    us. Let’s work together and make something
                    great. Drop us a line at <a href="mailto:#0">hello@stellar.com</a></h1>
            </div>
        </div>

        <div class="row contact-infos">

            <div class="col-five md-seven tab-full contact-address" data-aos="fade-up">
                <h4>Where to Find Us</h4>

                <p>
                1600 Amphitheatre Parkway <br>
                Mountain View, California <br>
                94043  US
                </p>
            </div>

            <div class="col-three md-five tab-full contact-social" data-aos="fade-up">
                <h4>Follow Us</h4>

                <ul class="contact-list">
                    <li><a href="#0">Facebook</a></li>
                    <li><a href="#0">Twitter</a></li>
                    <li><a href="#0">Instagram</a></li>
                </ul>
            </div>

            <div class="col-four md-six tab-full contact-number" data-aos="fade-up">
                <h4>Contact Us</h4>

                <ul class="contact-list">
                    <li><a href="mailto:#0">info@stellar.com</a></li>
                    <li><a href="tel:197-543-2345">+197 543 2345</a></li>
                    <li><a href="tel:197-123-9876">+197 123 9876</a></li>
                </ul>
            </div>

        </div> <!-- end contact-infos -->

        <div class="row contact-bottom">
            <div class="col-five tab-full contact-button" data-aos="fade-up">
                <a href="#about" class="smoothscroll btn btn-animatedbg">
                    Let's Talk
                </a>
            </div>

            <div class="col-six tab-full contact-subscribe" data-aos="fade-up">
                <h4>Subscribe</h4>

                <form id="mc-form" class="group mc-form" novalidate="true">
                    <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                    <input type="submit" name="subscribe" value="Subscribe">
                    <label for="mc-email" class="subscribe-message"></label>
                </form>
            </div>
        </div> <!-- end contact-button -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>
        <div class="row">
            <div class="col-full cl-copyright">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
            </div>
        </div>

        <div class="cl-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>
    </footer>


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div><!-- end photoSwipe background -->


    <!-- Java Script
    ================================================== -->
    <!-- required -->
    	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    	<script type="text/javascript" src="js/stellarnav.min.js"></script>
    	<script type="text/javascript">
    		jQuery(document).ready(function($) {
    			jQuery('.stellarnav').stellarNav({
    				theme: 'dark',
    				breakpoint: 960,
    				position: 'right',
    				phoneBtn: '18009997788',
    				locationBtn: 'https://www.google.com/maps'
    			});
    		});
    	</script>
    	<!-- required -->

    	<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>

    <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
