<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/users', [UserController::class, 'store']);
// Route::get('/users/{id}', [UserController::class, 'update']);
// Route::get('/users/{id}', [UserController::class, 'destroy']);

// resource route
Route::resource('users', UserController::class)
->except(['create', 'edit']);