<?php
include("accounts.php");
// Uncomment error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Check if the form is submitted
if (isset($_POST['submitFeedback'])) {
    // Get the feedback message from the form
    $feedbackMessage = $_POST['feedback'];

    // Get the userID from the session
    $userID = $_SESSION['userID'];

    // Prepare the SQL statement to insert feedback
    $insertQuery = "INSERT INTO feedback (userID, feedbackMessage) VALUES (?, ?)";
    
    // Prepare the statement
    $statement = mysqli_prepare($con, $insertQuery);
    
    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($statement, "is", $userID, $feedbackMessage);
    $success = mysqli_stmt_execute($statement);

    if ($success) {
        // Feedback successfully inserted
        header("Location: display4.php?success=feedback_sent");
        exit();
    } else {
        // Error occurred while inserting feedback
        header("Location: diaplay4.php?error=feedback_error");
        exit();
    }
}
?>

