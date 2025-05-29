<?php

use App\Http\Controllers\FlameDataController;
use App\Http\Controllers\MQ5DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SensorController;
use App\Models\MQSensor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.landing');
});

Route::get('/dashboard', function () {
    $sensors = MQSensor::orderby('created_at', 'desc')->limit(5)->get();
    return view('pages.dashboard', [
        'MQ5'=>$sensors
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

});

Route::get('mq5', [MQ5DataController::class, 'latest_mq5']) -> name('latest_mq5');
Route::get('flame', [FlameDataController::class, 'latest_flame']) -> name('latest_flame');
Route::get('/latest_sensors', [SensorController::class, 'latest_sensors'])->name('latest_sensors');


Route::get('sensor', [SensorController::class, 'sensor']) -> name('pages.sensor');


require __DIR__.'/auth.php';
