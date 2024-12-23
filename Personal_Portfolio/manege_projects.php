<?php
// Include database configuration
include './config.php';

// Add or Update Portfolio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
    $desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
    $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);

    // Handle cover image upload
    $cover_image = '';
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
        $image_info = getimagesize($_FILES['cover_image']['tmp_name']);
        if ($image_info) {
            $cover_image = 'uploads/' . time() . '_' . basename($_FILES['cover_image']['name']);
            move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image);
        } else {
            die("Invalid image file.");
        }
    }

    // Check if the category exists
    $category_query = "SELECT * FROM category WHERE id = ?";
    $category_stmt = $conn->prepare($category_query);
    $category_stmt->bind_param("i", $category);
    $category_stmt->execute();
    $category_result = $category_stmt->get_result();

    if ($category_result->num_rows > 0) {
        // Insert into portfolio table
        $sql = "INSERT INTO portfolio (title, category, url, `desc`, `date`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisss", $title, $category, $url, $desc, $date);

        if ($stmt->execute()) {
            $portfolio_id = $stmt->insert_id;

            // Insert cover image into portfolio_images table
            if ($cover_image) {
                $cover_sql = "INSERT INTO portfolio_images (portfolio_id, image, is_cover) VALUES (?, ?, 1)";
                $cover_stmt = $conn->prepare($cover_sql);
                $cover_stmt->bind_param("is", $portfolio_id, $cover_image);
                $cover_stmt->execute();
            }

            // Upload and insert additional images
            if (!empty($_FILES['images']['name'][0])) {
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $additional_image_name = 'uploads/' . time() . '_' . basename($_FILES['images']['name'][$key]);
                    move_uploaded_file($tmp_name, $additional_image_name);

                    $additional_sql = "INSERT INTO portfolio_images (portfolio_id, image, is_cover) VALUES (?, ?, 0)";
                    $additional_stmt = $conn->prepare($additional_sql);
                    $additional_stmt->bind_param("is", $portfolio_id, $additional_image_name);
                    $additional_stmt->execute();
                }
            }

            echo "Portfolio added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: Category doesn't exist.";
    }
}

// Delete Portfolio
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    // Delete images first
    $delete_images_sql = "DELETE FROM portfolio_images WHERE portfolio_id=?";
    $delete_images_stmt = $conn->prepare($delete_images_sql);
    $delete_images_stmt->bind_param("i", $id);
    $delete_images_stmt->execute();

    // Delete portfolio
    $delete_sql = "DELETE FROM portfolio WHERE id=?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $id);
    if ($delete_stmt->execute()) {
        echo "Project deleted successfully!";
    } else {
        echo "Error: " . $delete_stmt->error;
    }
}

// Fetch Projects
$projects = $conn->query("SELECT * FROM portfolio ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Projects</title>
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
<div class="container-fluid mt-5 bg-dark text-white">
    <h2 class="text-center mb-4">Manage Projects</h2>

    <!-- Add Portfolio Form -->
    <div class="card mb-4 bg-dark text-white border rounded">
        <div class="card-body">
            <h4 class="mb-3">Add Portfolio</h4>
            <form method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="" disabled selected>Choose a category</option>
                            <?php
                            $cat_result = $conn->query("SELECT * FROM category");
                            while ($cat = $cat_result->fetch_assoc()) {
                                echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="url" class="form-label">Project URL</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Completion Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-12">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="cover_image" class="form-label">Cover Image</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" required>
                    </div>
                    <div class="col-md-6">
                        <label for="images" class="form-label">Additional Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
    <table class="table table-bordered table-striped table-dark align-middle">
        <thead class="table-dark">
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">URL</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody class="table-dark">
        <?php while ($project = $projects->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $project['id']; ?></td>
                <td class="text-wrap"><?php echo $project['title']; ?></td>
                <td class="text-wrap"><?php echo $project['category']; ?></td>
                <td>
                    <a href="<?php echo $project['url']; ?>" target="_blank" class="text-truncate" style="max-width: 200px; display: inline-block;"><?php echo $project['url']; ?></a>
                </td>
                <td><?php echo $project['date']; ?></td>
                <td class="d-flex gap-2">
                    <a href="./edit_portfolio.php?edit=<?php echo $project['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?delete=<?php echo $project['id']; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
