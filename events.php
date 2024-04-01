<?php

function isLoggedIn()
{
        if (isset($_SESSION['userID'])) {
                return true;
        }else{
                return false;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/EcoTrace Logo.png" style="width: 50px;">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
	   <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
      <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=320" />
      <title>Upcoming Events</title> 
      <link href='https://fonts.googleapis.com/css?family=Anton&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css" rel='stylesheet'>
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet"/>

    <!-- CSS FILES START -->
    <link href="css/custom3.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">
      <link href="css/notificationBell.css" rel="stylesheet">
      <link href="css/color.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <link href="css/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/all.min.css" rel="stylesheet"> 
      <!-- CSS FILES End -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .edit-delete-buttons {
            text-align: left;
            margin-left: 80px; /* Adjust margin as needed */
        }
    </style>

</head>
<body>
<div class="wrapper home2">
         <!--Header Start-->
      <header class="header-style-2">
         <nav class="navbar navbar-expand-lg">
               <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px; margin-left:30px;"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                           <a class="nav-link active" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="events.php">Events</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbonCalculator.php">Calculator</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbon_dash.php">Dashboard</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="display4.php">Learn</a>
                       </li>
                       <?php if (isLoggedIn()): ?>
                       <li class="nav-item">
                           <a class="nav-link" href="activity_log.php">Activity Log</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="history.php">History</a>
                       </li>
                       <?php endif; ?>
                  </ul>
                  <?php if (isLoggedIn()): ?>
                     <!-- If user is logged in, show profile circle -->
                     <li class="nav-item" style="list-style: none;">
                     <!-- If user is not logged in, show login button -->
                     <div class="notification" >
                        <div class="notBtn" href="#">
                           <?php if (weeklyLogUpToDate($con)) : ?>
                              <div class="number"></div>
                           <?php else : ?>
                              <div class="number">1</div>
                           <?php endif; ?>
                              <i class="fas fa-bell" id="bell"></i>
                              <div class="box">
                                 <div class="display">
                                    <?php if (weeklyLogUpToDate($con)) : ?>
                                       <div class="container" style= "padding-top:25px;">
                                          <div class="row">
                                             <div class="col-3">
                                             <img class="icon" style="width:60px; margin-left:8px;" src="https://cdn-icons-png.flaticon.com/128/8832/8832119.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                             <div class="cent">You're all caught up!</div>
                                            </div>
                                          </div>
                                    <?php else : ?>
                                       <div class="container" style= "padding-top:22px;">
                                          <div class="row">
                                             <div class="col-3">
                                                   <img class="icon" style="width:50px;" src="https://cdn-icons-png.flaticon.com/128/10308/10308693.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                                   <div class="cent">Please update your weekly log for this week</div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </li>
                     <li class="nav-item profile-dropdown">
                        <img src="images/profile.jpg" class="profile" />
                        <ul class="profile-menu">
                           <li class="sub-item">
                               <a href="socialInt(chat).php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Chat Room</p>
                               </a>
                           </li>
                           <li class="sub-item">
                               <a href="socialInt(shareAchivement).php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Share Achievements</p>
                               </a>
                           </li>
                           <li class="sub-item">
                               <a href="profile.php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Update Profile</p>
                               </a>
                           </li>
                           <!-- Other profile-related items -->
                           <li class="sub-item">
                                 <a href="index.php?logout=true" style="display: flex; align-items: center; text-decoration: none;"> <!-- Log out link -->
                                    <span class="material-icons-outlined"> logout </span>
                                    <p>Logout</p>
                                 </a>
                           </li>
                        </ul>
                     </li>

               <?php else: ?>
                     <li class="nav-item" style="list-style: none;">
                        <a class="login-btn" href="login.php" role="button"> Login </a>
                     </li>
               <?php endif; ?>
               
         </div>
         
         </nav>
         
      </header>
      <!-- Header End -->
            
    <!--Inner Header Start-->
    <section class="wf100 inner-header">
        <div class="container">
            <h1>Upcoming Events</h1>
        </div>
    </section>
       
               </div>
            </div>
         </div>
        
<img src="images/eg1.jpg">

<?php
// Initialize variables
$eventName = '';
$organizers = '';
$date = '';
$time = '';

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the updated event details
$selectSql = "SELECT eventName, organizers, date, time FROM events WHERE eventId = 1"; // Change the eventId as needed
$result = $conn->query($selectSql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if at least one row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Assign values to variables
    $eventName = $row['eventName'];
    $organizers = $row['organizers'];
    $date = $row['date'];
    $time = $row['time'];
}

// Close the database connection
$conn->close();
?>

<ul class="etime">
        <li><strong>Organizers: <?php echo $organizers; ?></strong></li>
        <br>
        <li><strong>Date: <?php echo $date; ?></strong></li>
        <br>
        <li><strong>Time: <?php echo $time; ?></strong></li>
        <br>
    </ul>
    <!-- Edit and Delete Buttons -->
    <div class="edit-delete-buttons">
        <button onclick="editEvent1(1)">Edit</button>
        <br>
        <br>
        <button onclick="confirmDelete(1)">Delete</button> <!-- Call a JavaScript function to delete event with ID "1" -->
    </div>
    <br><br>

    <script>
        function editEvent1(eventId) {
            // Construct the URL dynamically based on the event ID
            var url = 'event' + eventId + '.php';
            // Redirect to the dynamically generated URL
            window.location.href = url;
        }
function confirmDelete(eventId) {
    var confirmDelete = confirm('Are you sure you want to delete this event?');
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'deleteEvent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var eventToRemove = document.getElementById('event' + eventId);
                    if (eventToRemove) {
                        eventToRemove.remove();
                        // Slide subsequent events left if the deleted event is event1, event2, or event3
                        if (eventId === 1 || eventId === 2 || eventId === 3) {
                            for (let i = eventId + 1; i <= 3; i++) {
                                const currentEvent = document.getElementById('event' + i);
                                if (currentEvent) {
                                    currentEvent.style.transition = "transform 0.5s ease-in-out";
                                    currentEvent.style.transform = "translateX(-100%)"; // Slide left
                                }
                            }
                        }
                    } else {
                        alert('Error: Event element not found.');
                    }

                    // Move event3 to the position of event2
                    var event3 = document.getElementById('event3');
                    var event2 = document.getElementById('event2');
                    var event4 = document.getElementById('event4');
                    if (event3 && event2 && event4) {
                        event3.style.transition = "transform 0.5s ease-in-out";
                        event3.style.transform = "translate(0%, -108%)"; // Move to event2 position
                        event4.style.transition = "transform 0.5s ease-in-out";
                        event4.style.transform = "translate(226%, -108%)"; // Move to right side of event3
                    }
                } else {
                    alert('Error deleting event.');
                }
            }
        };
        xhr.send('eventId=' + eventId);
    }
}
    </script>

