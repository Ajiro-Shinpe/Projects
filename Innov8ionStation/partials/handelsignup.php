<?php
// include '/iforum/partials/config.php';
include '../partials/config.php';
include '../partials/header.php';

// -------------sign up --------------
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $cpassword =  $_POST['cpassword'];

    
    // Check if the user already exists
    $existSql = "SELECT * FROM user WHERE email='$email' OR username='$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    
    if ($numExistRows > 0) {
        $showError = "Email or Username already exists.";
    } else {
        
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (username, email, password, created_at) VALUES ('$username', '$email', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = "You have successfully signed up.";
                header("location:/iforum/index.php?signupsuccess=true");
                exit();
            } else {
                $showError = "There was an error during registration. Please try again.";
                header("location:/iforum/index.php?signupSuccess=false&error=$showError");
            }
        } else {
            $showError = "Passwords do not match.";
            header("location:/iforum/index.php?signupSuccess=false&error=$showError");
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
