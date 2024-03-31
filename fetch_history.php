<?php
// Include the file containing database connection code
include("carbon_calc.php");

// For Overview
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

// Past Activity PHP
// Check if the user is logged in
if (isLoggedIn()) {
    // Check if the required parameters (month and week) are set
    if (isset($_POST['selectedMonth']) && isset($_POST['selectedWeek'])) {
        // Retrieve user ID from session
        $userID = $_SESSION['userID'];
        
        // Sanitize and prepare the selected month value
    $selectedMonth = mysqli_real_escape_string($con, $_POST['selectedMonth']); // Assuming $con is your database connection

    // Fetch weeks for the selected month from the database
    $sql = "SELECT DISTINCT weekNo FROM weeklyLog WHERE MONTHNAME(date) = '$selectedMonth'";
    $result = mysqli_query($con, $sql);

    if($result) {
        // Initialize an array to store the weeks
        $weeks = array();

        // Fetch and store the weeks in the array
        while($row = mysqli_fetch_assoc($result)) {
            $weeks[] = 'Week ' . $row['weekNo'];
        }

        // Prepare JSON response
        $response = array(
            'success' => true,
            'weeks' => $weeks
        );

        // Output JSON response
        echo json_encode($response);
    } else {
        // Error handling if query fails
        $response = array(
            'success' => false,
            'message' => 'Failed to fetch weeks from the database.'
        );
        echo json_encode($response);
    }

        // Query to fetch historical data based on the selected month and week
        $sql = "SELECT
                    carbonFootprintTransport,
                    carbonFootprintFood,
                    carbonFootprintEnergy,
                    totalCarbonFootprint
                FROM weeklyLog
                WHERE userID = $userID
                AND MONTH(date) = $selectedMonth
                AND WeekNo = $selectedWeek";

        $result = mysqli_query($con, $sql);

        // Initialize array to store fetched data
        $historyData = array();

        // Fetch data and store in array
        if ($row = mysqli_fetch_assoc($result)) {
            $historyData = array(
                'carbonFootprintTransport' => $row['carbonFootprintTransport'],
                'carbonFootprintFood' => $row['carbonFootprintFood'],
                'carbonFootprintEnergy' => $row['carbonFootprintEnergy'],
                'totalCarbonFootprint' => $row['totalCarbonFootprint']
            );
        } else {
            // No data found for the selected week
            $historyData['error'] = 'No data found for the selected week.';
        }

        // Return fetched data in JSON format
        echo json_encode($historyData);
    } else {
        // Required parameters not set
        echo json_encode(array('error' => 'Please select both month and week.'));
    }
} else {
    // User not logged in
    echo json_encode(array('error' => 'User not logged in.'));
}


?>
