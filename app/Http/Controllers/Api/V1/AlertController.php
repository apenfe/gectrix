<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();
        return response()->json($alerts, 200);
    }

    public function store(Request $request) {}

    public function show($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
