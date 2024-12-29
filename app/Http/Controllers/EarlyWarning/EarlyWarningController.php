<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\Target;
use Cache;
use Illuminate\Http\Request;

class EarlyWarningController extends Controller
{
    public function __invoke(Request $request )
    {
        $type = $request->input('type');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $description = $request->input('description');
        $danger_level = $request->input('danger_level');

        $alerts = Alert::query()
            ->description($description)
            ->dangerLevel($danger_level)
            ->dateRange($start_date, $end_date)
            ->type($type)
            ->get();

        $targets = Cache::rememberForever('targets', function () {
            return Target::all();
        });

        return view('alerta-temprana.module_alert', compact('alerts', 'targets'));
    }
}
