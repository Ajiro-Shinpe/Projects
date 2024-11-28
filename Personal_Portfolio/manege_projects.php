<?php
include './config.php'; // Include database configuration

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Upload cover image
    $cover_image = '';
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        $cover_image = 'uploads/' . time() . '_' . basename($_FILES['cover_image']['name']);
        move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image);
    }

    // Insert into portfolio table
    $sql = "INSERT INTO portfolio (title, category, url, `desc`, `date`) 
            VALUES ('$title', '$category', '$url', '$desc', '$date')";
    
    if (mysqli_query($conn, $sql)) {
        $portfolio_id = mysqli_insert_id($conn); // Get inserted portfolio ID

        // Insert cover image into portfolio_images
        $cover_sql = "INSERT INTO portfolio_images (portfolio_id, image, is_cover) 
                      VALUES ('$portfolio_id', '$cover_image', 1)";
        mysqli_query($conn, $cover_sql);

        // Upload and insert additional images
        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $image_name = 'uploads/' . time() . '_' . basename($_FILES['images']['name'][$key]);
                move_uploaded_file($tmp_name, $image_name);

                $additional_sql = "INSERT INTO portfolio_images (portfolio_id, image, is_cover) 
                                   VALUES ('$portfolio_id', '$image_name', 0)";
                mysqli_query($conn, $additional_sql);
            }
        }

        echo "Portfolio added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
// DELETE logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    // Delete images first
    $delete_images_sql = "DELETE FROM portfolio_images WHERE portfolio_id='$id'";
    mysqli_query($conn, $delete_images_sql);

    // Delete project
    $delete_sql = "DELETE FROM portfolio WHERE id='$id'";
    if (mysqli_query($conn, $delete_sql)) {
        echo "Project deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch projects
$projects = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Projects</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Projects</h2>

    <!-- Add/Edit Project Form -->
    <div class="card mb-4">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Portfolio</h2>
        <form method="POST" enctype="multipart/form-data">
            <!-- Portfolio Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" selected disabled>Choose a category</option>
                    <?php
                    // Fetch categories from the database
                    include 'db_connection.php';
                    $cat_query = "SELECT * FROM category";
                    $cat_result = mysqli_query($conn, $cat_query);

                    if ($cat_result && $cat_result->num_rows > 0) {
                        while ($cat = mysqli_fetch_assoc($cat_result)) {
                            echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No categories available</option>";
                    }
                    ?>
                </select>
            </div>

   
            <!-- URL -->
            <div class="mb-3">
                <label for="url" class="form-label">Project URL</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
            </div>

            <!-- Date -->
            <div class="mb-3">
                <label for="date" class="form-label">Completion Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <!-- Cover Image -->
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" required>
            </div>

            <!-- Additional Images -->
            <div class="mb-3">
                <label for="images" class="form-label">Additional Images</label>
                <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form=>
    </div>
   </div>

    <!-- Project List -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>URL</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($project = mysqli_fetch_assoc($projects)) { ?>
            <tr>
                <td><?php echo $project['id']; ?></td>
                <td><?php echo $project['title']; ?></td>
                <td><?php echo $project['category']; ?></td>
                <td><a href="<?php echo $project['url']; ?>" target="_blank">View</a></td>
                <td><?php echo $project['date']; ?></td>
                <td>
                    <a href="./edit_portfolio.php?edit=<?php echo $project['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?delete=<?php echo $project['id']; ?>" class="btn btn-sm btn-danger" 
                       onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
    // Fill form with existing data for editing
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('edit')) {
        const projectId = urlParams.get('edit');
        fetch(`get_project.php?id=${projectId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('projectId').value = data.id;
                document.getElementById('title').value = data.title;
                document.getElementById('category').value = data.category;
                document.getElementById('url').value = data.url;
                document.getElementById('desc').value = data.desc;
                document.getElementById('date').value = data.date;
            });
    }
</script>
</body>
</html>
