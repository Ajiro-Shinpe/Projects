<?php
include './db.php';
include './header.php';
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $cpassword =  $_POST['cpassword'];

    
    // Check if the user already exists
    $existSql = "SELECT * FROM users WHERE email='$email' OR username='$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    
    if ($numExistRows > 0) {
        $showError = "Email or Username already exists.";
    } else {
        
        if($password == $cpassword){
            // Hash the password
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            // $sql = "INSERT INTO users (username, email, password, date) VALUES ('$username', '$email', '$password', current_timestamp())";
            $sql = "INSERT INTO users (username, email, password, date) VALUES ('$username', '$email', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = "You have successfully signed up.";
            } else {
                $showError = "There was an error during registration. Please try again.";
            }
        } else {
            $showError = "Passwords do not match.";
        }
    }
}

// Show alert if the signup is successful
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> ' . $showAlert . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> ' . $showError . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>

<div class="container">
    <h1 class="text-center">Please Sign Up</h1>
    <form action="./signup.php" method="post">
        
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
            <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="cpassword" class="form-control" id="floatingCPassword" placeholder="Confirm Password" required>
            <label for="floatingCPassword">Confirm Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>

<?php
include './footer.php';
?>
