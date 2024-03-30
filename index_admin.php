<?php
// Include database connection file
require("connection.php");

// Check if 'success' parameter is set in the URL
if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}

// Check if 'alert' parameter is set in the URL
if(isset($_GET['alert'])) {
  // Define alert messages based on different scenarios
  $alert_messages = [
    'img_upload' => 'Image upload failed! Only accept (jpg, jpeg, png, webp) formats.',
    'img_rem_fail' => 'Failed to delete image.',
    'file_too_large' => 'Image size must be below 5MB!',
    'added_fail' => 'Failed to add content.',
    'remove_failed' => 'Failed to remove content. Server down!',
    'upload_failed' => 'Failed to upload the content.'
  ];
}

// Function to display alerts based on alert type
function displayAlert($type) {
  global $alert_messages;
  echo <<<HTML
    <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
      <strong>{$alert_messages[$type]}</strong>
    </div>
HTML;
}

// Function to display success messages based on success type
function displaySuccess($type) {
  $success_messages = [
    'updated' => 'Product updated.',
    'added' => 'Content added.',
    'removed' => 'Content removed.',
    'set' => 'New password set successfully.'
  ];
  echo <<<HTML
    <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
      <strong>{$success_messages[$type]}</strong>
    </div>
HTML;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Your custom CSS file -->
  <link rel="stylesheet" href="login.css">
</head>
<body class="bg-light">
  <!-- Navbar -->
  <nav class="container text-light p-3 rounded my-4" style="background-color: #5DBB63;">
    <div class="d-flex align-items-center justify-content-between px-3">
      <h2>
        <a href="index_merchant.php" class="text-black text-decoration-none">
          <img src="images/EcoTrace Logo.png" style="width:100px;" alt="Logo"> Welcome back, Admin
        </a>
      </h2>
      <div class="d-flex align-items-center">
        <!-- Add Content button triggering modal -->
        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addContentModal">
          <i class="bi bi-plus-lg"></i> Add Content
        </button>
        <!-- Logout button -->
        <a href="index.php?logout=1" type="button" class="btn btn-danger" >
          <i class="bi bi-box-arrow-left"></i> Logout
        </a>
      </div>
    </div>
  </nav>

  <!-- Alerts -->
  <?php
  if(isset($_GET['alert']) && isset($alert_messages[$_GET['alert']])) {
    displayAlert($_GET['alert']);
  }

  if(isset($_GET['success']) && isset($success_messages[$_GET['success']])) {
    displaySuccess($_GET['success']);
  }
  ?>

  <!-- Content Table -->
  <div class="container mt-4 p-0">
    <table class="table table-bordered table-hover text-center">
      <!-- Table Header -->
      <thead class="thead-light">
        <tr>
          <th width="5%" scope="col" class="rounded-start">Sr. No</th>    
          <th width="20%" scope="col">Article/Infographic/Video</th>
          <th width="15%" scope="col">Category</th>
          <th width="15%" scope="col">Title</th>
          <th width="35%" scope="col">Description</th>
          <th width="10%" scope="col" class="rounded-end">Action</th>
        </tr>   
      </thead>

      <!-- Table Body -->
      <tbody class=bg-white>
        <?php
        // Fetch content from database
        $query = "SELECT * FROM eduContent";
        $result = mysqli_query($con, $query);
        $i = 1;
        $fetch_src = FETCH_SRC;

        // Display fetched content in table rows
        while($fetch = mysqli_fetch_assoc($result)) {
          echo <<<HTML
            <tr class="align-middle">
              <th scope="row">$i</th>
              <td><img src="$fetch_src$fetch[content]" width="150px" alt="Content Image"></td>
              <td>$fetch[categoryOfContent]</td>
              <td>$fetch[title]</td>
              <td>$fetch[description]</td>
              <td>
                <button onclick="confirmRem($fetch[contentID])" class="btn btn-danger me-2"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
HTML;
          $i++;
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Add Content Modal -->
  <div class="modal fade" id="addContentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <!-- Modal content -->
  </div>

  <!-- JavaScript and Bootstrap Bundle -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Your custom JavaScript -->
  <script>
       setTimeout(function() {
      document.getElementById('success-msg').style.display = 'none';
    }, 4000);

    setTimeout(function() {
      document.getElementById('alert-msg').style.display = 'none';
    }, 4000);
    
    // Function to confirm content removal
    function confirmRem(id) {
      if(confirm("Are you sure you want to delete this content?")) {
        window.location.href = "crud2.php?rem=" + id;
      }
    }
  </script>
</body>
</html>
