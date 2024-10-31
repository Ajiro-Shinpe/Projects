<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blah Blah</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
 <h2 class="text-center text-white"alert-dark > Books Info</h2> <br>  
  <table class="table ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Auther</th>
        <th>Gendrer</th>
        <th>Publish Year</th>
        <th>Copies Available</th>
        <th colspan="2" style="text-align:center;">Actions</th>

       
      </tr>
    </thead>
    <tbody>
    <tbody>
        <?php
        include('conn.php');
        $qry = "select * from book";
        $res = mysqli_query($db_conn, $qry);
        while($row= mysqli_fetch_array($res))
        { 
        ?>

      <tr>
    <!-- $sql = "INSERT INTO book VALUES (null,'$Title','$Auther','$genre','$publish_year','$Copies_Available')"; -->

        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['Title']; ?></td>
        <td><?php echo $row['Author']; ?></td>
        <td><?php echo $row['genre']; ?></td>
        <td><?php echo $row['publish_year']; ?></td>
        <td><?php echo $row['copies_ava']; ?></td>
        <td><a class="btn btn-success" href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
        <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>