<!--Blog Post Start-->
           <img src="images/eg2.jpg" alt="">
       <div class="event-txt">
    <h5 style="color: white;"><a href="#" style="color: black; text-decoration: none;">Every Action Counts: Join for Our Future</a></h5>
    <br>

    <?php
// Initialize variables
$eventName = '';
$organizers = '';
$date = '';
$time = '';

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the updated event details
$selectSql = "SELECT eventName, organizers, date, time FROM events WHERE eventId = 2"; // Change the eventId as needed
$result = $conn->query($selectSql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if at least one row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Assign values to variables
    $eventName = $row['eventName'];
    $organizers = $row['organizers'];
    $date = $row['date'];
    $time = $row['time'];
}

// Close the database connection
$conn->close();
?>

<ul class="etime">
    <li><strong>Organizers: <?php echo $organizers; ?></strong></li>
    <br>
    <li><strong>Date: <?php echo $date; ?></strong></li>
    <br>
    <li><strong>Time: <?php echo $time; ?></strong></li>
    <br>
</ul>
           <!-- Edit and Delete Buttons -->
           <div style="text-align: left;" class="edit-delete-buttons">
            <button onclick="editEvent(2)">Edit</button> <!-- Assuming event ID is 2 -->
            <br>
               <br>
               <button onclick="confirmDelete(2)">Delete</button>
               <br><Br>
               <script>
function editEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'event' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
          </script>  
          
          <script>

function confirmDelete(eventId) {
    var confirmDelete = confirm('Are you sure you want to delete this event?');
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'deleteEvent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var eventToRemove = document.getElementById('event' + eventId);
                    if (eventToRemove) {
                        eventToRemove.remove();
                        // Slide subsequent events left if the deleted event is event1, event2, or event3
                        if (eventId === 1 || eventId === 2 || eventId === 3) {
                            for (let i = eventId + 1; i <= 3; i++) {
                                const currentEvent = document.getElementById('event' + i);
                                if (currentEvent) {
                                    currentEvent.style.transition = "transform 0.5s ease-in-out";
                                    currentEvent.style.transform = "translateX(-100%)"; // Slide left
                                }
                            }
                        }
                    } else {
                        alert('Error: Event element not found.');
                    }

                    // Move event3 to the position of event2
                    var event3 = document.getElementById('event3');
                    var event2 = document.getElementById('event2');
                    var event4 = document.getElementById('event4');
                    if (event3 && event2 && event4) {
                        event3.style.transition = "transform 0.5s ease-in-out";
                        event3.style.transform = "translate(0%, -108%)"; // Move to event2 position
                        event4.style.transition = "transform 0.5s ease-in-out";
                        event4.style.transform = "translate(226%, -108%)"; // Move to right side of event3
                    }
                } else {
                    alert('Error deleting event.');
                }
            }
        };
        xhr.send('eventId=' + eventId);
    }
}

</script>
    
            </div>
       </div>
   </div>
</div>

<!-- Include any JavaScript files -->

         <!--Blog Post End-->    
                     <!--Blog Post Start-->
                              <img src="images/eg3.jpg" alt=""></div>
                           <div class="event-txt">
                              <h5 style="color: white;"><a href="#" style="color: black; text-decoration: none;">Reimagine! Creative Solutions for Our Country</a></h5>
                              <br>
                              <?php
// Initialize variables
$eventName = '';
$organizers = '';
$date = '';
$time = '';

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the updated event details
$selectSql = "SELECT eventName, organizers, date, time FROM events WHERE eventId = 3"; // Change the eventId as needed
$result = $conn->query($selectSql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if at least one row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Assign values to variables
    $eventName = $row['eventName'];
    $organizers = $row['organizers'];
    $date = $row['date'];
    $time = $row['time'];
}

// Close the database connection
$conn->close();
?>

<ul class="etime">
    <li><strong>Organizers: <?php echo $organizers; ?></strong></li>
    <br>
    <li><strong>Date: <?php echo $date; ?></strong></li>
    <br>
    <li><strong>Time: <?php echo $time; ?></strong></li>
    <br>
</ul>

                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: left;" class="edit-delete-buttons">
                                  <button onclick="editEvent(3)">Edit</button> <!-- Assuming event ID is 3 -->
                                  <br>
                                     <br>
                                     <button onclick="confirmDelete(3)">Delete</button> <!-- Call a JavaScript function to delete event with ID "3" -->
                                     <br>
                                     <br>
                                     <script>
function editEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'event' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
</script>

<script>

function confirmDelete(eventId) {
    var confirmDelete = confirm('Are you sure you want to delete this event?');
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'deleteEvent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var eventToRemove = document.getElementById('event' + eventId);
                    if (eventToRemove) {
                        eventToRemove.remove();
                        // Slide subsequent events left if the deleted event is event1, event2, or event3
                        if (eventId === 1 || eventId === 2 || eventId === 3) {
                            for (let i = eventId + 1; i <= 3; i++) {
                                const currentEvent = document.getElementById('event' + i);
                                if (currentEvent) {
                                    currentEvent.style.transition = "transform 0.5s ease-in-out";
                                    currentEvent.style.transform = "translateX(-100%)"; // Slide left
                                }
                            }
                        }
                    } else {
                        alert('Error: Event element not found.');
                    }

                    // Move event3 to the position of event2
                    var event3 = document.getElementById('event3');
                    var event2 = document.getElementById('event2');
                    var event4 = document.getElementById('event4');
                    if (event3 && event2 && event4) {
                        event3.style.transition = "transform 0.5s ease-in-out";
                        event3.style.transform = "translate(0%, -108%)"; // Move to event2 position
                        event4.style.transition = "transform 0.5s ease-in-out";
                        event4.style.transform = "translate(226%, -108%)"; // Move to right side of event3
                    }
                } else {
                    alert('Error deleting event.');
                }
            }
        };
        xhr.send('eventId=' + eventId);
    }
}

