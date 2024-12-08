<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AlertController;
use App\Http\Controllers\Api\V1\TargetController;

Route::prefix('v1')->group(function () {
    Route::apiResource('targets', TargetController::class);
    Route::apiResource('alerts', AlertController::class);
});
