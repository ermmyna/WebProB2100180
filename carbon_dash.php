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
               <h1>CarbonFootprint Dashboard</h1>
            </div>
         </section>
         <!--Inner Header End--> 

         

         <?php if (isLoggedIn()): ?>
            <?php

                $userID = $_SESSION['userID'];

                // Check if $con is defined and is a valid mysqli connection
                if (isset($con) && $con instanceof mysqli && !$con->connect_error) {
                    
                    $latestWeekEntered = weeklyLogUpToDate($con);

                    // DASHBOARD CARD CALCULATION 
                    // Query to calculate cumulative total for food
                    $foodQuery = "SELECT SUM(carbonFootprintFood) AS totalFood FROM weeklylog WHERE userID = '$userID'";
                    $foodResult = mysqli_query($con, $foodQuery);
                    $totalFood = 0;

                    if ($foodResult && mysqli_num_rows($foodResult) > 0) {
                        $totalFoodRow = mysqli_fetch_assoc($foodResult);
                        $totalFood = $totalFoodRow['totalFood'];
                    }

                    // Query to calculate cumulative total for transport
                    $transportQuery = "SELECT SUM(carbonFootprintTransport) AS totalTransport FROM weeklylog WHERE userID = '$userID'";
                    $transportResult = mysqli_query($con, $transportQuery);
                    $totalTransport = 0;

                    if ($transportResult && mysqli_num_rows($transportResult) > 0) {
                        $totalTransportRow = mysqli_fetch_assoc($transportResult);
                        $totalTransport = $totalTransportRow['totalTransport'];
                    }

                    // Query to calculate cumulative total for energy
                    $energyQuery = "SELECT SUM(carbonFootprintEnergy) AS totalEnergy FROM weeklylog WHERE userID = '$userID'";
                    $energyResult = mysqli_query($con, $energyQuery);
                    $totalEnergy = 0;

                    if ($energyResult && mysqli_num_rows($energyResult) > 0) {
                        $totalEnergyRow = mysqli_fetch_assoc($energyResult);
                        $totalEnergy = $totalEnergyRow['totalEnergy'];
                    }

                    $overallQuery = "SELECT SUM(totalCarbonFootprint) AS totalOverall FROM weeklylog WHERE userID = '$userID'";
                    $overallResult = mysqli_query($con, $overallQuery);
                    $totalOverall = 0;

                    if ($overallResult && mysqli_num_rows($overallResult) > 0) {
                        $totalOverallRow = mysqli_fetch_assoc($overallResult);
                        $totalOverall = $totalOverallRow['totalOverall'];
                    }

                    // DOUGHNUT CHART CALCULATION 
                   
                    if (!$latestWeekEntered) {
                        echo<<<alert
                        <div class="container alert alert-danger alert-dismissible text-center custom-alert" style=" margin-top: 15%; padding:5px; height:40px; width:70%;" id="alert-msg" role="alert">
                            <strong>No data found for the latest week. Please update your <a href="activity_log.php" class="alert-link" style="text-decoration: underline;">activity log</a> for this week</strong>
                        </div>
                        alert;
                    }
                   
                    else{
                        $selectQuery = "SELECT * FROM weeklylog WHERE userID = '$userID' ORDER BY date DESC LIMIT 1";

                        $result = mysqli_query($con, $selectQuery);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            // Extract carbon footprint data for the latest week
                            $carbonFootprintData = [
                                "total" => $row['totalCarbonFootprint'],
                                "transport" => $row['carbonFootprintTransport'],
                                "food" => $row['carbonFootprintFood'],
                                "energy" => $row['carbonFootprintEnergy']
                            ];
                        
                            $latestWeekNumber = $row['weekNo'];
                            $currentMonth = $row['month'];
                        }
                        
                    }
                 
                } else {
                    // Handle the case where $con is not defined or is not a valid mysqli connection
                    echo "Database connection is not established or is invalid.";
                }


                    // LINE GRAPH CALCULATION 
                    // Retrieve historical carbon footprint data for the logged-in user for the current month
                    $latestMonthDataQuery = "SELECT DISTINCT month FROM weeklylog WHERE userID = '$userID' ORDER BY date DESC LIMIT 1";
                    $latestMonthResult = mysqli_query($con, $latestMonthDataQuery);

                    if ($latestMonthResult && mysqli_num_rows($latestMonthResult) > 0) {
                        $latestMonthRow = mysqli_fetch_assoc($latestMonthResult);
                        $currentMonth = $latestMonthRow['month'];
                    } else {
                        // If no data found, set a default month (you may adjust this according to your needs)
                        $currentMonth = date('F');
                    }


                        $historicalDataQuery = "SELECT weekNo, carbonFootprintTransport, carbonFootprintFood, carbonFootprintEnergy, totalCarbonFootprint FROM weeklylog WHERE userID = '$userID' AND month = '$currentMonth' ORDER BY weekNo";

                        $historicalResult = mysqli_query($con, $historicalDataQuery);

                        $weeklyLabels = [];
                        $transportationData = [];
                        $foodData = [];
                        $energyData = [];
                        $totalFootprintData = [];

                    if ($historicalResult && mysqli_num_rows($historicalResult) > 0) {
                        while ($row = mysqli_fetch_assoc($historicalResult)) {
                            $weeklyLabels[] = "Week " . $row['weekNo'];
                            $transportationData[] = $row['carbonFootprintTransport'];
                            $foodData[] = $row['carbonFootprintFood'];
                            $energyData[] = $row['carbonFootprintEnergy'];
                            $totalFootprintData[] = $row['totalCarbonFootprint'];
                        }
                    } 

                    $checkRecordsQuery = "SELECT COUNT(*) AS totalRecords
                     FROM weeklylog
                     WHERE userID = '$userID'
                     AND (carbonFootprintFood IS NOT NULL OR totalCarbonFootprint IS NOT NULL OR carbonFootprintEnergy IS NOT NULL or carbonFootprintTransport)";
                    $checkRecordsResult = mysqli_query($con, $checkRecordsQuery);
                    $row = mysqli_fetch_assoc($checkRecordsResult);
                                    
                ?>

                  <?php
                        if (!empty($errors)) {
                              echo '<div class="alert alert-danger" role="alert">';
                              foreach ($errors as $error) {
                                 echo $error . '<br>';
                              }
                              echo '</div>';
                        }

                    ?>
       
        <?php if($row['totalRecords'] <= 0): ?>
            <!-- Display pop-up alert for new users -->
        <script>
            alert("Welcome! Please go to the activity log and fill it up to see your dashboard.");
            window.location.href = 'activity_log.php';
        </script>
        <?php else: ?>
            <!--Dashboard card start--> 
            <div class="container flex items-center justify-center p-5">
            <section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl">
                <div class=" dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-red-400 to-red-500 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold">
                    <?php echo number_format($totalFood,2) ?>
                     <span class="text-sm">kgCO2e</span>
                </div>
                <div class="relative z-10 text-red-200 leading-none font-semibold">Food</div>
                <i class="food_icon"> <img src="https://cdn-icons-png.flaticon.com/128/308/308556.png"></i>
                </div>
             

                <div class=" dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-green-400 to-green-600 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold">
                    <?php echo number_format($totalEnergy,2) ?>
                     <span class="text-sm">kgCO2e</span>
                </div>
                <div class="relative z-10 text-green-200 leading-none font-semibold">Energy</div>
                <i class="energy_icon"> <img src="https://cdn-icons-png.flaticon.com/128/1835/1835596.png"></i>
                </div>
                

                <div class=" dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-blue-400 to-blue-600 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold">
                    <?php echo number_format($totalTransport,2) ?> 
                     <span class="text-sm">kgCO2e</span>
                </div>
                <div class="relative z-10 text-blue-200 leading-none font-semibold">Transport</div>
                <i class="transport_icon"> <img src="https://cdn-icons-png.flaticon.com/128/1723/1723597.png"></i>
                </div>
                
                <div class=" dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-orange-400 to-orange-600 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold">
                    <?php echo number_format($totalOverall,2) ?> 
                     <span class="text-sm">kgCO2e</span>
                </div>
                <div class="relative z-10 text-orange-200 leading-none font-semibold">Total Footprint</div>
                <i class="add_icon"> <img src="https://cdn-icons-png.flaticon.com/128/992/992651.png"></i>
                </div>
              
               
            </div>
        </section>
       </div>
       <!--Dashboard card end--> 

        <div class="container mt-9">
            <div class="row">
                <!-- Donut Chart Card -->
                <div class="col-md-12 col-lg-4 mb-3 mb-md-0">
                    <div class="card custom-box-shadow">
                        <div class="card-body">
                            <canvas id="donutChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Line Chart Card -->
                <div class="col-md-12 col-lg-8">
                    <div class="card custom-box-shadow">
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php endif; ?>
    <?php else: ?>
            <section class="page404 wf100 p80">
            <div class="container">
               <div class="row ">
                  <div class="col-lg-5 col-md-6 col-sm-6" style="padding-bottom:20px;">
                     <img src="images/log.jpg"  style = "height:75%; margin-right:50px;"alt="">
                  </div>
                  <div class="col-lg-7 col-md-6 pt40 col-sm-16">
                  <div class="h2-dashboard-txt">
                     <h3><b>Hello There!</b></h3>
                     <h6>We see that you want to make a change by tracking your Carbon Footprint</h6>
                     <p> To get started, the <b>1st step</b> is to create an account. Click on the <b>"Login"</b> button on the Navigation bar at the top or the <b>"Sign up"</b> button below and provide the necessary information to set up your EcoTrace account. Creating an account will allow you to log and track your daily activities, making it easier to monitor and reduce your carbon footprint.</p>
                     <a class="aboutus" href="login.php">Sign up</a> 
                  </div>
                  </div>
               </div>
              <div class="row">
                 <div class="col-lg-7 col-md-6 col-sm-16" style="padding-left:20px;">
                  <div class="h2-dashboard-txt">
                     <h3><b>Ready to Make a Difference?</b></h3>
                     <h6>Log Your Daily Activities for Precise Carbon Tracking.</h6>
                     <p> Now that you have an account, proceed to the <b>"Activity Log"</b> page on the nav. Here, you can log various aspects of your daily routine, including transportation, energy usage, and food consumption. <b>Don't worry;</b> it's a straightforward process that contributes significantly to your commitment to sustainability.</p>
                  </div>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-6" style="margin-top:20px;">
                    <img src="https://media.tenor.com/MlHKXX_Uh40AAAAj/klick-click.gif" style=" width:40px;position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                    <!-- Image to be Clicked -->
                    <img class="navPic" src="images/activitynav.png" style="height: 40%;" alt="">     
                 </div>
              </div>
              <div class="row ">
                  <div class="col-lg-5 col-md-6 col-sm-6">
                     <img src="images/dash.jpg"  style = "height:78%; margin-right:50px;"alt="">
                  </div>
                  <div class="col-lg-7 col-md-6 col-sm-16">
                  <div class="h2-dashboard-txt pt40" style="margin-top:15px;">
                     <h3><b>Track and Analyze Your Carbon Footprint</b></h3>
                     <h6>Unlock Powerful Insights for a Greener Lifestyle.</h6>
                     <p> <b>Congratulations</b> on logging your activities! Head over to the <b>"Dashboard"</b> page in the navigation while logged into your account to visualize your carbon footprint. Here, you can <b>track your weekly and overall monthly carbon footprint </b>. The intuitive charts and graphs provide valuable insights into your environmental impact. Use this information to make informed decisions and explore ways to reduce your carbon footprint further.</p>
                  </div>
                  </div> 
               </div>
               <div class="h2-dashboard-txt wf100" style="text-align: center;">
                    <a href="index.php"><i class="fas fa-home"></i> Go Home </a>
                  </div>
            </div>
                  
         </section>
        <?php endif; ?>


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

            <script>
                // Get the carbon footprint data from PHP
                var transportationData = <?php echo $carbonFootprintData['transport']; ?>;
                var foodData = <?php echo $carbonFootprintData['food']; ?>;
                var energyData = <?php echo $carbonFootprintData['energy']; ?>;
                var week = <?php echo $latestWeekNumber; ?>;
                var weekLabels = <?php echo json_encode($weeklyLabels); ?>;
                var totalFootprintData = <?php echo json_encode($totalFootprintData); ?>;
                var month = <?php echo json_encode($currentMonth); ?>;
            
               // Create a donut chart
