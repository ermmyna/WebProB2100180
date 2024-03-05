<?php
require 'vendor/autoload.php'; // Include the Composer-generated autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $defaultPassword = 
    $subject = "Password Reset Link";
    $message = "Please Login Using this default password: $defaultPassword";

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
        $mail->SetFrom('zoyak1220@gmail.com', 'Seven Seas Travel');
        $mail->AddAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

        // Password reset email sent successfully
        echo '<script type="text/javascript">
            alert("Password reset instructions have been sent to your email.");
            window.location.href = "index.php"; // Close the modal or redirect to the desired page
        </script>';
    } catch (Exception $e) {
        // Failed to send the password reset email
        echo '<script type="text/javascript">
            alert("Failed to send the password reset instructions. Please try again later.");
            window.location.href = "#"; // Close the modal or redirect to the desired page
        </script>';
    }
}
?>

?>




