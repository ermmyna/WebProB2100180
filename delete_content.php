<?php
// Include database connection file
require("connection.php");

// Check if content ID is provided in the request
if(isset($_GET['id'])) {
    // Sanitize the content ID to prevent SQL injection
    $contentID = mysqli_real_escape_string($con, $_GET['id']);

    // Query to delete content from the database
    $query = "DELETE FROM educontent WHERE contentID = '$contentID'";

    // Execute the delete query
    if(mysqli_query($con, $query)) {
        // Content deleted successfully
        header("Location: index_admin.php?success=removed");
        exit();
    } else {
        // Error occurred while deleting content
        header("Location: index_admin.php?alert=remove_failed");
        exit();
    }
} else {
    // Redirect back to admin page if content ID is not provided
    header("Location: index_admin.php");
    exit();
}
?>
