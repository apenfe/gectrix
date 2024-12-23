<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Target;
use Cache;

class EarlyWarningController extends Controller
{
    public function __invoke()
    {

        $alerts = Cache::rememberForever('alerts', function () {
            return Alert::all();
        });

        $targets = Cache::rememberForever('targets', function () {
            return Target::all();
        });

        return view('alerta-temprana.module_alert', compact('alerts', 'targets'));
    }
}