</script>
                                    </div>
                              </div>
                              </div>
                     </div>

                              <img src="images/eg4.jpg" alt=""></div>
                           <div class="event-txt">
                           <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;">Our Planet Needs You</a></h5>
                           <br>

                           <?php
// Initialize variables
$eventName = '';
$organizers = '';
$date = '';
$time = '';

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the updated event details
$selectSql = "SELECT eventName, organizers, date, time FROM events WHERE eventId = 4"; // Change the eventId as needed
$result = $conn->query($selectSql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if at least one row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Assign values to variables
    $eventName = $row['eventName'];
    $organizers = $row['organizers'];
    $date = $row['date'];
    $time = $row['time'];
}

// Close the database connection
$conn->close();
?>

<ul class="etime">
    <li><strong>Organizers: <?php echo $organizers; ?></strong></li>
    <br>
    <li><strong>Date: <?php echo $date; ?></strong></li>
    <br>
    <li><strong>Time: <?php echo $time; ?></strong></li>
    <br>
</ul>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: left;" class="edit-delete-buttons">
                                  <button onclick="editEvent(4)">Edit</button> <!-- Assuming event ID is 4 -->
                                  <br>
                                     <br>
                                     <button onclick="confirmDelete(4)">Delete</button> <!-- Call a JavaScript function to delete event with ID "4" -->
                                 <br><br><br>
                                    </div>
                              </div>
                              </div>
                     </div>

                     <script>
function editEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'event' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
</script>

<script>

function confirmDelete(eventId) {
    var confirmDelete = confirm('Are you sure you want to delete this event?');
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'deleteEvent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var eventToRemove = document.getElementById('event' + eventId);
                    if (eventToRemove) {
                        eventToRemove.remove();
                        // Slide subsequent events left if the deleted event is event1, event2, or event3
                        if (eventId === 1 || eventId === 2 || eventId === 3) {
                            for (let i = eventId + 1; i <= 3; i++) {
                                const currentEvent = document.getElementById('event' + i);
                                if (currentEvent) {
                                    currentEvent.style.transition = "transform 0.5s ease-in-out";
                                    currentEvent.style.transform = "translateX(-100%)"; // Slide left
                                }
                            }
                        }
                    } else {
                        alert('Error: Event element not found.');
                    }

                    // Move event3 to the position of event2
                    var event3 = document.getElementById('event3');
                    var event2 = document.getElementById('event2');
                    var event4 = document.getElementById('event4');
                    if (event3 && event2 && event4) {
                        event3.style.transition = "transform 0.5s ease-in-out";
                        event3.style.transform = "translate(0%, -108%)"; // Move to event2 position
                        event4.style.transition = "transform 0.5s ease-in-out";
                        event4.style.transform = "translate(226%, -108%)"; // Move to right side of event3
                    }
                } else {
                    alert('Error deleting event.');
                }
            }
        };
        xhr.send('eventId=' + eventId);
    }
}

</script>
                     <!--Blog Post End--> 
                     
                              <img src="images/eg5.jpg" alt=""></div>
                           <div class="event-txt">
                           <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;">Save the Planet, Don't Let It Fizzle!</a>
                              </h5>
                              <br>

                              <?php
// Initialize variables
$eventName = '';
$organizers = '';
$date = '';
$time = '';

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the updated event details
$selectSql = "SELECT eventName, organizers, date, time FROM events WHERE eventId = 5"; // Change the eventId as needed
$result = $conn->query($selectSql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if at least one row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Assign values to variables
    $eventName = $row['eventName'];
    $organizers = $row['organizers'];
    $date = $row['date'];
    $time = $row['time'];
}

