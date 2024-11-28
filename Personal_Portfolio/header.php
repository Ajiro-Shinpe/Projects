<?php
// Get the current script name without extension
$currentPage = basename($_SERVER['PHP_SELF'], ".php");

// Define dynamic titles and meta descriptions for each page
$pageMeta = [
    "index" => [
        "title" => "Home",
        "description" => "Welcome to Muhammad Adil Khan's personal portfolio website. Explore my skills, projects, and professional journey."
    ],
    "about" => [
        "title" => "About",
        "description" => "Learn about Muhammad Adil Khan's background, experiences, and professional expertise."
    ],
    "resume" => [
        "title" => "Resume",
        "description" => "View Muhammad Adil Khan's resume, showcasing skills, experience, and achievements."
    ],
    "services" => [
        "title" => "Services",
        "description" => "Discover the range of services offered by Muhammad Adil Khan, from web development to consulting."
    ],
    "portfolio" => [
        "title" => "Portfolio",
        "description" => "Explore the portfolio of Muhammad Adil Khan, featuring a collection of completed projects."
    ],
    "portfolio-details" => [
        "title" => "Portfolio Details",
        "description" => "Dive into the details of specific projects by Muhammad Adil Khan, showcasing technical expertise and creativity."
    ],
    "contact" => [
        "title" => "Contact",
        "description" => "Get in touch with Muhammad Adil Khan for inquiries, collaborations, or services."
    ]
];

// Set the title and description based on the current page or default values
$title = "Muhammad Adil Khan - " . ($pageMeta[$currentPage]['title'] ?? "Personal Portfolio Website");
$description = $pageMeta[$currentPage]['description'] ?? "Explore the personal portfolio website of Muhammad Adil Khan, showcasing skills, projects, and professional journey.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= htmlspecialchars($title); ?></title>
    <meta name="description" content="<?= htmlspecialchars($description); ?>">
    <meta name="keywords" content="Muhammad Adil Khan, Portfolio, Web Developer, Projects, Skills, Resume, Services, Contact">

    <!-- Favicons -->
    <link href="./assets/img/profile.png" rel="icon">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="<?= $currentPage ?>-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="./index.php" class="logo d-flex align-items-center">
            <h1 class="sitename">Muhammad Adil Khan</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="./index.php" class="<?= $currentPage === 'index' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="./about.php" class="<?= $currentPage === 'about' ? 'active' : ''; ?>">About</a></li>
                <li><a href="./resume.php" class="<?= $currentPage === 'resume' ? 'active' : ''; ?>">Resume</a></li>
                <li><a href="./services.php" class="<?= $currentPage === 'services' ? 'active' : ''; ?>">Services</a></li>
                <li><a href="./portfolio.php" class="<?= $currentPage === 'portfolio' ? 'active' : ''; ?>">Portfolio</a></li>
                <li><a href="./contact.php" class="<?= $currentPage === 'contact' ? 'active' : ''; ?>">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
