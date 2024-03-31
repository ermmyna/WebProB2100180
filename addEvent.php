<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">
    <title>Registration Page</title>
     
    <!-- CSS FILES START -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- CSS FILES End -->
     
    <style>
        body{
            background-color: #addfad;
        }
        .container {
            display: flex;
            align-items: flex-start; /* Align items to the top */
            justify-content: center;
            flex-direction: row; /* Make the container flex direction as row */
            padding-left: auto; /* Increase left padding to move content more towards left */
        }
        .logo {
            width: 130px; /* Adjust the width to make it medium size */
            height: 20px; /* Maintain aspect ratio */
            float: left; /* Float the logo to the left */
            margin-left: -2px; /* Adjust the left margin for more gap */
            margin-right: 16px; /* Adjust the right margin */
            margin-top: -90px; /* Adjust the top margin */
        }
        .medium-image {
            width: 80%; /* Adjust the width as needed */
            height: auto; /* Allow the height to adjust automatically */
            margin-top: 90px; /* Adjust the margin-top */
            margin-bottom: 90px; /* Add margin below the image */
            margin-left: -375px; /* Move image to the left side*/
        }
        .medium-image1 {
            width: 100%; /* Adjust the width as needed */
            height: 200px; /* Allow the height to adjust automatically */
            margin-top: 90px; /* Adjust the margin-top */
            margin-bottom: 90px; /* Add margin below the image */
            margin-left: -180px; /* Move image to the left side*/
        }
        .registration-form {
            margin-top: 50px; /* Adjust the margin-top */
            margin-right: -50px;
        }
        .registration-form h2 {
            font-size: 28px; /* Adjust the font size as needed */
        }
        .form-group {
            font-size: 22px; /* Increase the font size of the form-group */
            display: block; /* Display the labels on separate lines */
            margin-bottom: 8px; /* Add some space below each label */
            margin-left: 20px;
        }
        .form-check-label {
            font-size: 18px; /* Adjust the font size to match the header */
            display: inline-block; /* Display the form label inline */
            margin-left: 10px; /* Adjust the margin */
        }
        .btn-primary {
            background-color: lightskyblue; /* Change submit button color to blue */
            font-size: 17px;
        }
        .logo {
            margin-right: 5px;
            margin-bottom: 8px;
            width: 220px;
            height: auto;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        @media (max-width: 708px) {
            .form-row .form-group.col {
                flex-basis: 100%;
                max-width: 100%;
            }
        }  
    </style>    
        
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/EcoTrace Logo.png" alt="" class="medium-image"> <!-- Place the logo on the left side -->
        </div>
        <div class="center-image">
            <img src="images/current-pro8.jpg" alt="" class="medium-image1"> <!-- Place the image in the center -->
        </div>
        <div class="registration-form">
            <h2>Add Event</h2>
            <br>
            <form id="addEventForm" action="insertEvent.php" method="POST">
                <!-- Include a hidden input field to pass the event ID -->
                <input type="hidden" id="eventId" name="eventId" value="8"> <!-- Replace "6" with the actual event ID -->
        
                <label for="eventName">Event Name:</label><br>
                <input type="text" id="eventName" name="eventName" style="width: 350px;" required>
                <br>
                <br>
                <label for="organizers">Organizers:</label><br>
                <input type="text" id="organizers" name="organizers" style="width: 350px;" required>
                <br>
                <br>
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" style="width: 350px;" required>
                <br>
                <br>
                <label for="time">Time:</label><br>
                <input type="text" id="time" name="time" style="width: 350px;" required>
                <br>
                <br>
                <input type="submit" value="Add">

            </form>
        </div>
    </div>
    
</body>
</html>