<?php
// Include database configuration
include './config.php';

// Insert Category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    if (!empty($name)) {
        $sql = "INSERT INTO category (name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            echo "Category added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Category name cannot be empty.";
    }
}

// Delete Category
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $delete_sql = "DELETE FROM category WHERE id=?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Category deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch Categories
$categories = $conn->query("SELECT * FROM category ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
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
<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Categories</h2>

    <!-- Add Category Form -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="mb-3">Add New Category</h4>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Category</button>
            </form>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-dark align-middle">
            <thead class="table-dark">
            <tr class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody class="table-dark">
            <?php if ($categories->num_rows > 0) { 
                while ($category = $categories->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td class="text-wrap"><?php echo htmlspecialchars($category['name']); ?></td>
                        <td>
                            <a href="?delete=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="3" class="text-center">No categories found</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
