<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TelegramController;
use App\Http\Requests\EarlyWarning\AlertRequest;
use App\Models\EarlyWarning\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index(Request $request)
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
            ->paginate(9);

        return view('alerta-temprana.alerts.index', compact('alerts'));
    }

    public function create()
    {
        return view('alerta-temprana.alerts.create');
    }

    public function store(AlertRequest $request)
    {
        // Validar los datos de la solicitud
        $validated = $request->validated();

        // Crear una nueva alerta con los datos validados
        $alert = Alert::create($validated);

        app(TelegramController::class)->store($alert);

        // Redirigir a la vista de índice de alertas con un mensaje de éxito
        return redirect()->route('alerts.index')->with('success', 'Alerta creada exitosamente.');
    }

    public function show(Alert $alert)
    {
        return view('alerta-temprana.alerts.show', compact('alert'));
    }

    public function edit(Alert $alert)
    {
        return view('alerta-temprana.alerts.edit', compact('alert'));
    }

    public function update(AlertRequest $request, Alert $alert)
    {
        // Validar los datos de la solicitud
        $validated = $request->validated();

        // Actualizar la alerta con los datos validados
        $alert->update($validated);

        app(TelegramController::class)->store($alert);

        // Redirigir a la vista de índice de alertas con un mensaje de éxito
        return redirect()->route('alerts.index')->with('success', 'Alerta actualizada exitosamente.');
    }

    public function destroy(Alert $alert)
    {
        // Eliminar la alerta
        $alert->delete();

        // Redirigir a la vista de índice de alertas con un mensaje de éxito
        return redirect()->route('alerts.index')->with('success', 'Alerta eliminada exitosamente.');
    }
}
