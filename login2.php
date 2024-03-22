<?php
session_start(); // Start the session

// Include database connection
require_once("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the connection is established successfully
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the query using a prepared statement
    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    // Check if the statement is prepared successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if a row is returned
        if (mysqli_num_rows($result) == 1) {
            // Authentication successful, set session variables
            $_SESSION['username'] = $username;

            // Redirect to another page (e.g., carbonCalculator.php)
            header("Location: carbonCalculator.php");
            exit();
        } else {
            // Authentication failed, display error message
            $error_message = "Invalid username or password";
        }
    } else {
        // Handle statement preparation error
        die("Error in preparing statement: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>