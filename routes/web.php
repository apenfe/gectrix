<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/personal', 'personal.module_personal')->name('personal');

Route::prefix('personal')->group(function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personal.index');
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('personal.vehiculos');
    Route::get('/soldiers', [SoldierController::class, 'index'])->name('personal.soldados');
    Route::get('/commander', [CommanderController::class, 'index'])->name('personal.mandos');
    Route::get('/weapons', [WeaponController::class, 'index'])->name('personal.armas');
    Route::get('/brigadas', [BrigateController::class, 'index'])->name('personal.brigadas');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
