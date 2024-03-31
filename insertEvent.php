<?php
// Database connection parameters
$servername = "localhost:3307";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "bit210"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get event details from POST data
    $eventId = $_POST["eventId"];
    $eventName = $_POST["eventName"];
    $organizers = $_POST["organizers"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    
    // Prepare SQL statement
    $sql = "INSERT INTO events (eventId, eventName, organizers, date, time)
            VALUES ('$eventId', '$eventName', '$organizers', '$date', '$time')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect back to registration page
        header("Location: addEvent.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>