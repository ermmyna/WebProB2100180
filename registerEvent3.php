<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    echo "Error: User is not logged in.";
    exit;
}

// Retrieve the userId from the session
$userId = $_SESSION['userID'];

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the eventId from the URL parameter
$eventId = 3; // Assuming the eventId is 3 for event3

// Insert registration data into the registration table
$insertSql = "INSERT INTO registration (userID, eventId) VALUES (?, ?)";
$stmt = $conn->prepare($insertSql);
$stmt->bind_param("ii", $userId, $eventId);

// Check if the registration was successful
if ($stmt->execute()) {
    // Registration successful
    echo "Registration successful!";
    
    // Include the send email script
    include 'send_email_script.php';
} else {
    // Registration failed
    echo "Error: Registration failed.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>