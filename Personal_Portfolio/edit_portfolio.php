<?php 
include './config.php'; // Include database configuration

// Check if we are editing a project
$project = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $query = "SELECT * FROM portfolio WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $project = mysqli_fetch_assoc($result);
    } else {
        echo "Project not found!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Handle cover image upload
    $cover_image = '';
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        $cover_image = 'uploads/' . time() . '_' . basename($_FILES['cover_image']['name']);
        move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image);
    }

    if ($id > 0) {
        // Update project
        $update_sql = "UPDATE portfolio SET 
                        title='$title', 
                        category='$category', 
                        url='$url', 
                        `desc`='$desc', 
                        `date`='$date' 
                        WHERE id='$id'";

        if (mysqli_query($conn, $update_sql)) {
            // Update cover image if provided
            if (!empty($cover_image)) {
                $cover_update_sql = "UPDATE portfolio_images 
                                     SET image='$cover_image' 
                                     WHERE portfolio_id='$id' AND is_cover=1";
                mysqli_query($conn, $cover_update_sql);
            }

            echo "Project updated successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Fetch categories from the database for the select dropdown
$cat_query = "SELECT * FROM category";
$cat_result = mysqli_query($conn, $cat_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portfolio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Portfolio</h2>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hidden input for the project ID -->
        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">

        <!-- Portfolio Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $project['title']; ?>" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled>Select Category</option>
                <?php
                while ($cat = mysqli_fetch_assoc($cat_result)) {
                    $selected = ($project['category'] == $cat['id']) ? 'selected' : '';
                    echo "<option value='{$cat['id']}' $selected>{$cat['name']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Project URL -->
        <div class="mb-3">
            <label for="url" class="form-label">Project URL</label>
            <input type="text" class="form-control" id="url" name="url" value="<?php echo $project['url']; ?>" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" required><?php echo $project['desc']; ?></textarea>
        </div>

        <!-- Date -->
        <div class="mb-3">
            <label for="date" class="form-label">Completion Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $project['date']; ?>" required>
        </div>

        <!-- Cover Image -->
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            <?php if (!empty($project['cover_image'])): ?>
                <img src="<?php echo $project['cover_image']; ?>" alt="Cover Image" width="100" class="mt-2">
            <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Update Project</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
