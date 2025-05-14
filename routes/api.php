<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('menus', MenuController::class);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('coupons', CouponController::class);
Route::apiResource('transactions', TransactionController::class);
Route::apiResource('orders', OrderController::class);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);



