<?php
include "./config.php";

// Delete message logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Prepare SQL query to delete message
    $delete_sql = "DELETE FROM contact WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo '<script>window.alert("Message deleted successfully!");</script>';
    } else {
        echo '<script>window.alert("ERROR: Unable to delete message!");</script>';
    }
    
    $stmt->close();
}

// Fetch contact messages
$query = "SELECT * FROM contact ORDER BY date DESC";  // Adjust the date column if needed
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contact Messages</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Contact Messages</h2>

    <!-- Contact Messages Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td class="text-wrap"><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td class="text-wrap"><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td class="text-wrap"><?php echo htmlspecialchars($row['subject']); ?></td>
                                    <td class="text-wrap"><?php echo nl2br(htmlspecialchars($row['msg'])); ?></td>
                                    <td>
                                        <!-- Delete button for each contact -->
                                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Are you sure you want to delete this message?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">No messages found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
