<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware(['auth:sanctum','isAdmi']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//for admin

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
//car
Route::post('/car', [CarController::class, 'store'])->middleware('auth:sanctum');

Route::get('/cars', [CarController::class, 'index']);

//bid
Route::post('/bid/store', [BidController::class, 'store'])->middleware('auth:sanctum');

//search car
Route::get('/search', [CarController::class, 'searchCar']);
