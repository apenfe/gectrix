<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TargetRequest;
use App\Http\Resources\TargetResource;
use App\Models\Target;
use Cache;

class TargetController extends Controller
{
    public function index()
    {

        // Verificar si el usuario está autenticado
        if (! auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Verificar si el usuario es administrador
        if (auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Get all active alerts from cache
        $targets = Cache::rememberForever('targets', function () {
            return Target::all();
        });

        if ($targets->isEmpty()) {
            return response()->json(['message' => 'No active targets'], 200);
        }

        // devolver alertResource con los datos de la caché
        return response()->json([
            'message' => count($targets).' active targets',
            'data' => targetResource::collection($targets),
        ], 200);
    }

    public function store(TargetRequest $request)
    {

        // Verificar si el usuario está autenticado
        if (! auth()->check() && auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Crear un nuevo target
        $target = Target::create($request->all());

        // devolver alertResource con los datos del nuevo target
        return response()->json([
            'message' => 'Target created',
            'data' => new TargetResource($target),
        ], 201);
    }

    public function show(Target $target)
    {

        // Verificar si el usuario está autenticado
        if (! auth()->check() && auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if (! $target->exists()) {
            return response()->json(['message' => 'Target not found'], 404);
        }

        // devolver alertResource con los datos del target
        return response()->json([
            'message' => 'Target found',
            'data' => new TargetResource($target),
        ], 200);

    }

    public function update(TargetRequest $request, Target $target)
    {

        // Verificar si el usuario está autenticado
        if (! auth()->check() && auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if (! $target->exists()) {
            return response()->json(['message' => 'Target not found'], 404);
        }

        // Actualizar el target
        $target->update($request->all());

        // devolver alertResource con los datos del target actualizado
        return response()->json([
            'message' => 'Target updated',
            'data' => new TargetResource($target),
        ], 200);
    }

    public function destroy(Target $target)
    {

        // Verificar si el usuario está autenticado
        if (! auth()->check() || auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if (! $target->exists()) {
            return response()->json(['message' => 'Target not found'], 404);
        }

        // Eliminar el target
        $target->delete();

        // devolver alertResource con los datos del target eliminado
        return response()->json([
            'message' => 'Target deleted',
            'data' => new TargetResource($target),
        ], 200);
    }
}
