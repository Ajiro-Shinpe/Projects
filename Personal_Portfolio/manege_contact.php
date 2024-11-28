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
<body class="bg-dark text-white">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./Admin.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./manege_projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manege_category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manege_contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5 bg-dark">
    <h2 class="text-center mb-4">Manage Contact Messages</h2>

    <!-- Contact Messages Table -->
    <div class="card bg-dark text-white">
        <div class="card-body bg-dark border rounded">
            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle">
                    <thead class="table-dark">
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td class="table-dark"><?php echo $row['id']; ?></td>
                                    <td class="table-dark text-wrap"><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td class="text-wrap table-dark"><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td class="text-wrap table-dark"><?php echo htmlspecialchars($row['subject']); ?></td>
                                    <td class="text-wrap table-dark"><?php echo nl2br(htmlspecialchars($row['msg'])); ?></td>
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
