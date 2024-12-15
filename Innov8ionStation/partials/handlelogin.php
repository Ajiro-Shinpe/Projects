<?php
include '../partials/config.php';
include '../partials/header.php';

$login = false;
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];    
    // Fetch the user details based on the username
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            $login = true;
            $showAlert = "You are logged in";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            header('location:/iforum/index.php?loggedin=success');
            exit;
        } else {
            $showError = "Invalid credentials. Please check your password.";
            header('location:/iforum/?loggedin=failed');
        }
    } else {
        $showError = "Account not found. Please check your username.";
        header('location:/iforum/?loggedin=failed');
    }
}

// Show alert if the login is successful
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> ' . $showAlert . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

// Show error message if login fails
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> ' . $showError . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

include '../partials/footer.php';
?>
