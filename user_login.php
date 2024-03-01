<?php
session_start(); // Start the session

require("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Query to fetch the hashed password from the database based on the provided username
    $sql = "SELECT userID, password FROM user WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userID, $hashed_password);
    mysqli_stmt_fetch($stmt);

    // Verify the password
    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Password is correct, set user ID in session
        $_SESSION['userID'] = $userID;
        
        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        // Password is incorrect, display error message
        $error_message = "Invalid username or password.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);
?>
