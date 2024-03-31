<?php
// Function to check if user is logged in
function isLoggedIn() {
    // Implement your logic here to check if the user is logged in
}

// Function to check if weekly log is up to date
function weeklyLogUpToDate($con) {
    // Implement your logic here to check if the weekly log is up to date
}

// Establish a connection to your MySQL database
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "bit210"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tracker</title>
    <!-- CSS FILES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css" rel="stylesheet">
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/notificationBell.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Anton&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styles */
    </style>
</head>
<body>


    <div class="wrapper home2">
         <!--Header Start-->
         <header class="header-style-2">
            <nav class="navbar navbar-expand-lg">
               <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px; margin-left:30px;"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item">
                           <a class="nav-link active" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="about.html">About</a>
                       </li>
                       <?php if (isLoggedIn()): ?>
                       <li class="nav-item">
                           <a class="nav-link" href="activity_log.php">Activity Log</a>
                       </li>
                       <?php endif; ?>
                       <li class="nav-item">
                           <a class="nav-link" href="carbon_dash.php">Dashboard</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbonCalculator.php">Carbon Calculator</a>
                       </li>
                       <!--
                       <li class="nav-item">
                           <a class="nav-link" href="#">Pages</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                       </li>
                       --->
                   </ul>
                   <?php if (isLoggedIn()): ?>
                     <!-- If user is logged in, show profile circle -->
                     <li class="nav-item" style="list-style: none;">
                     <!-- If user is not logged in, show login button -->
                     <div class="notification" >
                        <div class="notBtn" href="#">
                           <?php if (weeklyLogUpToDate($con)) : ?>
                              <div class="number"></div>
                           <?php else : ?>
                              <div class="number">1</div>
                           <?php endif; ?>
                              <i class="fas fa-bell" id="bell"></i>
                              <div class="box">
                                 <div class="display">
                                    <?php if (weeklyLogUpToDate($con)) : ?>
                                       <div class="container" style= "padding-top:25px;">
                                          <div class="row">
                                             <div class="col-3">
                                             <img class="icon" style="width:60px; margin-left:8px;" src="https://cdn-icons-png.flaticon.com/128/8832/8832119.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                             <div class="cent">You're all caught up!</div>
                                            </div>
                                          </div>
                                    <?php else : ?>
                                       <div class="container" style= "padding-top:22px;">
                                          <div class="row">
                                             <div class="col-3">
                                                   <img class="icon" style="width:50px;" src="https://cdn-icons-png.flaticon.com/128/10308/10308693.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                                   <div class="cent">Please update your weekly log for this week</div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </li>
                     <li class="nav-item profile-dropdown">
                        <img src="images/profile.jpg" class="profile" />
                        <ul class="profile-menu">
                           <li class="sub-item">
                               <a href="profile.php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Update Profile</p>
                               </a>
                           </li>
                           <!-- Other profile-related items -->
                           <li class="sub-item">
                                 <a href="index.php?logout=true" style="display: flex; align-items: center; text-decoration: none;"> <!-- Log out link -->
                                    <span class="material-icons-outlined"> logout </span>
                                    <p>Logout</p>
                                 </a>
                           </li>
                        </ul>
                     </li>

               <?php else: ?>
                     <li class="nav-item" style="list-style: none;">
                        <a class="login-btn" href="login.php" role="button"> Login </a>
                     </li>
               <?php endif; ?>
               
               
            </div>
         
            </nav>
            
         </header>
         <!--Header End-->
