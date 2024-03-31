<?php
// Start or resume session
session_start();

// Check if the request contains the updated event details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve event details from the POST data
    $eventId = $_POST['eventId'];
    $eventName = $_POST['eventName'];
    $organizers = $_POST['organizers'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Store updated event details in session variables
    $_SESSION['updatedOrganizers'] = $organizers;
    $_SESSION['updatedDate'] = $date;
    $_SESSION['updatedTime'] = $time;

    // Connect to your database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "bit210";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to update the event in the database
    $updateSql = "UPDATE events SET eventName = ?, organizers = ?, date = ?, time = ? WHERE eventId = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssi", $eventName, $organizers, $date, $time, $eventId);
    $updateStmt->execute();

    // Check if the update was successful
    if ($updateStmt->affected_rows > 0) {
        // Update successful, redirect to events.php with success message
        header("Location: events.php?success=updated&eventId=$eventId");
        exit();
    } else {
        // Update failed, try inserting as a new event
        $insertSql = "INSERT INTO events (eventId, eventName, organizers, date, time) VALUES (?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("issss", $eventId, $eventName, $organizers, $date, $time);
        $insertStmt->execute();

        // Check if the insert was successful
        if ($insertStmt->affected_rows > 0) {
            // Insert successful, redirect to events.php with success message
            header("Location: events.php?success=added&eventId=$eventId");
            exit();
        } else {
            // Insert failed, redirect to events.php with error message
            header("Location: events.php?error=insert_failed");
            exit();
        }

        // Close the insert statement
        $insertStmt->close();
    }

    // Close the update statement and database connection
    $updateStmt->close();
    $conn->close();
} else {
    // If the request method is not POST, return an error response
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>