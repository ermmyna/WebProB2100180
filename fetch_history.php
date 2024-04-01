<?php

// Include database connection or any necessary functions
require("connection.php");

// Check if the selected month is set and not empty
if(isset($_POST['selectedMonth']) && !empty($_POST['selectedMonth'])) {
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
} else {
    // Error handling if selected month is not set or empty
    $response = array(
        'success' => false,
        'message' => 'Selected month is missing or empty.'
    );
    echo json_encode($response);
}

?>
