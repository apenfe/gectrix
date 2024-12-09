<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlertRequest;
use App\Http\Resources\AlertResource;
use App\Models\Alert;
use App\Models\User;
use Illuminate\Http\Request;

class AlertController extends Controller
{

    public function index()
    {
        // Get all active alerts
        $alerts = Alert::query()
            ->where('end_date', '>=', now())
            ->get();

        if( $alerts->isEmpty() ) {
            return response()->json(['message' => 'No active alerts'], 200);
        }

        // devolver alertResource
        return response()->json([
            'message'=> count($alerts).' active alerts',
            'data' => alertResource::collection($alerts),
            ], 200);
    }

    public function store(AlertRequest $request)
    {
        // Only token can-create can create an alert
        if (!$request->user()->tokenCan('can-create')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $alert = Alert::create($request->all());

        return response()->json($alert, 201);

    }

    public function show($id)
    {
        $alert = Alert::find($id);

        if( !$alert ) {
            return response()->json(['message' => 'Alert not found'], 404);
        }

        if( $alert->end_date < now() ) {
            return response()->json(['message' => 'Alert has ended'], 200);
        }

        return response()->json([
            'data' => alertResource::make($alert),
            'message'=> 'Active alert',
        ], 200);
    }

    public function update(AlertRequest $request, $id)
    {
        // Only token can-create can create an alert
        if (!$request->user()->tokenCan('can-update')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $alert = Alert::find($id);

        if( !$alert ) {
            return response()->json(['message' => 'Alert not found'], 404);
        }

        $alert->update($request->all());

        return response()->json($alert, 201);
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->tokenCan('can-delete')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $alert = Alert::find($id);

        if (!$alert) {
            return response()->json(['message' => 'Alert not found'], 404);
        }

        $alert->delete();

        return response()->json(['message' => 'Alert deleted'], 204);
    }

    public function position(Request $request)
    {
        $position = $request->all();

        // obtener todas las alertas activas cuya distacia al punto sea menor al radio
        $alerts = Alert::query()
            ->where('end_date', '>=', now())
            ->get();

        $result = [];

        foreach ($alerts as $alert) {
            $distancia = Alert::calcularDistancia($position['latitude'], $position['longitude'], $alert->latitude, $alert->longitude);
            if( $distancia <= $alert->radius ) {
                $result[] = $alert;
            }
        }

        if( !$result ) {
            return response()->json(['message' => 'No alerts in this position'], 200);
        }

        return response()->json([
            'data' => alertResource::collection($result),
            'message'=> 'Alert in this position',
        ], 200);
    }

}
