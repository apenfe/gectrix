<?php

use Illuminate\Support\Facades\Route;

// si recibo api/v1 redirijo a routes/api/v1/api_v1.php
Route::prefix('v1')->group(function () {
    require base_path('routes/api/v1/api_v1.php');
});
