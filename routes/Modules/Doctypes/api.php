<?php

use Illuminate\Support\Facades\Route;
use Ngodingskuyy\Doctypes\Http\Controllers\DoctypeApiController;
use Ngodingskuyy\Doctypes\Http\Controllers\DynamicDocumentController;
use Ngodingskuyy\Doctypes\Http\Controllers\DoctypeController;

// DocTypes API Routes
Route::prefix('doctypes')->middleware(config('doctypes.middleware', ['api', 'throttle:60,1']))->group(function () {
    // Main DocType CRUD routes
    Route::apiResource('/', DoctypeApiController::class)->parameters(['' => 'doctype']);

    // Additional DocType endpoints
    Route::get('{doctype}/schema', [DoctypeApiController::class, 'getFormSchema']);
    Route::get('{doctype}/list-config', [DoctypeApiController::class, 'getListConfig']);
    Route::get('{doctype}/stats', [DoctypeApiController::class, 'getStats']);

    // File generation routes
    Route::post('{doctype}/generate', [DoctypeController::class, 'generate']);
    Route::get('{doctype}/generate/preview', [DoctypeController::class, 'getGenerationPreview']);

    // Field management routes
    Route::post('{doctype}/fields', [DoctypeController::class, 'addField']);
    Route::put('{doctype}/fields/{fieldname}', [DoctypeController::class, 'updateField']);
    Route::delete('{doctype}/fields/{fieldname}', [DoctypeController::class, 'removeField']);
});

// Dynamic Document Management Routes
Route::prefix('doctypes/documents')->middleware(config('doctypes.middleware', ['api', 'throttle:120,1']))->group(function () {
    Route::get('{doctype}', [DynamicDocumentController::class, 'index']);
    Route::post('{doctype}', [DynamicDocumentController::class, 'store']);
    Route::get('{doctype}/{id}', [DynamicDocumentController::class, 'show']);
    Route::get('{doctype}/{id}/edit', [DynamicDocumentController::class, 'edit']);
    Route::put('{doctype}/{id}', [DynamicDocumentController::class, 'update']);
    Route::delete('{doctype}/{id}', [DynamicDocumentController::class, 'destroy']);
    Route::post('{doctype}/{id}/duplicate', [DynamicDocumentController::class, 'duplicate']);
});