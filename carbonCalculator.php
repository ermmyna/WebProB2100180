<?php
include("carbon_calc.php");

function isLoggedIn()
{
        if (isset($_SESSION['userID'])) {
                return true;
        }else{
                return false;
        }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html>
<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/EcoTrace Logo.png" style="width: 50px;">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
	   <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
      <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=320" />
      <title>CarbonFootprint Dashboard</title> 
      <link href='https://fonts.googleapis.com/css?family=Anton&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css" rel='stylesheet'>
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet"/>


      <!-- CSS FILES START -->
      <link href="css/custom3.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">
      <link href="css/notificationBell.css" rel="stylesheet">
      <link href="css/color.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <link href="css/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/all.min.css" rel="stylesheet"> 
      <!-- CSS FILES End -->

 <div class="stylelong">

     
    <style>
        @font-face {
            font-family: 'Futura Md BT';
            font-weight: 900;
            font-style: normal;
        }

        /* i add */
        .body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background-color: #00897b;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            font-size: 2rem;
        }

        .dashboard, .chart-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card, .chart {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        
    </style>

    <style>
        @font-face {
            font-family: 'Futura Hv BT';
            font-weight: 900;
            font-style: normal;
        }
    </style>
    <style>
       .dashboard-card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2), 0 1px 3px rgba(0, 0, 0, 0.08);
        margin-bottom:5px;
       }

       .custom-box-shadow {
        box-shadow: 0 10px 40px rgba(156, 204, 101, 0.3);
       }

        .food_icon{
        position: absolute;
        right: 0;
        bottom: 0;
        height: 100px;
        width: 100px;
        margin-right: -8px;
        margin-bottom: -20px;
        color: red; /* Change to your desired color */
        opacity: 0.1;
        }

        .energy_icon{
        position: absolute;
        right: 0;
        bottom: 0;
        height: 92px;
        width: 92px;
        margin-bottom: -10px;
        color: green; /* Change to your desired color */
        opacity: 0.1;
        }

        .transport_icon{
        position: absolute;
        right: 0;
        bottom: 0;
        height: 90px;
        width: 90px;
        margin-bottom: -10px;
        margin-right:4px;
        color: orange; /* Change to your desired color */
        opacity: 0.1;
        }

        .add_icon{
        position: absolute;
        right: 0;
        bottom: 0;
        height: 90px;
        width: 90px;
        margin-bottom: -10px;
        margin-right:4px;
        color: orange; /* Change to your desired color */
        opacity: 0.1;
        }


     #donutChart {
        max-width: 400px;  /* Set the maximum width as needed */
        max-height: 400px; /* Set the maximum height as needed */
        margin:20px;
    }

    #lineChart{
        min-width: 400px;  /* Set the maximum width as needed */
        min-height: 300px; /* Set the maximum height as needed */
        margin:20px;
    }

	.pt40 {
		padding-top: 40px;
	}
	
	.h2-dashboard-txt h3 {
		color: #66bb6a;;
		font-family: 'Poppins', sans-serif;
		font-weight: 500;
	}
	.h2-dashboard-txt h6 {
		color: #1b5e20;
		font-family: 'Poppins', sans-serif;
		font-weight: 700;
		margin: 15px 0;
	}
	.h2-dashboard-txt p {
		font-family: 'Roboto', sans-serif;
		font-size: 16px;
		color: #555555;
		line-height: 28px;
		margin: 0 0 30px;
	}
    .navPic{
        margin: 20px;
        border:4px solid #ADDFA4;
        border-radius: 500%;
        -webkit-border-radius: 500px;
        -moz-border-radius: 500px;
        }

            .h2-dashboard-txt a {
                background: #66bb6a;
                color: #fff;
                display: inline-block;
                line-height: 44px;
                border-radius: 5px;
                padding: 0 50px;
                font-weight: 600;
                text-transform: uppercase;
                font-family: 'Poppins', sans-serif;
                margin-bottom:-50px;
                margin-top:-30px;
            }
            .h2-dashboard-txt a:hover {
                background: #33691e;
                color: #fff;
            }

            .dashboard-card {
    border-radius: 999px; /* Use a large value to create an oval shape */
}
    </style>
 </div>
      
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
                       <li class="nav-item">
                           <a class="nav-link" href="socialInt(chat).php">Chat Room</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="socialInt(shareAchivement).php">Share Achievement</a>
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
                       <!--
                       <li class="nav-item">
                           <a class="nav-link" href="#">Pages</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                       </li>
                       --->
                   </ul>

               
               
            </div>
         
            </nav>
            
         </header>
         <!--Header End-->

          <!--Inner Header Start-->
          <section class="wf100 inner-header">
            <div class="container">
               <h1>Carbon Footprint Calculator</h1>
            </div>
         </section>
         <!--Inner Header End--> 

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'userID' session key is set
    if (!isset($_SESSION['userID'])) {
        // Redirect the user to the login page if they are not logged in
        header("Location: login.php");
        exit();
    }

    // Retrieve the username from the session
    $username = $_SESSION['userID'];

    // Retrieve other form inputs
    $transportation = isset($_POST['transportation']) ? floatval($_POST['transportation']) : 0;
    $energy = isset($_POST['energy']) ? floatval($_POST['energy']) : 0;
    $diet = isset($_POST['diet']) ? floatval($_POST['diet']) : 0;
    $totalCarbonFootprint = $transportation + $energy + $diet;

    // Database connection settings
    $servername = "localhost:3307";
    $db_username = "root";
    $db_password = "";
    $db_name = "bit210";

    // Create a new connection
    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO carboncalculator (username, transportation, energy, diet, total_carbon_footprint) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sdddd", $username, $transportation, $energy, $diet, $totalCarbonFootprint);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Thanks! New record inserted successfully!");</script>';
        echo '<script>window.setTimeout(function() { window.location = "carbonCalculator.php"; }, 1000);</script>'; // Redirect after 1 second
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Calculator</title>

