<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Http\Requests\EarlyWarning\TargetRequest;
use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TargetController extends Controller
{
    public function index(Request $request)
    {
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
            ->paginate(9);

        return view('alerta-temprana.targets.index', compact('targets'));
    }

    public function create()
    {
        return view('alerta-temprana.targets.create');
    }

    public function store(TargetRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('private/targets', $filename, 'public');
            $validatedData['image'] = $filename;  // Agregamos e
        }

        if ($request->hasFile('logo')) {
            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('private/targets', $filename, 'public');
            $validatedData['logo'] = $filename;  // Agregamos e
        }

        // Crear un nuevo target
        $target = Target::create($validatedData);

        // Redirigir a la vista de índice de targets con un mensaje de éxito
        return redirect()->route('targets.index')->with('success', 'Target created successfully.');
    }

    public function show(Target $target)
    {
        return view('alerta-temprana.targets.show', compact('target'));
    }

    public function edit(Target $target)
    {
        return view('alerta-temprana.targets.edit', compact('target'));
    }

    public function update(TargetRequest $request, Target $target)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            if ($target->image) {
                Storage::disk('public')->delete('private/targets/'.$target->image);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('private/targets', $filename, 'public');
            $validatedData['image'] = $filename;  // Agregamos e
        } else {
            unset($validatedData['image']);
        }

        if ($request->hasFile('logo')) {

            if ($target->logo) {
                Storage::disk('public')->delete('private/targets/'.$target->logo);
            }

            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('private/targets', $filename, 'public');
            $validatedData['logo'] = $filename;  // Agregamos e
        }else {
            unset($validatedData['logo']);
        }

        // Actualizar el target
        $target->update($validatedData);

        // Redirigir a la vista de índice de targets con un mensaje de éxito
        return redirect()->route('targets.index')->with('success', 'Target updated successfully.');
    }

    public function destroy(Target $target)
    {
        // borrar la imagen y el logo si existen
        if ($target->image) {
            Storage::disk('public')->delete('private/targets/'.$target->image);
        }

        if ($target->logo) {
            Storage::disk('public')->delete('private/targets/'.$target->logo);
        }

        // Eliminar el target
        $target->delete();

        // Redirigir a la vista de índice de targets con un mensaje de éxito
        return redirect()->route('targets.index')->with('success', 'Target deleted successfully.');
    }
}
