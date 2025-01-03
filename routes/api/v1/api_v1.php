<?php

use App\Http\Controllers\Api\V1\AlertController;
use App\Http\Controllers\Api\V1\auth\AuthController;
use App\Http\Controllers\Api\V1\TargetController;

//Route::apiResource('targets', TargetController::class);

Route::middleware(['throttle:targets', 'auth:sanctum'])->group(function () {
    Route::apiResource('targets', TargetController::class)->except(['update', 'destroy', 'store']); //->middleware('auth:sanctum');
    Route::post('targets', [TargetController::class, 'store']);
    Route::delete('targets/{target}', [TargetController::class, 'destroy']);
    Route::put('targets/{target}', [TargetController::class, 'update']);
    Route::post('targets/position', [TargetController::class, 'position']);
});

Route::middleware(['throttle:alerts'])->group(function () {
    Route::apiResource('alerts', AlertController::class)->except(['update', 'destroy', 'store']);
    Route::post('alerts', [AlertController::class, 'store'])->middleware('auth:sanctum');
    Route::delete('alerts/{alert}', [AlertController::class, 'destroy'])->middleware('auth:sanctum');
    Route::put('alerts/{alert}', [AlertController::class, 'update'])->middleware('auth:sanctum');
    Route::post('alerts/position', [AlertController::class, 'position']);
});

Route::post('loginapi', [AuthController::class, 'loginapi'])->name('loginapi');
Route::post('change-token', [AuthController::class, 'changeToken'])->middleware('auth:sanctum')->name('change-token');
Route::post('change-tokens', [AuthController::class, 'changeTokens'])->middleware('auth:sanctum')->name('change-tokens');