<style>
  /* CSS styling for form */
  h1,h2{
    text-align: center;
  }
  form {
    max-width: 500px;
    margin: 0 auto;
    padding: 18px;
    background: #f4f7f6;
    border-radius: 8px;
  }
  input[type="number"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  button:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<form id="carbonFootprintForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="transportation">Transportation (in miles):</label>
  <input type="number" id="transportation" name="transportation" placeholder="Enter miles">
  
  <label for="energy">Energy Consumption (in kWh):</label>
  <input type="number" id="energy" name="energy" placeholder="Enter kWh">
  
  <label for="diet">Diet (in kg of CO2):</label>
  <input type="number" id="diet" name="diet" placeholder="Enter kg of CO2">
  
  <button type="submit" id="calculateButton">Calculate</button>
</form>

<!-- Button for opening recomm.php -->
<button onclick="openRecomm()">Open Recommendations</button>

<script>
  // JavaScript function to open recomm.php
  function openRecomm() {
    window.open("recommCalculator.php", "_blank");
  }
</script>

<div id="result">

</div>

<div id="dashboard">
    <h2>Real-time Carbon Footprint Dashboard</h2>
    <div id="totalCarbonFootprint"></div>
    <div id="emissionBreakdown"></div>
</div>

<!-- Content Section End -->

        <!-- Footer Section -->
        <footer class="footer-03">
            <div class="container">
                <!-- Footer Content -->
            </div>
        </footer>
        <!-- Footer Section End -->
    </div>
                  <div class="col-lg-7 col-md-6 col-sm-16">
                  <div class="h2-dashboard-txt pt40" style="margin-top:15px;">
                    </div>
                  </div> 
               </div>
            </div>
                  
         </section>

         <!--Footer Section Start--> 
         <?php if (isLoggedIn()): ?>  
         <div class="ftco-section wf100 pt80">
         <?php else: ?>
        <div class="ftco-section wf100">
        <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Function to update the dashboard with real-time carbon footprint data
function updateDashboard() {
    // Retrieve user inputs
    var transportation = parseFloat(document.getElementById("transportation").value);
    var energy = parseFloat(document.getElementById("energy").value);
    var diet = parseFloat(document.getElementById("diet").value);
    
    // Check if any of the input fields are empty
    if (isNaN(transportation) || isNaN(energy) || isNaN(diet)) {
        // Display an error message and return without calculating
        document.getElementById("totalCarbonFootprint").innerHTML = "<p>Please enter valid data for all fields.</p>";
        document.getElementById("emissionBreakdown").innerHTML = ""; // Clear previous breakdown
        return;
    }
    
    // Perform calculation
    var totalCarbonFootprint = transportation + energy + diet;

    // Store the calculated data in localStorage
    localStorage.setItem("totalCarbonFootprint", totalCarbonFootprint);
    localStorage.setItem("transportation", transportation);
    localStorage.setItem("energy", energy);
    localStorage.setItem("diet", diet);

    // Update total carbon footprint
    document.getElementById("totalCarbonFootprint").innerHTML = "<p>Total Carbon Footprint: " + totalCarbonFootprint + " kg CO2</p>";
    
    // Update emission breakdown
    var breakdownHTML = "<h3>Emission Breakdown:</h3>";
    breakdownHTML += "<ul>";
    breakdownHTML += "<li>Transportation: " + transportation + " kg CO2</li>";
    breakdownHTML += "<li>Energy Consumption: " + energy + " kg CO2</li>";
    breakdownHTML += "<li>Diet: " + diet + " kg CO2</li>";
    breakdownHTML += "</ul>";
    document.getElementById("emissionBreakdown").innerHTML = breakdownHTML;
  
    // Data visualization
    var ctx = document.createElement('canvas');
    document.getElementById("emissionBreakdown").innerHTML = "";
    document.getElementById("emissionBreakdown").appendChild(ctx);

    var emissionData = [transportation, energy, diet];
    var emissionLabels = ['Transportation', 'Energy Consumption', 'Diet'];
    var colors = ['#FF6384', '#36A2EB', '#FFCE56'];

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: emissionLabels,
            datasets: [{
                data: emissionData,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

// Function to load the dashboard data from localStorage
function loadDashboard() {
    var totalCarbonFootprint = localStorage.getItem("totalCarbonFootprint");
    var transportation = localStorage.getItem("transportation");
    var energy = localStorage.getItem("energy");
    var diet = localStorage.getItem("diet");

    // If data exists in localStorage, update the dashboard
    if (totalCarbonFootprint && transportation && energy && diet) {
        document.getElementById("transportation").value = transportation;
        document.getElementById("energy").value = energy;
        document.getElementById("diet").value = diet;
        updateDashboard();
    }
}

// Add event listener to the "Calculate" button
document.getElementById("calculateButton").addEventListener("click", updateDashboard);

// Load dashboard data on page load
window.addEventListener("load", loadDashboard);
  
</script>

  
</body>
</html>