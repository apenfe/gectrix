<?php

use App\Http\Controllers\BrigadeController;
use App\Http\Controllers\CommanderController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\SoldierController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WeaponController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/personal', 'personal.module_personal')->name('personal');

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
