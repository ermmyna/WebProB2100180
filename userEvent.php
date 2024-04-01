<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #addfad;
        }
        header {
    display: flex;
    flex-direction: column; /* Align items vertically */
    align-items: center; /* Center items horizontally */
    padding: 20px;
    background-color: #addfad; /* Adjust as needed */
    color: black;
}

.logo img {
    height: 125px; /* Adjust as needed */
    margin-top: -22px; /* Adjust as needed */
}
.logo-img {
    height: 115px; /* Adjust as needed */
    margin-right: -10px; /* Adjust as needed */
}

footer{
    background-color: green;
}

header h1 {
    font-size: 28px;
    margin-bottom: 0;
    margin-top: 10px; /* Adjust as needed */
}

nav {
    margin-top: 10px; /* Adjust as needed */
}

nav a {
    color: black;
    text-decoration: none;
    margin-left: 20px; /* Adjust as needed */
}

    </style>
</head>
<body>
    <header>
    <div class="logo">
        <img src="images/EcoTrace Logo.png" alt="EcoTrace Logo">
    </div>
        <h1>Upcoming Events</h1>
        <!-- Navigation link for home page -->
        <br>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>
            
    <!--Inner Header Start-->
    <section class="wf100 p100 inner-header">
        <div class="container">
            <!-- Your inner header content goes here -->
        </div>
    </section>
         <h2 style="font-size: 22px; color:black;">Select a month:</h2>
         
         <select id="month" onchange="showList()">
         <option value="january">January</option>
         <option value="february">February</option>
         <option value="march">March</option>
         <option value="april">April</option>
         <option value="may">May</option>
         <option value="june">June</option>
         <option value="july">July</option>
         <option value="august">August</option>
         <option value="september">September</option>
         <option value="october">October</option>
         <option value="november">November</option>
         <option value="december">December</option>
         <option value="all">All</option>
      </select>

<div id="not-found" style="display:none; color:black;">Sorry! Events is not available on this month. We will try our best!</div>

         <!-- Inner Header End --> 
         <!-- Causes Start -->
         <section class="wf100 p80 events">
   <div class="event-grid-2">
       <div class="container">
           <div class="row">

               <!-- Blog Post Start for April -->
               <div class="col-lg-4 col-md-6 april">
                   <div class="event-post" id="event1">
                       <div class="event-thumb"> 
                           <img src="images/eg1.jpg" alt="">
                       </div>
                       <div class="event-txt">
                       <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;">Awareness Campaign to Save Forest</a></h5>
                       <br>    
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
           <!-- Register Button -->
           <div style="text-align: center;" class="register">
           <button onclick="registerEvent(1)">Register</button>
            <br>
            <br>
            <a href="event-details1.php">View Full Details</a>
        </div>
<br><br>
           <script>
function registerEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'registerEvent' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
    </script>
                       </div>
                   </div>
                  </div>
                    <!--Blog Post End--> 
                    
                    <?php

?>

<!--Blog Post Start-->
<div class="col-lg-4 col-md-30 april">
   <div class="event-post" id="event2">
       <div class="event-thumb"> 
           <img src="images/eg2.jpg" alt="">
       </div>
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
    <br>
</ul>
           <!-- Register Button -->
           <div style="text-align: center;" class="register">
            <button onclick="registerEvent(2)">Register</button> <!-- Assuming event ID is 2 -->
            <br>
            <br>
            <a href="event-details2.php">View Full Details</a>
               
               <script>
function registerEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'registerEvent' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
          </script>  
    
            </div>
       </div>
   </div>
</div>

<!-- Include any JavaScript files -->

         <!--Blog Post End--> 
                     
                     <!--Blog Post Start-->
                     <div class="col-lg-4 col-md-5 may">
                        <div class="event-post" id="event3">
                           <div class="event-thumb"> 
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
                                 <div style="text-align: center;" class="register">
                                  <button onclick="registerEvent(3)">Register</button> <!-- Assuming event ID is 3 -->
                                  <br>
                                     <br>
                                    <a href="event-details3.php">View Full Details</a>
                                     <script>
function editEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'registerEvent' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
</script>
                                    </div>
                              </div>
                              </div>
                     </div>

                     <!--Blog Post End-->
                     <!--Blog Post Start-->
                     <div class="col-lg-4 col-md-6 may">
                        <div class="event-post" id="event4">
                           <div class="event-thumb"> 
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
                              <br>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: center;" class="register">
                                  <button onclick="registerEvent(4)">Register</button> <!-- Assuming event ID is 4 -->
                                  <br>
                                     <br>
                                <a href="event-details4.php">View Full Details</a>
                                    </div>
                              </div>
                              </div>
                     </div>
                     <!--Blog Post End--> 
                     <!--Blog Post Start-->
                     <div class="col-lg-4 col-md-6 june">
                        <div class="event-post" id="event5">
                           <div class="event-thumb"> 
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
<br>
<br>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: center;" class="register">
                                  <button onclick="registerEvent(5)">Register</button> <!-- Assuming event ID is 5 -->
                                  <br>
                                  <br>
                                  <a href="event-details5.php">View Full Details</a>
                                </div>
                           </div>
                        </div>
                     </div>
                     <br><br>

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

<div class="col-lg-4 col-md-6 june">
    <div class="event-post" id="event<?php echo $eventId; ?>">
        <div class="event-thumb">
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
            <br>
            <!-- Edit and Delete Buttons -->
            <div style="text-align: center;" class="register"></div>
                <button onclick="registerEvent(<?php echo $eventId; ?>)">Register</button>
                <a href="event-details1.php">View Full Details</a>
            </div>
        </div>
    </div>
</div>
<br><br>
                     <!-- Include any JavaScript files -->
                     <!--Blog Post End--> 
                     <!--Blog Post Start-->

                   
                     
                     <!-- Sorting list of month of events -->
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
                  <div class="row">
                     <div class="col-md-12">
                        <div class="gt-pagination mt20">
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
        
          <!-- Footer -->
    
      </div>
      <!--   JS Files Start  --> 
      <script src="js/jquery-3.3.1.min.js"></script> 
      <script src="js/jquery-migrate-1.4.1.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/owl.carousel.min.js"></script> 
      <script src="js/isotope.min.js"></script> 

      <!-- Include any JavaScript files -->

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

 <!--Footer Section Start--> 
 <div class="ftco-section wf100">
            <footer class="footer">
              </svg>
            </section>
            <footer class="footer-03">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="d-flex align-items-center justify-content-between mb-4">
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
      <!--Footer Section End-->   

   </body>
</html>