<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController; // Import the MovieController
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Movie routes
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index'); // Route for movie listing

Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
