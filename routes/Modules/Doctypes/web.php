<?php

use Illuminate\Support\Facades\Route;

// Doctypes Web Routes
Route::prefix('doctypes')->name('doctypes.')->group(function () {
    // Main doctypes SPA route
    Route::get('/', function () {
        return view('doctypes');
    })->name('index');
    
    // Catch-all route for Vue Router
    Route::get('/{any}', function () {
        return view('doctypes');
    })->where('any', '.*')->name('spa');
});