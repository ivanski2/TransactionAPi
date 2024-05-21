<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

// Регистрация на потребител
Route::post('register', [AuthController::class, 'register']);

// Логин на потребител
Route::post('login', [AuthController::class, 'login']);

// Група маршрути, защитени с Laravel Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Получаване на данни за автентикирания потребител
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    // CRUD операции за Transaction
    Route::apiResource('transactions', TransactionController::class);

    // Логаут на потребител
    Route::post('logout', [AuthController::class, 'logout']);
});
