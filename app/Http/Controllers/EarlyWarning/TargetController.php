<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Http\Requests\TargetRequest;
use App\Models\Target;
use Cache;
use Illuminate\Support\Facades\Storage;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Cache::rememberForever('targets_paginates', function () {
            return Target::paginate(10);
        });

        return view('alerta-temprana.targets.index', compact('targets'));
    }

    public function create()
    {
        return view('alerta-temprana.targets.create');
    }

    public function store(TargetRequest $request)
    {
        // verificar si sube image, guardar la imagen en disco y bbdd
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/targets/images');
            $image->move($destinationPath, $name);
            $request->merge(['image' => $name]);
        }

        // verificar si sube logo, guardar el logo en disco y bbdd
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/targets/logos');
            $image->move($destinationPath, $name);
            $request->merge(['logo' => $name]);
        }

        // Crear un nuevo target
        $target = Target::create($request->all());

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
        // verificar si sube image, guardar la imagen usando Storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();

            // Delete old image if exists
            if ($target->image) {
                Storage::disk('public')->delete('targets/images/'.$target->image);
            }

            // Store new image
            $path = $request->file('image')->storeAs(
                'targets/images',
                $name,
                'public'
            );

            $request->merge(['image' => $name]);
        }

        // verificar si sube logo, guardar el logo usando Storage
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();

            // Delete old logo if exists
            if ($target->logo) {
                Storage::disk('public')->delete('targets/logos/'.$target->logo);
            }

            // Store new logo
            $path = $request->file('logo')->storeAs(
                'targets/logos',
                $name,
                'public'
            );

            $request->merge(['logo' => $name]);
        }

        // Actualizar el target
        $target->update($request->all());

        // Redirigir a la vista de índice de targets con un mensaje de éxito
        return redirect()->route('targets.index')->with('success', 'Target updated successfully.');
    }

    public function destroy(Target $target)
    {
        // borrar la imagen y el logo si existen
        if ($target->image) {
            $image_path = public_path().'/targets/images/'.$target->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        if ($target->logo) {
            $image_path = public_path().'/targets/logos/'.$target->logo;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Eliminar el target
        $target->delete();

        // Redirigir a la vista de índice de targets con un mensaje de éxito
        return redirect()->route('targets.index')->with('success', 'Target deleted successfully.');
    }
}
