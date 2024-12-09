<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlertRequest;
use App\Models\Alert;
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

        return response()->json([
            'message'=> count($alerts).' active alerts',
            'data' => $alerts
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
            'data' => $alert,
            'message'=> 'Active alert',
        ], 200);
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
