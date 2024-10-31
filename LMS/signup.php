<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
  <h2>Create Your New Account</h2>
  <form action="register.php" method="post">
    <div class="form-group">
      <label for="name">Enter Your Full Name:</label>
      <input type="text" class="form-control" placeholder="Enter Your Full Name" name="fname">
    </div>
    <div class="form-group">
      <label for="uname">Enter Your Username:</label>
      <input type="text" class="form-control" placeholder="Enter Your Username" name="uname">
    </div>
    <div class="form-group">
      <label for="pasw">Enter Your Password:</label>
      <input type="password" class="form-control" placeholder="Enter Your Password" name="pasw">
    </div>
    <button type="submit" class="btn btn-primary">Sign Up Now</button>
  </form>
</div>

</body>
</html>
