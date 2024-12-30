<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\Target;
use Illuminate\Http\Request;

class EarlyWarningController extends Controller
{
    public function __invoke(Request $request)
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

        $priority = $request->input('priority');
        $status = $request->input('status');
        $name = $request->input('name');
        $description = $request->input('description');
        $setup_date = $request->input('setup_date');
        $deactivation_date = $request->input('deactivation_date');
        $action = $request->input('action');

        $targets = Target::query()
            ->priority($priority)
            ->status($status)
            ->name($name)
            ->description($description)
            ->setupDate($setup_date)
            ->deactivationDate($deactivation_date)
            ->action($action)
            ->get();

        return view('alerta-temprana.module_alert', compact('alerts', 'targets'));
    }
}
