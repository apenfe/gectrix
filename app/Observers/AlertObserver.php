<?php

namespace App\Observers;

use App\Models\EarlyWarning\Alert;
use Illuminate\Support\Facades\Cache;

class AlertObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Alert $alert): void
    {
        Cache::forget('alerts');
        Cache::forget('alerts_paginates');
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Alert $alert): void
    {
        Cache::forget('alerts');
        Cache::forget('alerts_paginates');
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Alert $alert): void
    {
        Cache::forget('alerts');
        Cache::forget('alerts_paginates');
    }
}
