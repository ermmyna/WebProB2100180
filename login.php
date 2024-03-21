<?php

include("accounts.php");

// Check if the success message is set in the session
if (isset($_SESSION['success_message'])) {
   $success_message = $_SESSION['success_message'];
   // Unset the session variable to clear the message after displaying it once
   unset($_SESSION['success_message']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">
    <title>Login/Sign Up</title>
    <!-- CSS FILES START -->
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <!-- CSS FILES End -->
</head>
<body>
    <div class="wrapper">
        <!--Header Start-->
        <header class="header-style-2">
            <nav class="navbar navbar-expand-lg">
               <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item">
                           <a class="nav-link" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="about.html">About</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="events-grid.html">Events</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="causes.html">Causes</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="blog.html">Blogs</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#">Pages</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                       </li>
                   </ul>

                   <li class="nav-item" style="list-style: none;">
                     <a class="login-btn" href="login.php" role="button"> Login </a>
                 </li>
               </div>
         
            </nav>
            
         </header>
         <!-- Header End -->
        <!--Inner Header Start-->
        <section class="wf100 inner-header">
            <div class="container">
               <h1>Account </h1>
            </div>
         </section>
         <!--Inner Header End--> 
        <!--Content Start-->
        <section class="wf100 p80">
           <div class="container">
              <div class="row">
                 <div class="col-lg-8">
                    <div class="myaccount-form">
                       <h3>Create Account</h3>
                       <form method="post" action="accounts.php">
                           <ul class="row">
                              <li class="col-md-6">
                                    <div class="input-group">
                                       <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                                    </div>
                              </li>
                              <li class="col-md-6">
                                    <div class="input-group">
                                       <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
                                    </div>
                              </li>
                              <li class="col-md-6">
                                    <div class="input-group">
                                       <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                              </li>
                              <li class="col-md-6">
                                    <div class="input-group">
                                       <input type="text" name="contactNumber" class="form-control" placeholder="Contact Number">
                                    </div>
                              </li>
                              <li class="col-md-6">
                                    <div class="input-group">
                                       <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                              </li>
                              <li class="col-md-12">
                                    <div class="input-group form-check">
                                       <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                                       <label class="form-check-label" for="agreeTerms">I agree to the <a href="#">Terms of Services & Privacy Policy</a></label>
                                    </div>
                              </li>
                              <li class="col-md-12">
                                    <button type="submit" class="register" name="signup-btn">Create Account</button>
                              </li>
                           </ul>
                        </form>

                    </div>
                 </div>
                 <div class="col-lg-4">
                    <div class="login-box">
                       <h3>Login Account</h3>
                       <form method="post" action="accounts.php">
                          <div class="input-group">
                             <input type="text" class="form-control"  name="username"placeholder="Username" required>
                          </div>
                          <div class="input-group">
                             <input type="password" class="form-control"  name="password" placeholder="Password" required>
                          </div>
                          <div class="input-group form-check">
                             <input type="checkbox" class="form-check-input" id="exampleCheck2">
                             <label class="form-check-label" for="exampleCheck2">Remember Me</label>
                             <a href="#" class="fp">Forgot Password</a> 
                          </div>
                          <div class="input-group">
                             <button class="login-btn" name="login-btn">Login</button>
                          </div>
                       </form>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <!-- Content End--> 

        <!-- Create Account Popup message -->
        <div id="popupMessage" class="modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Registration Successful!</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>A default password has been sent to your email. Please check your inbox and login using the provided password.</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

   </div>
   <div>
      
   <!-- Footer section -->
   <div class="ftco-section wf100">
            <footer class="footer">
              <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
                <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
              </svg>
            </section>
            <footer class="footer-03">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="d-flex align-items-center justify-content-between mb-4">
                               
                              <div class="logo-space">
                                  <img src="images/EcoTrace Logo.png" alt="Eco Trace Logo" class="logo-img">
                              </div>
                          </div>
              
                           <div class="row">
                               <div class="col-md-6 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Carbon Calculator</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">How it Works</a></li>
                                       <li><a href="#" class="py-1 d-block">Log Your Activities</a></li>
                                       <li><a href="#" class="py-1 d-block">Reduce Your Footprint</a></li>
                                   </ul>
                               </div>
                               <div class="col-md-4 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Resources</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">Blog</a></li>
                                       <li><a href="#" class="py-1 d-block">Educational Materials</a></li>
                                       <li><a href="#" class="py-1 d-block">FAQs</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="row justify-content-end">
                               <div class="col-md-12 col-lg-11 mb-md-0 mb-4">
                                   
                                   <h2 class="footer-heading mt-5">Connect With Us</h2>
                                   <ul class="ftco-footer-social p-0">
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                                   </ul>
                                   <h2 class="footer-heading mt-5">Subscribe to Our Newsletter</h2>
                                   <form action="#" class="subscribe-form">
                                       <div class="form-group d-flex">
                                           <input type="text" class="form-control rounded-left" placeholder="Enter your email address">
                                           <input type="submit" value="Subscribe" class="form-control submit px-3 rounded-right">
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-5 pt-4 border-top">
                       <div class="col-md-6 col-lg-8">
                           <p class="copyright">© <script>document.write(new Date().getFullYear());</script> All rights reserved | EcoTrace - Track and Reduce Your Carbon Footprint</p>
                       </div>
                       <div class="col-md-6 col-lg-4 text-md-right">
                           <p class="mb-0 list-unstyled">
                               <a class="mr-md-3" href="#">Terms &amp; Conditions</a>
                               <a class="mr-md-3" href="#">Privacy Policy</a>
                           </p>
                       </div>
                   </div>
               </div>
           </footer>
  </div>

    <!--   JS Files Start  --> 
    <script src="js/jquery-3.3.1.min.js"></script> 
    <script src="js/jquery-migrate-1.4.1.min.js"></script> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/owl.carousel.min.js"></script> 
    <script src="js/jquery.prettyPhoto.js"></script> 
    <script src="js/isotope.min.js"></script> 
    <script src="js/main.js"></script>

    <script>
        // Check if the success message session variable is set
        <?php if (isset($_SESSION['success_message'])): ?>
            // Call the function to display the popup message
            showSuccessMessage();
        <?php endif; ?>

        // Function to display the pop-up message
        function showSuccessMessage() {
            $('#popupMessage').modal('show'); // Assuming you are using Bootstrap modal
        }
    </script>

</body>
</html>

