<?php
require __DIR__ . '/../partials/config.php';
session_start(); // Ensure session is started before using session variables
// Display signup status messages
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Innov8ionStation</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body class="bg-dark">
<?php
$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
?>    
    
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-danger fw-bold" href="/iforum">Innov8ionStation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/iforum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $sql_qeury = "SELECT category_name, category_id FROM categories LIMIT 5";
                        $result = mysqli_query($conn ,$sql_qeury);
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<li><a class="dropdown-item" href="/iforum/threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search"  method="get" action="/iforum/partials/search_result.php">
                <input class="form-control me-2 "  name="search" type="search" placeholder="Search Threads" aria-label="Search">
                <button class="btn btn-outline-success " type="submit"><i class="bi bi-search m-0"></i></button>
            </form>
            <?php if ($loggedin): ?>
                <a class="btn btn-outline-danger mx-2" href="/iforum/partials/logout.php">LOG OUT</a>
            <?php else: ?>
                
            <button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#signupModal">
                SignUp
            </button>

            <button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#loginModal">
                login
            </button>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php
if(isset($_GET['logout']) == "success"){
    echo '<div class="alert alert-success alert-dismissible m-0 fade show" role="alert">
    LogOut Successfully!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

}
if (isset($_GET['loggedin'])) {
    if($_GET['loggedin'] == "failed"){
        echo '<div class="alert alert-danger alert-dismissible m-0 fade show" role="alert">
        Log In Failed! Try Again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    elseif($_GET['loggedin'] == "success"){
        echo '<div class="alert alert-success alert-dismissible m-0 fade show" role="alert">
         login Successful!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
}

if (isset($_GET['signupsuccess'])) {
    if ($_GET['signupsuccess'] == "true") {
        echo '<div class="alert alert-success alert-dismissible m-0 fade show" role="alert">
              Sign Up Successful! You can now login.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } elseif ($_GET['signupsuccess'] == "false") {
        echo '<div class="alert alert-danger alert-dismissible m-0 fade show" role="alert">
              Sign Up Failed! Try Again.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible m-0 fade show" role="alert">
      login To Countinue.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

    }
}

// include './partials/navbar.php';

// echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') : ''; 
// Safely echo username if set
?>
