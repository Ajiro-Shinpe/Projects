<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Elegence</title>
</head>
<style>
    body{
        font-family: 'inter';
    }
     p{
        font-size: x-large;
    }
</style>

<body>
    <!-- Nervbar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Elegence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/About') }}">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/Contact') }}">Contact</a></li>
                            <li><a class="dropdown-item" href="{{ url('/Appointment') }}">Appointment</a></li>
                            <li><a class="dropdown-item" href="{{ url('/Feedback') }}">Feedback</a></li>
                        </ul>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signup.form') }}">SignUp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    