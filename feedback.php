<?php
// PHP code to handle database operations
// ...

// HTML code for displaying feedback and forms
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Additional CSS styles -->
</head>
<body>

<div class="container">
    <h1>Feedback</h1>
    <!-- Display existing feedback entries -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display feedback entries -->
            <?php foreach ($feedbackEntries as $entry): ?>
                <tr>
                    <td><?php echo $entry['id']; ?></td>
                    <td><?php echo $entry['name']; ?></td>
                    <td><?php echo $entry['email']; ?></td>
                    <td><?php echo $entry['message']; ?></td>
                    <td>
                        <form method="post" action="delete_feedback.php">
                            <input type="hidden" name="id" value="<?php echo $entry['id']; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Form to add new feedback -->
    <form method="post" action="add_feedback.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>

</body>
</html>