var donutCtx = document.getElementById('donutChart').getContext('2d');
var donutChart = new Chart(donutCtx, {
    type: 'doughnut',
    data: {
        labels: ['Food', 'Energy', 'Transportation'],
        datasets: [{
            data: [foodData, energyData, transportationData], // Numeric values only
            backgroundColor: ['red', 'green', 'blue']
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: ' Week ' + week,
                color:'#66bb6a',
                font: {
                    size: 18, 
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed && context.parsed.toFixed) {
                            label += context.parsed.toFixed(2) + ' kgCO2e';
                        }
                        return label;
                    }
                }
            }
        },
        legend: {
            display: true,
            position: 'top'
        },
        responsive: true,
        maintainAspectRatio: false,
    }
});

// Create a line chart
var delayed = false;
var lineCtx = document.getElementById('lineChart').getContext('2d');
var lineChart = new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: weekLabels,
        datasets: [{
            label: 'Total Carbon Footprint',
            borderColor: '#FFD700',
            backgroundColor :'rgba(255, 215, 0, 0.5)',
            pointRadius: 5,
            data: totalFootprintData
        }]
    },
    options: {
        animation: {
            onComplete: () => {
                delayed = true;
            },
            delay: (context) => {
                let delay = 0;
                if (context.type === 'data' && context.mode === 'default' && !delayed) {
                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
            },
        },
        scales: {
            x:{
                display:true,
                title:{
                    display:true,
                    text:'Weeks'
                }
            },
            y: {
                beginAtZero: true,
                stepSize: 10,
                suggestedMin: 0,
                suggestedMax: 200,
                maxTicksLimit: 5,
                display:true,
                title:{
                    display:true,
                    text:'Carbon Footprint'
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Carbon Footprint Trend for ' + month,
                color:'#66bb6a',
                font: {
                    size: 18, 
                }
            }
        },
        legend: {
            display: true,
            position: 'bottom'
        },
        responsive: true,
        maintainAspectRatio: false,
        onClick: handleLineChartClick
    }
});


                var preloadedData = {};
                <?php
                // Loop through each week's data and add it to the preloadedData object
                foreach ($weeklyLabels as $index => $label) {
                    $transport = $transportationData[$index];
                    $food = $foodData[$index];
                    $energy = $energyData[$index];

                    // Use json_encode to ensure correct representation in JavaScript
                    echo "preloadedData['$label'] = " . json_encode(['transport' => $transport, 'food' => $food, 'energy' => $energy]) . ";\n";
                }
                ?>

                function handleLineChartClick(event, elements) {
                    if (elements.length > 0) {
                        // Get the clicked index
                        var clickedIndex = elements[0].index;

                        // Update doughnut chart data for the clicked week
                        updateDonutChart(clickedIndex);
                    }
                }

                // Update the doughnut chart based on the clicked week
            function updateDonutChart(clickedIndex) {
                // Get the clicked week label
                var clickedWeekLabel = weekLabels[clickedIndex];

                // Get the preloaded data for the clicked week
                var clickedWeekData = preloadedData[clickedWeekLabel];

                // Update the doughnut chart
                donutChart.data.labels = ['Transportation', 'Food', 'Energy'];
                donutChart.data.datasets[0].data = [clickedWeekData.transport, clickedWeekData.food, clickedWeekData.energy];

                // Update the title of the doughnut chart to display the clicked week
                donutChart.options.plugins.title.text = clickedWeekLabel;

                // Finally, update the doughnut chart
                donutChart.update();
            }

            </script>
   </body>
    </head>
    </html>