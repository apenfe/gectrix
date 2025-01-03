<?php

namespace App\Observers\personal;

use App\Models\Personal\Soldier;
use Cache;

class SoldierObserver
{
    public function created(Soldier $soldier): void
    {
        Cache::forget('soldiers');
    }

    public function updated(Soldier $soldier): void
    {
        Cache::forget('soldiers');
    }

    public function deleted(Soldier $soldier): void
    {
        Cache::forget('soldiers');
    }
}
