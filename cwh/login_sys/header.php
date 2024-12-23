<?php
include './session.php';
$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">ISecure</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">HOME</a>
            </li>
            <?php if (!$loggedin): ?>
              <li class="nav-item">
                <a class="nav-link" href="./signup.php">SIGN UP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./login.php">SIGN IN</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="./logout.php">LOG OUT</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

