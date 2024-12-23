<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\Frontend\FeedbackController;
use App\Http\Controllers\Frontend\UsersController;
use App\Http\Controllers\Frontend\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes for signup and login
Route::get('/SignUp', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/SignUp', [AuthController::class, 'signup'])->name('signup.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Appointment routes
Route::get('/Appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::post('/Appointment', [AppointmentController::class, 'appointmentForm'])->name('appointment.submit');
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

// Feedback routes
Route::get('/Feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/Feedback', [FeedbackController::class, 'feedbackForm'])->name('feedback.submit');

// Contact form routes
Route::get('/Contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/Contact', [ContactController::class, 'contactForm'])->name('contact.submit');
Route::get('/Fetch_Contact', [ContactController::class, 'viewContacts'])->name('admin.contacts');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// About page route
Route::get('/About', [AboutController::class, 'index'])->name('about');

// Admin-related routes
Route::get('/Fetch_Appointments', [AppointmentController::class, 'viewAppointments'])->name('appointments.view');
Route::get('/Fetch_Feedback', [FeedbackController::class, 'viewFeedback'])->name('admin.feedback');
// Add this route to your existing routes in web.php
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.delete');


// User management routes
Route::get('/Admin-Pannel', [UserController::class, 'index'])->name('users.index');
Route::delete('/admin/users/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
