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
$servername = "localhost:3307"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "bit210"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest data from the 'carbonCalculator' table
$sql = "SELECT * FROM weeklylog ORDER BY userID DESC LIMIT 1";
$result = $conn->query($sql);

// Process fetched data
if ($result->num_rows > 0) {
    // Retrieve the latest row
    $row = $result->fetch_assoc();

    // Assign carbon footprint data from the latest row to respective variables
    $userData = $row['userID'];
    $dateData = $row['date'];
    $weekNoData = $row['weekNo'];
    $monthData = $row['month'];
    $transportData = $row['carbonFootprintTransport'];
    $foodData = $row['carbonFootprintFood'];
    $energyData = $row['carbonFootprintEnergy'];
    $totalData = $row['totalCarbonFootprint'];

    // Calculate the highest carbon footprint value among the three categories
$maxCategoryFootprint = max($foodData, $energyData, $transportData);
$maxFootprint = max($maxCategoryFootprint, $totalData);

// Calculate recommendations based on the highest value among individual categories
$recommendations = array();
if ($maxCategoryFootprint == $foodData) {
    // If food category's value is the highest, provide food-related recommendations
    $recommendations[] = "-> Reduce <strong style='color: #8B0000;'>food</strong> waste to lower carbon footprint.";
    $recommendations[] = "-> Choose locally sourced and seasonal <strong style='color: #8B0000;'>foods</strong> to reduce carbon emissions from transportation.";
    $recommendations[] = "-> Consider plant-based <strong style='color: #8B0000;'>meals</strong> to reduce the carbon footprint associated with meat production.";
    } elseif ($maxCategoryFootprint == $energyData) {
    // If energy category's value is the highest, provide energy-related recommendations
    $recommendations[] = "-> Switch to renewable <strong style='color: #8B0000;'>energy</strong> sources to reduce carbon emissions.";
    $recommendations[] = "-> Install <strong style='color: #8B0000;'>energy</strong> -efficient appliances and lighting.";
    $recommendations[] = "-> Unplug electronic devices when not in use to save <strong style='color: #8B0000;'>energy</strong>.";
} elseif ($maxCategoryFootprint == $transportData) {
    // If transportation category's value is the highest, provide transportation-related recommendations
    $recommendations[] = "-> Use public <strong style='color: #8B0000;'>transportation</strong>, bike, or walk instead of driving alone.";
    $recommendations[] = "-> Consider carpooling or ride-sharing to reduce <strong style='color: #8B0000;'>transportation</strong> emissions.";
    $recommendations[] = "-> Plan and combine errands to minimize <strong style='color: #8B0000;'>trips</strong>.";
} elseif ($maxCategoryFootprint == $totalData) {
    // If total carbon footprint has the highest value, provide general recommendations
    $recommendations[] = "-> Reduce, reuse, and recycle to minimize carbon footprint.";
    $recommendations[] = "-> Conserve water and reduce water waste to lower carbon emissions associated with water treatment and distribution.";
    $recommendations[] = "-> Support businesses and products with sustainable practices.";
}

// Add a gap
$recommendations[] = "<br><br>";

// Add total carbon footprint recommendations
$recommendations[] = "-> Monitor and track your total carbon footprint regularly to identify areas for improvement.";
$recommendations[] = "-> Set goals to reduce your overall carbon footprint over time.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carbon Footprint Recommendations</title>
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
                           <a class="nav-link" href="events.php">Events</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbonCalculator.php">Calculator</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbon_dash.php">Dashboard</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="display4.php">Learn</a>
                       </li>
                       <?php if (isLoggedIn()): ?>
                       <li class="nav-item">
                           <a class="nav-link" href="activity_log.php">Activity Log</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="history.php">History</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="socialInt(shareAchievement).html">Social</a>
                       </li>
                       <?php endif; ?>
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
                               <a href="socialInt(chat).php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Chat Room</p>
                               </a>
                           </li>
                           <li class="sub-item">
                               <a href="socialInt(shareAchivement).php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Share Achievements</p>
                               </a>
                           </li>
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
      <!-- Header End -->

          <!--Inner Header Start-->
          <section class="wf100 inner-header">
            <div class="container">
               <h1>Carbon Footprint Recommendations</h1><br><Br><br><Br>
               <h1>From Dashboard</h1>
               
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
                        $transportData = [];
                        $foodData = [];
                        $energyData = [];
                        $totalFootprintData = [];

                    if ($historicalResult && mysqli_num_rows($historicalResult) > 0) {
                        while ($row = mysqli_fetch_assoc($historicalResult)) {
                            $weeklyLabels[] = "Week " . $row['weekNo'];
                            $transportonData[] = $row['carbonFootprintTransport'];
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

        <!-- Footer Section -->
        <footer class="footer-03">
            <div class="container">
                <!-- Footer Content -->
            </div>
        </footer>
        <!-- Footer Section End -->
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

                  </div>
                  </div>
               </div>
              <div class="row">
                 <div class="col-lg-7 col-md-6 col-sm-16" style="padding-left:20px;">
                  <div class="h2-dashboard-txt">
                  </div>
              </div>
              <div class="row ">
                  <div class="col-lg-5 col-md-6 col-sm-6">
                     <img src="images/dash.jpg"  style = "height:78%; margin-right:50px;"alt="">
                  </div>
                  
                  <!-- Content Section -->
<div class="container">
    <div class="center" style="margin-left: 40px;"> <!-- Adjust margin-left as needed -->
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 7px 12px; /* Added extra padding on the right side */
            }
            th {
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            .highlight-row{
                background-color: lightgreen;
            }
        </style>
        <table>
    <tr>
        <th>User</th>
        <th>Month</th>
        <th>Category</th>
        <th>Carbon Footprint (kgCO2e)</th>
        <th>Recommendations</th>
    </tr>
    <tr>
        <td rowspan="4"><?php echo $userData; ?></td>
        <td rowspan="4"><?php echo $monthData; ?></td>
        <td>Food</td>
        <td><?php echo $foodData; ?></td>
        <td rowspan="5">
            <ul>
                <?php foreach ($recommendations as $recommendation): ?>
                    <li><?php echo $recommendation; ?></li>
                <?php endforeach; ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td>Energy</td>
        <td><?php echo $energyData; ?></td>
    </tr>
    <tr>
        <td>Transportation</td>
        <td><?php echo $transportData; ?></td>
    </tr>
    <tr class="highlight-row">
        <td colspan="1"><strong>Total Carbon Footprint</strong></td>
        <td><strong><?php echo $maxFootprint; ?></strong></td>
    </tr>
</table>

    
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
</html>