<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auto-load module routes
require __DIR__ . '/modules.php';
