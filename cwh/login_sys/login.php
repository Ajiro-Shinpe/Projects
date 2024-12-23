<?php
include './db.php';
include './header.php';

$login = false;
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];    
    // Fetch the user details based on the username
    $sql = "SELECT * FROM users WHERE username='$username'";
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
            $_SESSION['username'] = $username;
            header('location:index.php');
            exit;
        } else {
            $showError = "Invalid credentials. Please check your password.";
        }
    } else {
        $showError = "Account not found. Please check your username.";
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
?>

<div class="container">
    <h1 class="text-center">Please Sign In</h1>
    <form action="./login.php" method="post">
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>

<?php
include './footer.php';
?>
