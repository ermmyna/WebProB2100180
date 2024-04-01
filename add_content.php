<?php
// Include database connection file
require("connection.php");

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $typeOfContent = $_POST['typeOfContent'];
    $categoryOfContent = $_POST['categoryOfContent'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle file upload and move it to a directory
    $targetDirectory = "uploads/"; // Adjust this path as needed
    $targetFile = $targetDirectory . basename($_FILES["content"]["name"]);

    // Check if the directory exists or create it
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true); // Create directory with full permissions
    }

    // Check if the file was uploaded successfully
    if (move_uploaded_file($_FILES["content"]["tmp_name"], $targetFile)) {
        // Insert data into the database
        $query = "INSERT INTO educontent (typeOfContent, categoryOfContent, title, description, content) VALUES ('$typeOfContent', '$categoryOfContent', '$title', '$description', '$targetFile')";
        if (mysqli_query($con, $query)) {
            // Redirect to the admin page with success message
            header("Location: index_admin.php?success=added");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    // If the form is not submitted using POST method, redirect to the admin page
    header("Location: index_admin.php");
    exit();
}
?>