// Close the database connection
$conn->close();
?>

<ul class="etime">
    <li><strong>Organizers: <?php echo $organizers; ?></strong></li>
    <br>
    <li><strong>Date: <?php echo $date; ?></strong></li>
    <br>
    <li><strong>Time: <?php echo $time; ?></strong></li>
    <br>
</ul>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: left;" class="edit-delete-buttons">
                                  <button onclick="editEvent(5)">Edit</button> <!-- Assuming event ID is 5 -->
                                  <br>
                                     <br>
                                     <button onclick="deleteEvent(5)">Delete</button> <!-- Call a JavaScript function to delete event with ID "5" -->
                                 </div>
                           </div>
                        </div>
                     </div>
                     <br>

                     <?php
// Initialize variables
$eventId = 7; // Assuming the event ID for the newly added event is 6
$eventName = '';
$organizers = '';
$date = '';
$time = '';

// Connect to your database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bit210";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the updated event details
$selectSql = "SELECT eventName, organizers, date, time FROM events WHERE eventId = $eventId";
$result = $conn->query($selectSql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if at least one row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Assign values to variables
    $eventName = $row['eventName'];
    $organizers = $row['organizers'];
    $date = $row['date'];
    $time = $row['time'];
}
?>

    <div class="event-post" id="event<?php echo $eventId; ?>">
            <img src="images/eg6.jpg" alt="">
        </div>
        <div class="event-txt">
            <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;"><?php echo $eventName; ?></a></h5>
            <br>
            <ul class="etime">
                <li><strong>Organizers: <?php echo $organizers; ?></strong></li>
                <br>
                <li><strong>Date: <?php echo $date; ?></strong></li>
                <br>
                <li><strong>Time: <?php echo $time; ?></strong></li>
                <br>
            </ul>
            <br>
            <!-- Edit and Delete Buttons -->
            <div style="text-align: left;" class="edit-delete-buttons">
                <button onclick="editEvent(<?php echo $eventId; ?>)">Edit</button>
                <br>
                <br>
                <button onclick="confirmDelete(<?php echo $eventId; ?>)">Delete</button>
            </div>
        </div>
    </div>
</div>
<br><br>

<script>
function editEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'event' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
</script>

<script>

function confirmDelete(eventId) {
    var confirmDelete = confirm('Are you sure you want to delete this event?');
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'deleteEvent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var eventToRemove = document.getElementById('event' + eventId);
                    if (eventToRemove) {
                        eventToRemove.remove();
                        // Slide subsequent events left if the deleted event is event1, event2, or event3
                        if (eventId === 1 || eventId === 2 || eventId === 3) {
                            for (let i = eventId + 1; i <= 3; i++) {
                                const currentEvent = document.getElementById('event' + i);
                                if (currentEvent) {
                                    currentEvent.style.transition = "transform 0.5s ease-in-out";
                                    currentEvent.style.transform = "translateX(-100%)"; // Slide left
                                }
                            }
                        }
                    } else {
                        alert('Error: Event element not found.');
                    }

                    // Move event3 to the position of event2
                    var event3 = document.getElementById('event3');
                    var event2 = document.getElementById('event2');
                    var event4 = document.getElementById('event4');
                    if (event3 && event2 && event4) {
                        event3.style.transition = "transform 0.5s ease-in-out";
                        event3.style.transform = "translate(0%, -108%)"; // Move to event2 position
                        event4.style.transition = "transform 0.5s ease-in-out";
                        event4.style.transform = "translate(226%, -108%)"; // Move to right side of event3
                    }
                } else {
                    alert('Error deleting event.');
                }
            }
        };
        xhr.send('eventId=' + eventId);
    }
}

