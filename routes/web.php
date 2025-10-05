<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/voting-settings', [HomeController::class, 'votingSettings'])->name('voting.settings');
