<?php

namespace App\Providers;

use App\Models\Alert;
use App\Models\Target;
use App\Observers\AlertObserver;
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
                    'message' => 'Too many requests'
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
                    'message' => 'Too many requests'
                ], 429);
            });
        });

        Alert::observe(AlertObserver::class);
        Target::observe(TargetObserver::class);
    }
}
