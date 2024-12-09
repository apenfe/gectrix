<?php

namespace App\Providers;

use App\Models\Alert;
use App\Observers\AlertObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Alert::observe(AlertObserver::class);
    }
}
