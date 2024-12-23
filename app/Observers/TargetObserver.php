<?php

namespace App\Observers;

use App\Models\Target;
use Cache;

class TargetObserver
{
    public function created(Target $target): void
    {
        Cache::forget('targets');
    }

    public function updated(Target $target): void
    {
        Cache::forget('targets');
    }

    public function deleted(Target $target): void
    {
        Cache::forget('targets');
    }
}
