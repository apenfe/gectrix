<?php

use App\Http\Controllers\EarlyWarning\AlertController;
use App\Http\Controllers\EarlyWarning\CopernicusController;
use App\Http\Controllers\EarlyWarning\EarlyWarningController;
use App\Http\Controllers\EarlyWarning\SatController;
use App\Http\Controllers\EarlyWarning\TargetController;
use App\Http\Controllers\Personal\BrigadeController;
use App\Http\Controllers\Personal\CommanderController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Personal\SoldierController;
use App\Http\Controllers\Personal\VehicleController;
use App\Http\Controllers\Personal\WeaponController;
use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/early-warning', EarlyWarningController::class)->name('early-warning');
Route::resource('alerts', AlertController::class);
Route::resource('targets', TargetController::class);
Route::post('/telegram', [TelegramController::class, 'store'])->name('telegram.store');
Route::post('/telegram/{alert}', [TelegramController::class, 'notifyAlert'])->name('telegram.notify');
Route::get('/targets/{target}/sat', [SatController::class, 'create'])->name('sat.create');
Route::post('/targets/{target}/sat', [SatController::class, 'store'])->name('sat.store');
Route::delete('/targets/{target}/sat/{sat}', [SatController::class, 'destroy'])->name('sat.destroy');

Route::get('/copernicus/token', [CopernicusController::class, 'getAccessToken']);
//Route::get('/sentinel', [CopernicusController::class, 'sentinel']);
//Route::get('/sentinel1', [CopernicusController::class, 'sentinel1']);
//Route::get('/sentinel2', [CopernicusController::class, 'sentinel2']);
//Route::get('/descargar-imagen', [CopernicusController::class, 'descargarProducto']);

Route::prefix('personal')->group(function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personal.index');
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('personal.vehicles');
    Route::get('/soldiers', [SoldierController::class, 'index'])->name('personal.soldiers');
    Route::get('/commander', [CommanderController::class, 'index'])->name('personal.commanders');
    Route::get('/weapons', [WeaponController::class, 'index'])->name('personal.weapons');
    Route::get('/brigadas', [BrigadeController::class, 'index'])->name('personal.brigades');
});

Route::resource('weapons', WeaponController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('soldiers', SoldierController::class);
Route::post('/soldiers/{soldier}/unroll', [SoldierController::class, 'unroll'])->name('soldiers.unroll');
Route::post('/soldiers/{soldier}/kill', [SoldierController::class, 'kill'])->name('soldiers.kill');
Route::resource('commanders', CommanderController::class);
Route::post('/commanders/{commander}/unroll', [SoldierController::class, 'unroll'])->name('commanders.unroll');
Route::post('/commanders/{commander}/kill', [SoldierController::class, 'kill'])->name('commanders.kill');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
