<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Strategic;
use App\Models\Target;

class EarlyWarningController extends Controller {

    public function __invoke() {

        $alerts = Alert::all();
        $targets = Target::all();

        return view('alerta-temprana.module_alert', compact('alerts', 'targets'));
    }
}
