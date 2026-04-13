<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('brands', \App\Http\Controllers\Api\BrandsController::class);
Route::resource('cars', \App\Http\Controllers\Api\CarsController::class);
Route::resource('drivers', \App\Http\Controllers\Api\DriversController::class);
Route::resource('loyalty-levels', \App\Http\Controllers\Api\LoyaltyLevelsController::class);
Route::resource('payments', \App\Http\Controllers\Api\PaymentsController::class);
Route::resource('rentals', \App\Http\Controllers\Api\RentalsController::class);
Route::resource('users', \App\Http\Controllers\Api\UsersController::class);