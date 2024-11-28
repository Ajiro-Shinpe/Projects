<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .welcome-card {
            background-color: #ffffff;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body class="bg-dark text-white">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./Admin.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./manege_projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manege_category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manege_contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card welcome-card p-4  border rounded">
                <h2 class="text-center text-primary">Welcome, <?= htmlspecialchars($_SESSION['username']); ?></h2>
                <p class="text-center text-muted mt-2">Manage your projects, categories, and contact queries from this panel.</p>
                <div class="d-flex justify-content-center mt-4">
                    <a href="./manege_projects.php" class="btn btn-primary me-2">Manage Projects</a>
                    <a href="./manege_category.php" class="btn btn-secondary me-2">Manage Categories</a>
                    <a href="./manege_contact.php" class="btn btn-success">Manage Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
