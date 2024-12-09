<?php

use App\Http\Controllers\Api\V1\AlertController;
use App\Http\Controllers\Api\V1\TargetController;

Route::apiResource('targets', TargetController::class);

Route::apiResource('alerts', AlertController::class)->except(['update', 'destroy', 'store']);
Route::post('alerts', [AlertController::class, 'store'])->middleware('auth:sanctum');
Route::delete('alerts/{alert}', [AlertController::class, 'destroy'])->middleware('auth:sanctum');
Route::put('alerts/{alert}', [AlertController::class, 'update'])->middleware('auth:sanctum');
Route::post('alerts/position', [AlertController::class, 'position']);
