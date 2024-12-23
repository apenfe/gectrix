<?php

use App\Http\Controllers\Api\V1\AlertController;
use App\Http\Controllers\Api\V1\auth\AuthController;
use App\Http\Controllers\Api\V1\TargetController;

Route::apiResource('targets', TargetController::class);

Route::middleware(['throttle:targets'])->group(function () {
    Route::apiResource('targets', TargetController::class)->except(['update', 'destroy', 'store']);
    Route::post('targets', [TargetController::class, 'store'])->middleware('auth:sanctum');
    Route::delete('targets/{target}', [TargetController::class, 'destroy'])->middleware('auth:sanctum');
    Route::put('targets/{target}', [TargetController::class, 'update'])->middleware('auth:sanctum');
    Route::post('targets/position', [TargetController::class, 'position']);
});

Route::middleware(['throttle:alerts'])->group(function () {
    Route::apiResource('alerts', AlertController::class)->except(['update', 'destroy', 'store']);
    Route::post('alerts', [AlertController::class, 'store'])->middleware('auth:sanctum');
    Route::delete('alerts/{alert}', [AlertController::class, 'destroy'])->middleware('auth:sanctum');
    Route::put('alerts/{alert}', [AlertController::class, 'update'])->middleware('auth:sanctum');
    Route::post('alerts/position', [AlertController::class, 'position']);
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('change-token', [AuthController::class, 'changeToken'])->middleware('auth:sanctum')->name('change-token');
