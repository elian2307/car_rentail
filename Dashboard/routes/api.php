<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::resource('/brands', \App\Http\Controllers\Api\BrandsController::class);
Route::resource('/cars', \App\Http\Controllers\Api\CarsController::class);
Route::resource('/drivers', \App\Http\Controllers\Api\DriversController::class);
Route::resource('/loyalty-levels', \App\Http\Controllers\Api\LoyaltyLevelsController::class);
Route::resource('/payments', \App\Http\Controllers\Api\PaymentsController::class);
Route::resource('/rentals', \App\Http\Controllers\Api\RentalsController::class);
Route::resource('/users', \App\Http\Controllers\Api\UsersController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::put('/user', [AuthController::class, 'updateUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});