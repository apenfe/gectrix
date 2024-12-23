<?php

namespace App\Providers;

use App\Models\Alert;
use App\Models\Commander;
use App\Models\Soldier;
use App\Models\SoldierVehicle;
use App\Models\Target;
use App\Models\Vehicle;
use App\Models\Weapon;
use App\Observers\AlertObserver;
use App\Observers\personal\CommanderObserver;
use App\Observers\personal\SoldierObserver;
use App\Observers\personal\SoldierVehicleObserver;
use App\Observers\personal\VehicleObserver;
use App\Observers\personal\WeaponObserver;
use App\Observers\TargetObserver;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
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
        // limit rater for api
        RateLimiter::for('alerts', function ($request) {

            if ($request->user()?->role === 'admin') {
                return Limit::none();
            }

            return Limit::perMinute(5)->by($request->user()?->id ?: $request->ip())->response(function () {
                return response()->json([
                    'status' => 429,
                    'message' => 'Too many requests',
                ], 429);
            });
        });

        RateLimiter::for('targets', function ($request) {

            if ($request->user()?->role === 'admin') {
                return Limit::none();
            }

            return Limit::perMinute(10)->by($request->user()?->id ?: $request->ip())->response(function () {
                return response()->json([
                    'status' => 429,
                    'message' => 'Too many requests',
                ], 429);
            });
        });

        Alert::observe(AlertObserver::class);
        Target::observe(TargetObserver::class);
        Weapon::observe(WeaponObserver::class);
        Vehicle::observe(VehicleObserver::class);
        Soldier::observe(SoldierObserver::class);
        Commander::observe(CommanderObserver::class);
        SoldierVehicle::observe(SoldierVehicleObserver::class);
    }
}
