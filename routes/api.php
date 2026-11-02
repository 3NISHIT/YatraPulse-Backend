<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\BookingsController;
use App\Http\Controllers\Api\DestinationsController;
use App\Http\Controllers\Api\ItinerariesController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\ToursController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [TestController::class, 'index']);
Route::get('/details', [TestController::class, 'data']);
Route::post('/adddestination', [DestinationsController::class, 'store']);
Route::get('/destinations', [DestinationsController::class, 'index']);
Route::get('/bookings', [BookingsController::class, 'index']);
Route::post('/bookings', [BookingsController::class, 'store']);
Route::get('/itineraries', [ItinerariesController::class, 'index']);
Route::post('/additineraries', [ItinerariesController::class, 'store']);
Route::post('/addtour', [ToursController::class, 'store']);
Route::post('/login', [AdminAuthController::class, 'login']);
Route::get('/tours', [ToursController::class, 'index']); // /api/tours
