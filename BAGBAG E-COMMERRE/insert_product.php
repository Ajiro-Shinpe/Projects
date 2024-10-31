<?php
include 'header.php';
?>
<div class="container mt-5">
        <h1 class="mb-4 text-center">Add New Product</h1>
        <form action="add-product.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Product Name" required>
                        <label for="name">Product Name</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="number" id="price" name="price" class="form-control" placeholder="Product Price" required>
                        <label for="price">Product Price</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="brand" name="brand" class="form-control" placeholder="Product Brand" required>
                        <label for="brand">Product Brand</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="color" name="color" class="form-control" placeholder="Product Color" required>
                        <label for="color">Product Color</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="Measurement" name="Measurement" class="form-control" placeholder="Product Measurement" required>
                        <label for="Measurement">Product Measurement</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="Material" name="Material" class="form-control" placeholder="Product Material" required>
                        <label for="Material">Product Material</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <textarea id="description" name="description" class="form-control" placeholder="Product Description" required></textarea>
                        <label for="description">Product Description</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <textarea id="product_details" name="product_details" class="form-control" placeholder="Product Details" required></textarea>
                        <label for="product_details">Product Details</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <select id="category" name="category" class="form-select" required>
                            <?php
                            include 'db.php'; // Ensure this file connects to your database
                            $result = $conn->query("SELECT id, name FROM categories");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No categories available</option>";
                            }
                            ?>
                        </select>
                        <label for="category">Category</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <textarea id="note" name="note" class="form-control" placeholder="Note"></textarea>
                        <label for="note">Note</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="number" id="stock" name="stock" class="form-control" placeholder="Product Stock" required>
                        <label for="stock">Product Stock</label>
                    </div>
                </div>
                
            <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="file" id="image" name="image[]" class="form-control" multiple required>
                        <label for="image">Product Images</label>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary w-100">Add Product</button>
        </form>
    </div>

    <?php
include 'footer.php';
?>