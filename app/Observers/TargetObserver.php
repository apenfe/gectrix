<?php

namespace App\Observers;

use App\Models\EarlyWarning\Target;
use Cache;

class TargetObserver
{
    public function created(Target $target): void
    {
        Cache::forget('targets');
        Cache::forget('targets_paginates');
    }

    public function updated(Target $target): void
    {
        Cache::forget('targets');
        Cache::forget('targets_paginates');
    }

    public function deleted(Target $target): void
    {
        Cache::forget('targets');
        Cache::forget('targets_paginates');
    }
}
