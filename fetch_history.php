<?php
// Include the file containing database connection code
include("accounts.php");

// Function to check if the user is logged in
function isLoggedIn()
{
    if (isset($_SESSION['userID'])) {
        return true;
    } else {
        return false;
    }
}

// Check if the user is logged in
if (isLoggedIn()) {
    // Check if the required parameters are set
    if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
        // Retrieve user ID from session
        $userID = $_SESSION['userID'];
        
        // Sanitize and validate input dates
        $startDate = mysqli_real_escape_string($con, $_POST['startDate']);
        $endDate = mysqli_real_escape_string($con, $_POST['endDate']);

        // Query to fetch historical data based on the selected date range
        $sql = "SELECT
                    date,
                    carbonFootprintTransport,
                    carbonFootprintFood,
                    carbonFootprintEnergy,
                    totalCarbonFootprint
                FROM weeklyLog
                WHERE userID = $userID
                AND date BETWEEN '$startDate' AND '$endDate'
                ORDER BY date";

        $result = mysqli_query($con, $sql);

        // Initialize array to store historical data
        $historyData = array();

        // Fetch data and store in array
        while ($row = mysqli_fetch_assoc($result)) {
            $historyData[] = array(
                'date' => $row['date'],
                'carbonFootprintTransport' => $row['carbonFootprintTransport'],
                'carbonFootprintFood' => $row['carbonFootprintFood'],
                'carbonFootprintEnergy' => $row['carbonFootprintEnergy'],
                'totalCarbonFootprint' => $row['totalCarbonFootprint']
            );
        }

        // Close database connection
        mysqli_close($con);

        // Return historical data in JSON format
        echo json_encode($historyData);
    } else {
        // Parameters not set
        echo json_encode(array('error' => 'Parameters not set.'));
    }
} else {
    // User not logged in
    echo json_encode(array('error' => 'User not logged in.'));
}
?>
