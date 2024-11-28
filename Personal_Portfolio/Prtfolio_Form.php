<?php
//   include "./header.php";
  include "./config.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Portfolio</h2>
        <form action="insert_portfolio.php" method="POST" enctype="multipart/form-data">
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
        </form>
    </div>
</body>
</html>
