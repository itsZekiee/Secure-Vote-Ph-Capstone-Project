<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\GoogleOneTapController;
use App\Http\Controllers\ElectionFormController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/welcome', function () {
    return view('user-welcome');
})->name('user-welcome');

// Voting page (public)
Route::get('/vote/{formId}', [VoteController::class, 'show'])->name('vote.show');

// Authentication routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google SSO (Socialite) Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Google One Tap Routes
Route::post('auth/google/one-tap/callback', [GoogleOneTapController::class, 'handleCallback']);


// Election Form Routes 
Route::post('/api/forms', [ElectionFormController::class, 'store'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);




// Protected routes - require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/ma-voterRecord', [HomeController::class, 'voterRecord'])->name('ma-voterRecord');
    Route::get('/ma-votingSettings', [HomeController::class, 'votingSettings'])->name('ma-votingSettings');
    Route::get('/ma-create-form', [HomeController::class, 'createForm'])->name('ma-createForm');
    Route::get('/ma-partylist-page', [HomeController::class, 'partylistManagement'])->name('ma-partylist');
    Route::get('/ma-candidate-page', [HomeController::class, 'candidateManagement'])->name('ma-candidate');
    Route::get('/ma-analytics-page', [HomeController::class, 'analytics'])->name('ma-analytics-page');

    // Candidate management routes
    Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
    Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
    Route::get('/candidates/{candidate}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
    Route::put('/candidates/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
    Route::delete('/candidates/{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

    // Partylist management routes
    Route::get('/partylists', [PartylistController::class, 'index'])->name('partylists.index');
    Route::post('/partylists', [PartylistController::class, 'store'])->name('partylists.store');
    Route::get('/partylists/{id}', [PartylistController::class, 'show'])->name('partylists.show');
    Route::get('/partylists/{id}/edit', [PartylistController::class, 'edit'])->name('partylists.edit');
    Route::put('/partylists/{id}', [PartylistController::class, 'update'])->name('partylists.update');
    Route::delete('/partylists/{id}', [PartylistController::class, 'destroy'])->name('partylists.destroy');
});
