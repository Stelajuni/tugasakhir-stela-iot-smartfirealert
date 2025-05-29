<?php

use App\Http\Controllers\FlameDataController;
use App\Http\Controllers\MQ5DataController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route group name api
Route::group(['as' => 'api.'], function () {
    // resource route
    Route::resource('users', UserController::class)
        ->except(['create', 'edit']);
});

Route::post('/flame', [FlameDataController::class, 'store']);
Route::post('/mq5', [MQ5DataController::class, 'store']);

