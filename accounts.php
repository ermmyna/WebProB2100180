<?php
session_start();// Start the session

require("connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Email Sending Requirment 
require 'vendor/autoload.php'; // Include the Composer-generated autoloader
        
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Check if the form is submitted
if (isset($_POST['login-btn'])) {
    // Retrieve form data
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Query to fetch the hashed password from the database based on the provided username
    $sql = "SELECT userID, password, first_login FROM user WHERE username = ? LIMIT 1";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userID, $hashed_password, $first_login);
    mysqli_stmt_fetch($stmt);

    // Verify the password
    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Password is correct, set user ID in session
        $_SESSION['userID'] = $userID;

        if ($first_login == 1) {
            // It's the user's first login, set the first_login session variable
            $_SESSION['first_login'] = 1;
        }

        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        // Password is incorrect, display error message
        $error_message = "Invalid username or password.";
    }

    mysqli_stmt_close($stmt);


}


if (isset($_POST['signup-btn'])) {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    $first_login = 1;
    
    // Generate a default password and hash it
    $default_password = generateRandomPassword();
    $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert user data into the database
    $sql = "INSERT INTO user (username, password, first_login, email, contactNumber, firstName, lastName) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashed_password, $first_login, $email, $contactNumber, $firstName, $lastName);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Registration successful
        // Retrieve the last inserted user ID
        $user_id = mysqli_insert_id($con);
        // Store user ID in session for future use
        $_SESSION['user_id'] = $user_id;

        // send the default password to the user's email
        $subject = "Welcome to EcoTrace - Login Information";
        $message = "Hello $firstName $lastName,<br><br>Your account has been successfully created.<br>
        <br>Your default password is: $default_password<br><br>Please log in and change your password as soon as possible.";

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to 0 for no debugging
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; // Use 465 for SSL or 587 for TLS
            $mail->SMTPSecure = 'tls'; // Use 'ssl' for SSL, 'tls' for TLS
            $mail->SMTPAuth = true;
            $mail->Username = 'zoyak1220@gmail.com'; // Your Gmail email address
            $mail->Password = 'xqfe pwvi dsys tito'; // Use the app password you generated
    
            // Recipients
            $mail->SetFrom('zoyak1220@gmail.com', 'EcoTrace');
            $mail->AddAddress($email);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
    
            $mail->send();
    
            // Password sent successfully
            echo '<script type="text/javascript">
            alert("Account created successfully. Check your email for login instructions.");
            window.location.href = "index.php"; // Redirect to the desired page
            </script>';
         } catch (Exception $e) {
            // Failed to send the email
            echo '<script type="text/javascript">
            alert("Failed to send login instructions. Please try again later.");
            window.location.href = "#"; // Close the modal or redirect to the desired page
            </script>';
        }
    } else {
       // User registration failed
       echo '<script type="text/javascript">
       alert("Failed to register. Please try again later.");
       window.location.href = "#"; // Close the modal or redirect to the desired page
       </script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}


// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

function isLoggedIn()
{
        if (isset($_SESSION['userID'])) {
                return true;
        }else{
                return false;
        }
}

if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location:index.php");
        exit();
}


if (isset($_POST['newPass'])) {
    $userID = $_SESSION['userID'];
    $password_1 = ($_POST['password_1']);
    $password_2 = ($_POST['password_2']);

    // Reset errors array
    $errors = array();

    if (empty($password_1)) {
        $errors[] = "Password is required";
    }
    if ($password_1 != $password_2) {
        $errors[] = "The two passwords do not match";
    }

    if (empty($errors)) {
        // No errors, proceed with the password update
        $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
        $update_pass = "UPDATE user SET password = ?, first_login = 0 WHERE userID = ?";
        
        $stmt = mysqli_prepare($con, $update_pass);
        mysqli_stmt_bind_param($stmt, 'si', $password, $userID);
            
        $success = mysqli_stmt_execute($stmt);

            if ($success) {
                $_SESSION['first_login'] = 0;
                $success_message = "Password updated successfully!";
                header("location:index.php");
                exit;
            } else {
                // statement execution fails
                $errors[] = "Failed to update the password.";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
    }

} else {
    $errors = array();
    $errors[] = "Failed to create new password, Try Again.";
    
}

// Close the database connection
mysqli_close($con);

?>
