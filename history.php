<?php
// Include the file containing database connection code
include("carbonCalculator.php");

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- CSS FILES START -->
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/notificationBell.css" rel="stylesheet">
    <link href="css/datePicker.css" rel="stylesheet"> 
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

        #lineChart{
        min-width: 400px;  /* Set the maximum width as needed */
        min-height: 300px; /* Set the maximum height as needed */
        margin:20px;
        }

        .custom-box-shadow {
        box-shadow: 0 10px 40px rgba(156, 204, 101, 0.3);
        }
    </style>
</head>
<body>
    <div class="wrapper home2">

        <!--Inner Header Start-->
        <section class="wf100 inner-header">
            <div class="container">
               <h1>Historical Tracking</h1>
            </div>
         </section>
         <!--Inner Header End--> 

    </div>
    <div class="container mt-9">
        <div class="row">
            <div class="col-md-12">
            <label for="dateRangePicker">Select Date Range:</label>
                <input type="text" id="dateRangePicker" name="dateRangePicker" />
            </div>
        </div>
        <div class="row">
            <!-- Line Chart Card -->
            <div class="col-md-12 col-lg-8">
                <div class="card custom-box-shadow">
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
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

    <!-- Javascript for date range picker -->
    <script>
        $(document).ready(function() {
            // Initialize the date range picker
            $('#dateRangePicker').daterangepicker({
                opens: 'left' // or 'right'
            }, function(start, end, label) {
                // Callback function when date range changes
                var startDate = start.format('YYYY-MM-DD');
                var endDate = end.format('YYYY-MM-DD');

                // AJAX request to fetch data based on the selected date range
                $.ajax({
                    url: 'fetch_history.php',
                    type: 'POST',
                    data: { startDate: startDate, endDate: endDate },
                    success: function(response) {
                        // Update line chart and radar chart with fetched data
                        updateCharts(response);
                    }
                });
            });
        });

        // Function to update charts with new data
        function updateCharts(data) {
            // Parse the JSON data received from the server
            var chartData = JSON.parse(data);

            // Update line chart
            lineChart.data.labels = chartData.months;
            lineChart.data.datasets[0].data = chartData.transportData;
            lineChart.data.datasets[1].data = chartData.foodData;
            lineChart.data.datasets[2].data = chartData.energyData;
            lineChart.update();

            // Update radar chart
            radarChart.data.datasets[0].data = Object.values(chartData.allMonthsData);
            radarChart.update();
        }

    </script>


    <!-- JavaScript for Line Chart -->
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
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
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

        const lineChart = new Chart(document.getElementById('lineChart'), lineConfig);
    </script>

    <!-- JavaScript for Radar Chart -->
    <script>
        const radarConfig = {
            type: 'radar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Total Carbon Footprint',
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
                        text: 'User Carbon Footprint Radar Chart'
                    }
                }
            }
        };

        const radarChart = new Chart(document.getElementById('radarChart'), radarConfig);
    </script>
</body>
</html>