<!--Inner Header Start-->
<section class="wf100 inner-header">
    <div class="container">
       <h1>Carbon Footprint Tracker</h1>
    </div>
 </section>
 <!--Inner Header End--> 

 <div id="shareAchievement" class="container bg-white rounded shadow p-4 text-center mt-5 mb-5">
      <h2>Share Achievement</h2>
      <p>You may choose the preset message or custom your own message.</p>
      <div id="preset-messages" class="d-flex flex-wrap justify-content-center mt-3 mb-3">
        <!-- Buttons with Bootstrap classes -->
        <!-- Example for one button: -->
        <button class="preset-message btn btn-success m-2" data-message="I just achieved a milestone in reducing my carbon footprint! 🌍 Join me in making a difference!">Milestone Achievement</button>
        <button class="preset-message btn btn-success m-2" data-message="Great news! I've taken significant steps to reduce my carbon emissions. Let's inspire others to do the same!">Inspiration</button>
        <button class="preset-message btn btn-success m-2" data-message="Excited to share my progress in lowering my carbon footprint. Every action counts towards a greener future!">Excitement</button>
        <button class="preset-message btn btn-success m-2" data-message="Just reached a new sustainability goal! Together, we can make a positive impact on the planet.">Sustainability Goal</button>
        <button class="preset-message btn btn-success m-2" data-message="Join me in celebrating my commitment to a more eco-friendly lifestyle! Together, we can create a better world.">Celebration</button>
        <button class="preset-message btn btn-success m-2" id="custom-message-button">Custom Message</button>
      </div>
  
      <div id="achievement-message-container" class="d-flex align-items-center gap-2 mt-3 mb-3">
        <textarea id="achievement-message-input" class="form-control" placeholder="Selected message will appear here... /Type here..."></textarea>
        <button id="confirm-selection" class="btn btn-primary">Confirm</button>
      </div>
  

      <div class="button-container d-flex justify-content-center align-items-center gap-2 mt-3 mb-3">
        <h4 class="mb-0">Share on :</h4>
        <button id="share-facebook" class="btn btn-warning mx-2"> <!-- Increased spacing -->
          <i class="fab fa-facebook-f"></i> Facebook
        </button>
        <button id="share-instagram" class="btn btn-warning mx-2"> <!-- Increased spacing -->
          <i class="fab fa-instagram"></i> Instagram
        </button>
      </div>
      
      
      <a href="socialInt(chat).php" class="btn btn-info">Go to Chat Page</a>
    </div>
  </body>
  

  <script>
      document.addEventListener('DOMContentLoaded', function() {
    const presetButtons = document.querySelectorAll('.preset-message');
    const customMessageButton = document.getElementById('custom-message-button');
    const achievementMessageInput = document.getElementById('achievement-message-input');
    let selectedMessage = '';

    // Event listener for preset message buttons
    presetButtons.forEach(button => {
      button.addEventListener('click', function() {
        selectedMessage = this.getAttribute('data-message');
        achievementMessageInput.value = selectedMessage;
        // Enable the input field after selecting a preset message
        achievementMessageInput.removeAttribute('readonly');
      });
    });

    // Event listener for custom message button
    customMessageButton.addEventListener('click', function() {
      // Clear the message input field
      achievementMessageInput.value = '';
      // Clear the selected message variable
      selectedMessage = '';
      // Enable the input field for custom message
      achievementMessageInput.removeAttribute('readonly');
    });

      // Event listener for confirm selection button
      document.getElementById('confirm-selection').addEventListener('click', function() {
        const customMessage = achievementMessageInput.value.trim();
        if (customMessage !== '') {
          alert('Message selected. Please copy the message and proceed.');
        } else {
          alert('Please type a message or select a preset message first.');
        }
      });

      // Event listener for share on Facebook button
      document.getElementById('share-facebook').addEventListener('click', function() {
        if (selectedMessage !== '') {
          const url = `https://www.facebook.com/sharer/sharer.php?u=https://example.com&quote=${encodeURIComponent(selectedMessage)}`;
          window.open(url, '_blank');
        } else {
          alert('Please select or write a message first.');
        }
      });

      // Event listener for share on Instagram button
      document.getElementById('share-instagram').addEventListener('click', function() {
        if (selectedMessage !== '') {
            window.location.href = 'https://www.instagram.com/';
        } else {
            alert('Please select or write a message first.');
        }
      });
    });
  </script>

         <!--Footer Section Start--> 
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
      <!--Footer Section End-->  
         
</body>
</html>