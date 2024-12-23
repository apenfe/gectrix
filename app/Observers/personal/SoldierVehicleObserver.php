<?php

namespace App\Observers\personal;

use App\Models\SoldierVehicle;
use Cache;

class SoldierVehicleObserver {
    public function created(SoldierVehicle $soldierVehicle): void {
        Cache::forget('soldiers_vehicles');
    }

    public function updated(SoldierVehicle $soldierVehicle): void {
        Cache::forget('soldiers_vehicles');
    }

    public function deleted(SoldierVehicle $soldierVehicle): void {
        Cache::forget('soldiers_vehicles');
    }
}
