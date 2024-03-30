<?php
// Include database connection and functions
include("accounts.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback_submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Insert feedback into database
    $insertQuery = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($con, $insertQuery);
    
    // Set success message
    $_SESSION['success_message'] = "Feedback submitted successfully!";
    header("Location: {$_SERVER['PHP_SELF']}"); // Redirect to clear POST data
    exit();
}

// Fetch existing feedback entries
$feedbackQuery = "SELECT * FROM feedback";
$feedbackResult = mysqli_query($con, $feedbackQuery);
$feedbackEntries = mysqli_fetch_all($feedbackResult, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content -->
</head>
<body>
    <!-- Your header content -->
    
    <!-- Content Start -->
    <section class="wf100 p80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="myaccount-form">
                        <h3>Submit Feedback</h3>
                        <!-- Feedback Form -->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <ul class="row">
                                <li class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                    </div>
                                </li>
                                <li class="col-md-6">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                </li>
                                <li class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="message" class="form-control" placeholder="Your Feedback" required></textarea>
                                    </div>
                                </li>
                                <li class="col-md-12">
                                    <button type="submit" class="register" name="feedback_submit">Submit Feedback</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Display Existing Feedback -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3>Existing Feedback</h3>
                    <ul class="list-group">
                        <?php foreach ($feedbackEntries as $entry): ?>
                            <li class="list-group-item">
                                <strong>Name:</strong> <?php echo $entry['name']; ?> <br>
                                <strong>Email:</strong> <?php echo $entry['email']; ?> <br>
                                <strong>Message:</strong> <?php echo $entry['message']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Content End -->
    
    <!-- Your footer content -->
</body>
</html>
