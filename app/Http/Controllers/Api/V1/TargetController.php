<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TargetResource;
use App\Models\Target;
use Cache;
use Illuminate\Http\Request;

class TargetController extends Controller {

    public function index() {

        // VER SI ES ADMIN
        if( auth()->user()->role != 'admin' ) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        // Get all active alerts from cache
        $targets = Cache::rememberForever('targets', function () {
            return Target::all();
        });

        if( $targets->isEmpty() ) {
            return response()->json(['message' => 'No active targets'], 200);
        }

        // devolver alertResource con los datos de la caché
        return response()->json([
            'message'=> count($targets).' active targets',
            'data' => targetResource::collection($targets),
        ], 200);
    }

    public function store(Request $request) {
    }

    public function show($id) {
    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {
    }
}
