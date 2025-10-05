<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('ma-dashboard');
Route::get('/ma-voting-record', [HomeController::class, 'voterRecord'])->name('ma-voterRecord');
Route::get('/ma-voting-settings', [HomeController::class, 'votingSettings'])->name('ma-votingSettings');

