<?php

namespace App\Observers\personal;

use App\Models\Personal\Commander;
use Cache;

class CommanderObserver
{
    public function created(Commander $commander): void
    {
        Cache::forget('commanders');
    }

    public function updated(Commander $commander): void
    {
        Cache::forget('commanders');
    }

    public function deleted(Commander $commander): void
    {
        Cache::forget('commanders');
    }
}
