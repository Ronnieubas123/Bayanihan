<?php 
    include "assets/include/signup.php";
 ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="it">
    <meta name="keywords" content="Rapoo,creative, agency, startup, Mobicon,onepage, clean, modern,business, company,it">
    <meta name="author" content="Dreambuzz">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/themify/themify-icons.css">

    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/all.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <title>Bayanihan</title>
</head>

<style type="text/css">
    
.btn-mini {
    color: blue;
}

.site-navigation .navbar-brand {
    padding: 0;
}

.navbar-brand img{
    width: 60px;
}

div.modalform  input,div.modalform select {
    border-radius: 5px;
    padding: 10px 20px;
    margin: 5px 0;
    border: 1px solid lightgray;
}
 option[value=""][disabled] {
    display: none;
}

img.biglogo {
    width: 300px;
    display: block;
    margin: 0 auto;
}

</style>


<!-- LOADER TEMPLATE -->
<div id="page-loader">
    <div class="loader-icon fa fa-spin colored-border"></div>
</div>
<!-- /LOADER TEMPLATE -->

<body class="top-header">
     <!-- NAVBAR
    ================================================= -->
        
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top site-navigation main-nav navbar-togglable header-white">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png">
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Links -->
                <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="index.php" id="navbarWelcome" >
                                Home
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="about.html" class="nav-link js-scroll-trigger">
                                About
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="service.html" class="nav-link js-scroll-trigger">
                                Services
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="pricing.html" class="nav-link js-scroll-trigger">
                                Pricing
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="project.html" class="nav-link js-scroll-trigger">
                                Projects
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="contact.html" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                <ul class="ml-lg-auto list-unstyled m-0 nav-btn">
                    <li><a href="#" class="btn btn-trans-white btn-circled">Log-in</a></li>
                </ul>
            </div> <!-- / .navbar-collapse -->
        </div> <!-- / .Container -->
    </nav>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
            <h2>Join the Event</h2>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="modalform">
                <input class="col-md-12" type="text" placeholder="First Name" id="fname">
                <input class="col-md-12" type="text" placeholder="Last Name" id="lname">
                <input class="col-md-12" type="text" placeholder="Email Address" id="Email">
                <input class="col-md-12" type="text" placeholder="Contact Number" id="Number">
                <input class="col-md-12" type="text" placeholder="Company/Organization" id="Organization">
                <select class="col-md-12" id="Career">
                    <option disabled selected="" value="">Career / Category</option>
                    <option value="Student">Student</option>
                    <option value="Professionals">Professionals</option>
                </select>
            
        </div>
    </div>
        
        <div class="modal-footer">
          <button type="submit" name="btnadd" class="btn btn-default" id="registerEvent" data-dismiss="modal" value="<?php echo $_GET['eventID']; ?>" >Submit</button>
        </div>
      
      </div>
      
    </div>
  </div>
  
</div>


    <!-- HERO
    ================================================== -->

    <!-- SECTIONS
    ================================================== -->

    <!-- Working Process
    ================================================== -->
   <section class="section" id="blog">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="section-heading">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-6">
                    <div class="blog-box">
                        <div class="blog-img-box">

<?php 
$eventID = $_GET['eventID'];
include"../../connection/db_connection.php";
$sql_event = $dbCon -> prepare( "SELECT * FROM tbl_event WHERE id = '$eventID'" );
$sql_event -> execute();
$result_event = $sql_event -> fetch();

$user_id = $result_event['userID'];
$sql_img = $dbCon -> prepare( "SELECT * FROM tbl_eventimg WHERE eventID = '$eventID'" );
$sql_img -> execute();
$result_img = $sql_img -> fetch();

$sql_user = $dbCon -> prepare( "SELECT * FROM tbl_user WHERE id = '$user_id'" );
$sql_user -> execute();
$result_user = $sql_user -> fetch();
$status = $result_user['status'];

if($status == "Volunteer"){
    $name = $result_user['firstname'].' '.$result_user['lastname'];
}else{
    $name = $result_user['company'];
}

