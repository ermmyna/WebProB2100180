<?php
// Include the file containing database connection code
include("fetch_history.php");

// Function to check if the user is logged in
function isLoggedIn()
{
    if (isset($_SESSION['userID'])) {
        return true;
    } else {
        return false;
    }
}

// Check for and display any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the current month and week
$currentMonth = date('F'); // Full month name, e.g., January
$currentWeek = 'Week ' . ceil(date('j') / 7); // Calculate the week based on the current day

// Function to fetch months for which the user has data
function getMonthsWithData($userID, $con) {
    $sql = "SELECT DISTINCT MONTHNAME(date) AS month FROM weeklyLog WHERE userID = $userID";
    $result = mysqli_query($con, $sql);
    $months = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $months[] = $row['month'];
    }
    return $months;
}

// Function to fetch weeks for the selected month and for which the user has data
function getWeeksWithData($userID, $selectedMonth, $con) {
    $sql = "SELECT DISTINCT weekNo FROM weeklyLog WHERE userID = $userID AND MONTHNAME(date) = '$selectedMonth'";
    $result = mysqli_query($con, $sql);
    $weeks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $weeks[] = 'Week ' . $row['weekNo'];
    }
    return $weeks;
}


// Initialize arrays to store data for the line chart
$months = [];
$transportData = [];
$foodData = [];
$energyData = [];


