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
        .container {
            display: flex;
            align-items: flex-start; /* Align items to the top */
            justify-content: center;
            flex-direction: row; /* Make the container flex direction as row */
            padding-left: auto; /* Increase left padding to move content more towards left */
        }
        .logo {
            width: 160px; /* Adjust the width to make it medium size */
            height: 20px; /* Maintain aspect ratio */
            float: left; /* Float the logo to the left */
            margin-left: -2px; /* Adjust the left margin for more gap */
            margin-right: 16px; /* Adjust the right margin */
            margin-top: -90px; /* Adjust the top margin */
        }
        .medium-image {
            width: 90%; /* Adjust the width as needed */
            height: auto; /* Allow the height to adjust automatically */
            margin-top: 90px; /* Adjust the margin-top */
            margin-bottom: 90px; /* Add margin below the image */
            margin-left: -185px; /* Move image to the left side*/
        }
        .medium-image1 {
            width: 95%; /* Adjust the width as needed */
            height: auto; /* Allow the height to adjust automatically */
            margin-top: 90px; /* Adjust the margin-top */
            margin-bottom: 90px; /* Add margin below the image */
            margin-left: -88px; /* Move image to the left side*/
        }
        .registration-form {
            margin-top: 50px; /* Adjust the margin-top */
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
            margin-left: 0px; /* Adjust the margin */
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
            <img src="images/bf1.jpg" alt="" class="medium-image1"> <!-- Place the image in the center -->
        </div>
        <div class="registration-form">
            <h2>Edit Event 30 April 2024</h2>
            <br>
            <form>
                <!-- Include a hidden input field to pass the event ID -->
                <input type="hidden" id="eventId" name="eventId" value="1"> <!-- Replace "1" with the actual event ID -->
        
                <label for="eventName">Event Name:</label>
                <input type="text" id="eventName" name="eventName" value="Every Action Counts: Join for Our Future" style="width: 350px;" required>
                <br>
                <br>
                <label for="organizers">Organizers:</label>
                <input type="text" id="organizers" name="organizers" value="Universiti Putra Malaysia (Faculty of Agriculture)" style="width: 350px;" required>
                <br>
                <br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="2024-04-30" style="width: 350px;" required>
                <br>
                <br>
                <label for="time">Time:</label>
                <input type="text" id="time" name="time" value="9:00 am - 1:00 pm"style="width: 350px;" required>
                <br>
                <br>
                <input type="submit" value="Update" onclick="updateEvent()">
            </form>
            
            <script>
        // Function to handle updating event details
        function updateEvent() {
            // Get the updated event details from the form
            const eventId = document.getElementById('eventId').value;
            const eventName = document.getElementById('eventName').value;
            const organizers = document.getElementById('organizers').value;
            const date = formatDate(document.getElementById('date').value); // Format date
            const time = document.getElementById('time').value;

            // Prevent the default form submission behavior
            event.preventDefault();

            // Store the updated event details in localStorage
            const updatedEvent = {
                eventId: eventId,
                eventName: eventName,
                organizers: organizers,
                date: date,
                time: time
            };
            localStorage.setItem('updatedEvent', JSON.stringify(updatedEvent));

            // Redirect to upcoming-event.html
            window.location.href = "upcoming-events.html";
        }

        // Function to format date to "Month day, year" format
function formatDate(dateString) {
    // Create a new Date object from the input string
    const date = new Date(dateString);

    // Get the month name using an array of month names
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthIndex = date.getMonth();
    const monthName = monthNames[monthIndex];

    // Get the day of the month
    const day = date.getDate();

    // Get the year
    const year = date.getFullYear();

    // Construct the formatted date string
    return `${monthName} ${day}, ${year}`;
}

// Example usage
const formattedDate = formatDate("2024-04-25"); // Returns "April 25, 2024"

        // Add event listener to the form submission
        document.getElementById('editEventForm').addEventListener('submit', updateEvent);
    </script>
    
 </body>
 </html> 
</body>
</html>