?>
                            <img src="../../assets/img/<?php echo $result_img['img']; ?>" alt="" class="img-fluid blog-img">
                        </div>
                        <div class="single-blog">
                            <div class="blog-content">
                                <h3 class="card-title">Title Sang Event</h3>
                                <h6><?php echo $result_event['date']; ?></h6>
                                <p>Description of the Event.</p>
                                <p><?php echo $result_event['comments']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="blog-box">
                        <div class="single-blog">
                            <div class="blog-content">
                                <h3 class="card-title">
                                    <?php 
                                    date_default_timezone_set('Asia/Manila');
                                    $dates = $result_event['date'];
                                    $dates=date('j F Y');
                                    echo $dates;
                                    ?>
                                        
                                    </h3>
                                <h6>by <?php echo $name;?> <span class="btn-mini">Follow</span></h6>

                                
                                 <input name="submit"  type="submit" class="btn btn-primary btn-circled" value="Join the Event" data-toggle="modal" data-target="#myModal">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section" id="blog2" style="display: none;">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-6">
                    <h1 class="card-title text-center">Successfully Joined</h1>
                    <img class="biglogo" src="assets/img/logo.png">
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER
    ================================================== -->
    <footer class="section " id="footer">
        <div class="overlay footer-overlay"></div>
        <!--Content -->
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-4 col-sm-12">
                    <div class="footer-widget">
                        <!-- Brand -->
                        <a href="#" class="footer-brand text-white">
                            Rapoo
                        </a>
                        <p>Each theme featured at the Bootstrap marketplace has been reviewed by Bootstrap's creators.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="col-lg-3 ml-lg-auto col-sm-12">
                    <div class="footer-widget">
                        <h3>Account</h3>
                        <!-- Links -->
                        <ul class="footer-links ">
                            <li>
                                <a href="#">
                                    Terms and conditions
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Privacy policy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Affiliate services
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Help and support
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Frequently Asked Question
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget">
                        <h3>About</h3>
                        <!-- Links -->
                        <ul class="footer-links ">
                            <li>
                                <a href="#">
                                    Services
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Pricing
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Products Shop
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget">
                        <h3>Socials</h3>
                        <!-- Links -->
                        <ul class="list-unstyled footer-links">
                            <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                            <li>
                            <a href="#"><i class="fab fa-twitter"></i>Twitter
                            </a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i>Pinterest
                            </a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i>linkedin
                            </a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i>YouTube
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- / .row -->


            <div class="row text-right pt-5">
                <div class="col-lg-12">
                    <!-- Copyright -->
                    <p class="footer-copy ">
                        &copy; Copyright <span class="current-year"><a href="https://themefisher.com/free-bootstrap-templates">Free Bootstrap Templates</a></span> All rights reserved.
                    </p>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </footer>


    <!--  Page Scroll to Top  -->

    <a class="scroll-to-top js-scroll-trigger" href=".top-header">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Global JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Slick JS -->
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/scrollIt.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <!-- Theme JS -->
    <script src="assets/js/theme.js"></script>

</body>
<script >

//  $("#blog2").hide();
 //   $("#try").click(function(){
  //$("#blog").hide();
  //$("#myModal").hide();
  //$("#blog2").show();

//});

$(function(){
    $(document).on("click","#registerEvent",function(){
        var fname = $("input#fname").val();
        var lname = $("input#lname").val();
        var Email = $("input#Email").val();
        var Organization = $("input#Organization").val();
        var Career = $("select#Career").val();
        var eventID = $(this).attr("value");

        $.ajax({
            url:"../../classes/eventRegister_reg.php",
            method: "POST",
            data: 'fname=' + fname + '&lname=' + lname + '&Email=' + Email + '&Organization=' + Organization + '&Career=' + Career + '&eventID=' + eventID,  
            success:function(data){
                    $("#blog2").show();
                    $("#blog").hide();
            }
        });
    });
});
</script>
</html>