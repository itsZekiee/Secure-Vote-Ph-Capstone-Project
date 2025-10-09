<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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
