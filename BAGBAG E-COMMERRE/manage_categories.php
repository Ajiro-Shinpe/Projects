<?php
session_start();
include 'db.php';
include 'header.php';

// Fetch categories for update or delete
$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->get_result();
?>

<div class="container">
    <h1>Manage Categories</h1>

    <!-- Add Category Form -->
    <h2>Add New Category</h2>
    <form action="process_category.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" id="category_name" name="category_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category_image" class="form-label">Category Image</label>
            <input type="file" id="category_image" name="category_image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" name="action" value="insert" class="btn btn-primary">Add Category</button>
    </form>

<!-- Update/Delete Category -->
<h2>Existing Categories</h2>
<?php if ($categories->num_rows > 0): ?>
<form action="process_category.php" method="post" enctype="multipart/form-data">
    <table class="table">
        <thead>
            <tr>
                <th>Select</th>
                <th>Category Name</th>
                <th>Category Image</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($category = $categories->fetch_assoc()): ?>
            <tr>
                <td>
                    <input type="radio" name="category_id" value="<?php echo htmlspecialchars($category['id']); ?>" required>
                </td>
                <td><?php echo htmlspecialchars($category['name']); ?></td>
                <td>
                    <?php if ($category['image']): ?>
                        <img src="images/<?php echo htmlspecialchars($category['image']); ?>" alt="<?php echo htmlspecialchars($category['name']); ?>" style="width: 100px;">
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="mb-3">
        <button type="submit" name="action" value="update" class="btn btn-warning">Update Category</button>
        <button type="submit" name="action" value="delete" class="btn btn-danger">Delete Category</button>
    </div>
    <div class="mb-3">
        <label for="update_category_name" class="form-label">New Category Name (optional)</label>
        <input type="text" id="update_category_name" name="update_category_name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="update_category_image" class="form-label">New Category Image (optional)</label>
        <input type="file" id="update_category_image" name="update_category_image" class="form-control" accept="image/*">
    </div>
</form>
<?php else: ?>
    <p>No categories available.</p>
<?php endif; ?>
</div>

<?php
include 'footer.php';
?>
