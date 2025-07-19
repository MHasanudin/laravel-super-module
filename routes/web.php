<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/doctypes', 'doctypes');

// Auto-load module routes
require __DIR__ . '/modules.php';