// Fetch data from the database only for the logged-in user
if (isLoggedIn()) {
    $userID = $_SESSION['userID'];
    
    $sql = "SELECT
                MONTH(date) AS month,
                SUM(CASE WHEN userID = $userID THEN carbonFootprintTransport ELSE 0 END) AS carbonFootprintTransport,
                SUM(CASE WHEN userID = $userID THEN carbonFootprintFood ELSE 0 END) AS carbonFootprintFood,
                SUM(CASE WHEN userID = $userID THEN carbonFootprintEnergy ELSE 0 END) AS carbonFootprintEnergy
            FROM weeklyLog
            WHERE userID = $userID
            GROUP BY MONTH(date)";
    
    $result = mysqli_query($con, $sql);

    // Fetch and format data for the line chart
    while ($row = mysqli_fetch_assoc($result)) {
        // Get the month number
        $monthNumber = $row['month'];
        
        // If any of the carbon footprint data is non-zero, include the month in the chart
        if ($row['carbonFootprintTransport'] != 0 || $row['carbonFootprintFood'] != 0 || $row['carbonFootprintEnergy'] != 0) {
            // Get the month name from the numeric month value
            $monthName = date("F", mktime(0, 0, 0, $monthNumber, 1));
            
            // Store the month name instead of the numeric value
            $months[] = $monthName;
            
            // Store the carbon footprint data
            $transportData[] = $row['carbonFootprintTransport'];
            $foodData[] = $row['carbonFootprintFood'];
            $energyData[] = $row['carbonFootprintEnergy'];
        }
    }

    // Initialize an array to store carbon footprint data for all months
    $allMonthsData = [];

    // Fetch data for all months
    $sqlAllMonths = "SELECT
                        MONTH(date) AS month,
                        SUM(CASE WHEN userID = $userID THEN totalCarbonFootprint ELSE 0 END) AS totalCarbonFootprint
                    FROM weeklyLog
                    WHERE userID = $userID
                    GROUP BY MONTH(date)";

    $resultAllMonths = mysqli_query($con, $sqlAllMonths);

    // Fetch and format data for all months
    while ($rowAllMonths = mysqli_fetch_assoc($resultAllMonths)) {
        // Get the month number
        $monthNumberAllMonths = $rowAllMonths['month'];
        
        // Calculate the total carbon footprint for the month
        $allMonthsData[$monthNumberAllMonths] = $rowAllMonths['totalCarbonFootprint'];
        
    }
} else {
    // Handle case when user is not logged in
    // You may redirect the user to the login page or show a message
    echo "User not logged in";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/EcoTrace Logo.png" style="width: 50px;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=320" />
    <title>Historical Tracking</title> 
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

    <!-- Libraries for date range picker and filtration function -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

    <style>
        .card {
            margin-top: 50px;
        }

        #overviewLineChart{
        min-width: 400px;  /* Set the maximum width as needed */
        min-height: 300px; /* Set the maximum height as needed */
        margin:20px;
        }

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
        color: green; /* Change to your desired color */
        opacity: 0.1;
        }

        .energy_icon{
        position: absolute;
        right: 0;
        bottom: 0;
        height: 92px;
        width: 92px;
        margin-bottom: -10px;
        color: blue; /* Change to your desired color */
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
        color: red; /* Change to your desired color */
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
        color: yellow; /* Change to your desired color */
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
                           <a class="nav-link" href="#about">About</a>
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
                           <a class="nav-link" href="#">Learn</a>
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
               <h1>Historical Tracking</h1>
            </div>
        </section>
         <!--Inner Header End--> 
        
         <div class="container">
         <div class="row justify-content-center" style="padding-top: 45px">
                <div class="h2-about-txt">
                    <h3 class="mb-0"><b>Overview</b></h3>
                </div>
                    </div>

            <!-- Line Chart and Radar Chart -->
            <div class="row">
                <!-- Line Chart Card -->
                <div class="col-md-12 col-lg-8">
                    <div class="card custom-box-shadow">
                        <div class="card-body">
                            <canvas id="overviewLineChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Radar Chart Card -->
                <div class="col-md-12 col-lg-4 mb-3 mb-md-0">
                    <div class="card custom-box-shadow">
                        <div class="card-body">
                            <canvas id="radarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Initialize the line chart and radar chart here
                // Add event listener for the change in month and week selection
                $('select[name="month"], select[name="week"]').change(function() {
                    // Get the selected month and week
                    var selectedMonth = $('select[name="month"]').val();
                    var selectedWeek = $('select[name="week"]').val();

                    // You can use the selectedMonth and selectedWeek values
                    // to update your charts or fetch specific data accordingly
                    // Perform AJAX request or update charts directly here
                });
            });
        </script>

    </div>

    <!-- JavaScript for Overview Line Chart -->
    <script>
        const lineConfig = {
            type: 'line',
            data: {
                labels: <?php echo json_encode($months); ?>,
                datasets: [
                    {
                        label: 'Transport',
                        data: <?php echo json_encode($transportData); ?>,
                        borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    },
                    {
                        label: 'Food',
                        data: <?php echo json_encode($foodData); ?>,
                        borderColor: 'rgb(54, 162, 235)',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    },
                    {
                        label: 'Energy',
                        data: <?php echo json_encode($energyData); ?>,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0w.5)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Carbon Footprint Tracking'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'kgCO2e'
                        }
                    }
                }
            }
        };

        const overviewLineChart = new Chart(document.getElementById('overviewLineChart'), lineConfig);
    </script>

    <!-- JavaScript for Radar Chart -->
    <script>
        const radarConfig = {
            type: 'radar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Total Carbon Footprint (kgCO2e)',
                        data: <?php echo json_encode(array_values($allMonthsData)); ?>, // Use array_values to ensure the correct order of months
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Carbon Footprint'
                    }
                }
            }
        };

        const radarChart = new Chart(document.getElementById('radarChart'), radarConfig);
    </script>

    <div class="row justify-content-center" style="padding-top: 45px">
        <div class="h2-about-txt">
            <h3 class="mb-0"><b>Your Past Activity</b></h3>
        </div>
    </div>
    <!-- Select Month and Week -->
    <div class="row justify-content-center" style="padding-top: 20px">
        <div>
            <select name="month" class="form-control">
                <?php
                $monthsWithData = getMonthsWithData($userID, $con);
                foreach ($monthsWithData as $month) {
                    echo "<option value='$month' " . ($month == $currentMonth ? 'selected' : '') . ">$month</option>";
                }
                ?>
            </select>
        </div>
        <div style="padding-left: 10px;">
            <select name="week" class="form-control">
                <?php
                $currentMonthWeeks = getWeeksWithData($userID, $currentMonth, $con);
                foreach ($currentMonthWeeks as $week) {
                    echo "<option value='$week' " . ($week == $currentWeek ? 'selected' : '') . ">$week</option>";
                }
                ?>
            </select>
        </div>
        <div style="padding-left: 10px;">
            <button id="showActivityBtn" class="btn btn-primary">Show Activity</button>
        </div>
    </div>

    <!-- JavaScript for fetching data based on selected month and week -->
    <script>
        $(document).ready(function () {
            // Trigger AJAX request when page loads to fetch data for the current week
            fetchData();

            // Event listener for change in month and week selection
            $('select[name="month"], select[name="week"]').change(function () {
                // Trigger AJAX request when month or week selection changes
                fetchData();
            });

            // Event listener for "Show Activity" button click
            $('#showActivityBtn').click(function () {
                // Trigger AJAX request when "Show Activity" button is clicked
                fetchData();
            });

            // Function to fetch data based on selected month and week
            function fetchData() {
                var selectedMonth = $('select[name="month"]').val();
                var selectedWeek = $('select[name="week"]').val();

                // AJAX request to fetch data for the selected month and week
                $.ajax({
                    url: 'fetch_history.php',
                    type: 'POST',
                    data: {
                        selectedMonth: selectedMonth,
                        selectedWeek: selectedWeek
                    },
                    dataType: 'json',
                    success: function (response) {
                        // Update card elements with fetched data
                        $('#foodData').html(number_format(response.carbonFootprintFood, 2) + '<span class="text-sm">kgCO2e</span>');
                        $('#energyData').html(number_format(response.carbonFootprintEnergy, 2) + '<span class="text-sm">kgCO2e</span>');
                        $('#transportData').html(number_format(response.carbonFootprintTransport, 2) + '<span class="text-sm">kgCO2e</span>');
                        $('#totalFootprintData').html(number_format(response.totalCarbonFootprint, 2) + '<span class="text-sm">kgCO2e</span>');
                    },
                    error: function () {
                        // Handle error
                        alert('Failed to fetch data. Please try again.');
                    }
                });
            }

            // Function to format number with commas for thousands separator
            function number_format(number, decimals) {
                return parseFloat(number).toFixed(decimals).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        });
    </script>

    <!-- Carbon Footprint Cards -->
    <div class="container flex items-center justify-center p-5">
        <section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl">
            <div class="dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-teal-400 to-green-500 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold" id="foodData">
                    <!-- Food carbon footprint will be loaded dynamically -->
                </div>
                <div class="relative z-10 text-green-200 leading-none font-semibold">Food</div>
                <i class="food_icon"> <img src="https://cdn-icons-png.flaticon.com/128/308/308556.png"></i>
            </div>

            <div class="dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-blue-400 to-blue-600 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold" id="energyData">
                    <!-- Energy carbon footprint will be loaded dynamically -->
                </div>
                <div class="relative z-10 text-blue-200 leading-none font-semibold">Energy</div>
                <i class="energy_icon"> <img src="https://cdn-icons-png.flaticon.com/128/1835/1835596.png"></i>
            </div>

            <div class="dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-red-400 to-red-600 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold" id="transportData">
                    <!-- Transport carbon footprint will be loaded dynamically -->
                </div>
                <div class="relative z-10 text-red-200 leading-none font-semibold">Transport</div>
                <i class="transport_icon"> <img src="https://cdn-icons-png.flaticon.com/128/1723/1723597.png"></i>
            </div>

            <div class="dashboard-card relative p-5 flex flex-col items-left justify-center h-20 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-md overflow-hidden">
                <div class="relative z-10 mb-2 text-white text-2xl leading-none font-semibold" id="totalFootprintData">
                    <!-- Total carbon footprint will be loaded dynamically -->
                </div>
                <div class="relative z-10 text-yellow-200 leading-none font-semibold">Total Footprint</div>
                <i class="add_icon"> <img src="https://cdn-icons-png.flaticon.com/128/992/992651.png"></i>
            </div>

        </section>
    </div>
    <!-- Carbon Footprint Cards End -->

    <!-- JavaScript for fetching data for cards based on selected month and week -->
    <script>
        // Event listener for change in month and week selection
        $('select[name="month"], select[name="week"]').change(function () {
            var selectedMonth = $('select[name="month"]').val();
            var selectedWeek = $('select[name="week"]').val();
            
            // AJAX request to fetch data for the selected month and week
            $.ajax({
                url: 'fetch_history.php',
                type: 'POST',
                data: {
                    selectedMonth: selectedMonth,
                    selectedWeek: selectedWeek
                },
                dataType: 'json',
                success: function (response) {
                    // Update card elements with fetched data
                    $('#foodData').html(number_format(response.carbonFootprintFood, 2) + '<span class="text-sm">kgCO2e</span>');
                    $('#energyData').html(number_format(response.carbonFootprintEnergy, 2) + '<span class="text-sm">kgCO2e</span>');
                    $('#transportData').html(number_format(response.carbonFootprintTransport, 2) + '<span class="text-sm">kgCO2e</span>');
                    $('#totalFootprintData').html(number_format(response.totalCarbonFootprint, 2) + '<span class="text-sm">kgCO2e</span>');
                },
                error: function () {
                    // Handle error
                    alert('Failed to fetch data. Please try again.');
                }
            });
        });

        // Function to format number with commas for thousands separator
        function number_format(number, decimals) {
            return parseFloat(number).toFixed(decimals).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

       

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
                    labels: ['Transportation', 'Food', 'Energy'],
                    datasets: [{
                        data: [transportationData, foodData, energyData],
                        backgroundColor: ['#FF4F4B', '#4CAF50', '#2196F3']
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

                            y: {
                                beginAtZero: true,
                                stepSize: 10,
                                suggestedMin: 0,
                                suggestedMax: 200,
                                maxTicksLimit: 5
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