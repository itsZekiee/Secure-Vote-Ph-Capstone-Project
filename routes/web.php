<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\Auth\GoogleController; // <-- ADD THIS
use App\Http\Controllers\Auth\GoogleOneTapController; // <-- ADD THIS

// Public routes
// Remove the comment to enable the welcome page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/welcome', function () {
    return view('user-welcome');
})->name('user-welcome');
// Route::get('/', [HomeController::class, 'userdefault'])->name('userDefault');


// Voting page (public)
Route::get('/vote/{formId}', [VoteController::class, 'show'])->name('vote.show');

// Authentication routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------------------------------------------------
// Google SSO (Socialite) Routes
// ----------------------------------------------------------------------
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// ----------------------------------------------------------------------
// Google One Tap Routes (POST request from the front-end)
// ----------------------------------------------------------------------
Route::post('auth/google/one-tap/callback', [GoogleOneTapController::class, 'handleCallback']);

// Protected routes - require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/ma-voterRecord', [HomeController::class, 'voterRecord'])->name('ma-voterRecord');
    Route::get('/ma-votingSettings', [HomeController::class, 'votingSettings'])->name('ma-votingSettings');
    Route::get('/ma-create-form', [HomeController::class, 'createForm'])->name('ma-createForm');
    Route::get('/ma-candidate-page', [HomeController::class, 'candidates'])->name('ma-candidate-page');
    Route::get('/ma-partylist-page', [HomeController::class, 'partylist'])->name('ma-partylist-page');
    Route::get('/ma-analytics-page', [HomeController::class, 'analytics'])->name('ma-analytics-page');
});