</script>
                     <!-- Include any JavaScript files -->
                     <!--Blog Post End--> 
                     <!--Blog Post Start-->

                     <!--Sorting list of month of events-->
                     <script>
                     
                     function showList() {
                     var selectedMonth = document.getElementById("month").value;
                     var eventPosts = document.querySelectorAll('.events > .event-grid-2 > .container > .row > div');

                     eventPosts.forEach(function(post) {
                        if (selectedMonth === 'all' || post.classList.contains(selectedMonth)) {
                              post.style.display = 'block'; // Show selected month's posts or all posts if 'all' is selected
                        } else {
                              post.style.display = 'none'; // Hide posts of other months
                        }
                     });

                     var notFoundMessage = document.getElementById("not-found");

                     if (selectedMonth === 'all' || document.querySelectorAll('.events > .event-grid-2 > .container > .row > .' + selectedMonth).length > 0) {
                        notFoundMessage.style.display = 'none'; // Hide message if events found for selected month or if 'all' is selected
                     } else {
                        notFoundMessage.style.display = 'block'; // Show message if no events found for selected month
                     }
                  }
                     </script>
                     <br><br><br>
                     <!--Blog Post End--> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
    
      </div>
         </div>
         

      <script>
    // Retrieve updated event details from localStorage
    const updatedEvent = JSON.parse(localStorage.getItem('updatedEvent'));

    // Update event details on the page if they exist
    if (updatedEvent) {
        document.getElementById('eventName').textContent = updatedEvent.eventName;
        // Update other elements similarly using their IDs

        // Clear stored updated event details from localStorage
        localStorage.removeItem('updatedEvent');
    }
</script>

 <!-- Footer section -->
 <div class="ftco-section wf100">
            <footer class="footer">
              <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
                <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
              </svg>
            </section>
            <footer class="footer-03">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="d-flex align-items-center justify-content-between mb-4">
                               
                              <div class="logo-space">
                                  <img src="images/EcoTrace Logo.png" alt="Eco Trace Logo" class="logo-img">
                              </div>
                          </div>
              
                           <div class="row">
                               <div class="col-md-6 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Carbon Calculator</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">How it Works</a></li>
                                       <li><a href="#" class="py-1 d-block">Log Your Activities</a></li>
                                       <li><a href="#" class="py-1 d-block">Reduce Your Footprint</a></li>
                                   </ul>
                               </div>
                               <div class="col-md-4 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Resources</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">Blog</a></li>
                                       <li><a href="#" class="py-1 d-block">Educational Materials</a></li>
                                       <li><a href="#" class="py-1 d-block">FAQs</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="row justify-content-end">
                               <div class="col-md-12 col-lg-11 mb-md-0 mb-4">
                                   
                                   <h2 class="footer-heading mt-5">Connect With Us</h2>
                                   <ul class="ftco-footer-social p-0">
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                                   </ul>
                                   <h2 class="footer-heading mt-5">Subscribe to Our Newsletter</h2>
                                   <form action="#" class="subscribe-form">
                                       <div class="form-group d-flex">
                                           <input type="text" class="form-control rounded-left" placeholder="Enter your email address">
                                           <input type="submit" value="Subscribe" class="form-control submit px-3 rounded-right">
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-5 pt-4 border-top">
                       <div class="col-md-6 col-lg-8">
                           <p class="copyright">© <script>document.write(new Date().getFullYear());</script> All rights reserved | EcoTrace - Track and Reduce Your Carbon Footprint</p>
                       </div>
                       <div class="col-md-6 col-lg-4 text-md-right">
                           <p class="mb-0 list-unstyled">
                               <a class="mr-md-3" href="#">Terms &amp; Conditions</a>
                               <a class="mr-md-3" href="#">Privacy Policy</a>
                           </p>
                       </div>
                   </div>
               </div>
           </footer>

   </div>
   <!--   JS Files Start  --> 
   <script src="js/jquery-3.3.1.min.js"></script> 
   <script src="js/jquery-migrate-1.4.1.min.js"></script> 
   <script src="js/popper.min.js"></script> 
   <script src="js/bootstrap.min.js"></script> 
   <script src="js/owl.carousel.min.js"></script> 
   <script src="js/jquery.prettyPhoto.js"></script> 
   <script src="js/isotope.min.js"></script> 
   <script src="js/main.js"></script>
   </body>
</html>



</body>
</html>