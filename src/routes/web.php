<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('auth.auth');
});
// Authenticated Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('products', ProductController::class);
});

// Auth Routes (Login/Register/Post)
require __DIR__.'/auth.php';