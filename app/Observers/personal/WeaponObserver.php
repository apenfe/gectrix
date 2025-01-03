<?php

namespace App\Observers\personal;

use App\Models\Personal\Weapon;
use Cache;

class WeaponObserver
{
    public function created(Weapon $weapon): void
    {
        Cache::forget('weapons');
    }

    public function updated(Weapon $weapon): void
    {
        Cache::forget('weapons');
    }

    public function deleted(Weapon $weapon): void
    {
        Cache::forget('weapons');
    }
}
