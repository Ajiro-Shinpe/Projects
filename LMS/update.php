<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Book Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Update Your Book Info</h2>
  <form action="edit.php" method="post">
  <?php
            include('conn.php');
            $id = $_REQUEST['id'];
            // Updated query to fetch only the record with the matching ID
            $qry = "SELECT * FROM book WHERE id = $id";
            $result = mysqli_query($db_conn, $qry);
            $row = mysqli_fetch_array($result);

            // Check if data is retrieved, if not, display an error
            if (!$row) {
                echo "<p>Book not found!</p>";
                exit();
            }
  ?>
    <!-- ID Field, Hidden, so it won't be changed by the user -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
      <label for="Title">Book Title:</label>
      <input type="text" class="form-control" value="<?php echo $row['Title']; ?>" placeholder="Enter Book Title" name="Title" required>
    </div>
    
    <div class="form-group">
      <label for="Author">Author:</label>
      <input type="text" class="form-control" value="<?php echo $row['Author']; ?>" placeholder="Enter Author Name" name="Author" required>
    </div>

    <div class="form-group">
      <label for="genre">Genre:</label>
      <input type="text" class="form-control" value="<?php echo $row['genre']; ?>" placeholder="Enter Genre" name="genre" required>
    </div>
    
    <div class="form-group">
      <label for="publish_year">Publish Year:</label>
      <input type="number" class="form-control" value="<?php echo $row['publish_year']; ?>" placeholder="Enter Publish Year" name="publish_year" required>
    </div>

    <div class="form-group">
      <label for="copies_ava">Copies Available:</label>
      <input type="number" class="form-control" value="<?php echo $row['copies_ava']; ?>" placeholder="Enter Available Copies" name="copies_ava" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Info</button>
  </form>
</div>

</body>
</html>
