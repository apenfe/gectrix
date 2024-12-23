<?php

namespace App\Observers\personal;

use App\Models\Vehicle;
use Cache;

class VehicleObserver {
    public function created(Vehicle $vehicle): void {
        Cache::forget('vehicles');
    }

    public function updated(Vehicle $vehicle): void {
        Cache::forget('vehicles');
    }

    public function deleted(Vehicle $vehicle): void {
        Cache::forget('vehicles');
    }
}
