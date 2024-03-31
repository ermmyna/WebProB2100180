<?php
// Start session or resume existing session
session_start();

// Check if eventId parameter is set and valid
if (isset($_POST['eventId']) && is_numeric($_POST['eventId'])) {
    $eventId = $_POST['eventId'];

    // Connect to the database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "bit210";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to delete event from database
    $deleteSql = "DELETE FROM events WHERE eventId = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $eventId);
    $deleteStmt->execute();

    // Check if deletion was successful
    if ($deleteStmt->affected_rows > 0) {
        // Return success response
        http_response_code(200);
        echo "Event deleted successfully.";
    } else {
        // Return error response
        http_response_code(500);
        echo "Error: Unable to delete event.";
    }

    // Close prepared statement and database connection
    $deleteStmt->close();
    $conn->close();
} else {
    // Return error response if eventId parameter is missing or invalid
    http_response_code(400);
    echo "Error: Invalid request.";
}
?>