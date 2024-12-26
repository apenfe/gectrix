<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\Target;
use Cache;

class EarlyWarningController extends Controller
{
    public function __invoke()
    {

        $alerts = Cache::rememberForever('alerts', function () {
            return Alert::paginate(3);
        });

        $targets = Cache::rememberForever('targets', function () {
            return Target::paginate(3);
        });

        return view('alerta-temprana.module_alert', compact('alerts', 'targets'));
    }
}
