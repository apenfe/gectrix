<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\WeaponRequest;
use App\Models\Personal\Weapon;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class WeaponController extends Controller
{
    use ImageHandler;

    public function index(Request $request)
    {
        $weaponsQuery = Weapon::query()
            ->brand($request->input('brand'))
            ->description($request->input('description'))
            ->action($request->input('action'))
            ->status($request->input('status'))
            ->orderBy('id', 'desc')
            ->get();

        $weapons = $this->paginate($weaponsQuery, 100, $request->input('page', 1));

        return view('personal.weapons.submodule_weapons', compact('weapons'));
    }

    private function paginate($items, $perPage, $page)
    {
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            $items->slice($offset, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    public function create()
    {
        return view('personal.weapons.create_weapon');
    }

    public function store(WeaponRequest $request)
    {

        $validatedData = $request->validated();

        $validatedData['image'] = $this->uploadImage($request, 'image', 'private/weapons');

        Weapon::create($validatedData);

        return redirect()->route('weapons.index')->with('success', 'Weapon created successfully.');
    }

    public function edit(Weapon $weapon)
    {
        return view('personal.weapons.update_weapon', compact('weapon'));
    }

    public function update(WeaponRequest $request, Weapon $weapon)
    {
        $validatedData = $request->validated();

        $validatedData['image'] = $this->updateImage($request, 'image', 'private/weapons', $weapon->image);

        $weapon->update($validatedData);  // Actualizamos con todos los datos, incluyendo la imagen

        return redirect()->route('weapons.index')->with('success', 'Weapon updated successfully.');
    }

    public function destroy(Weapon $weapon)
    {
        if ($weapon->soldier || $weapon->vehicle || $weapon->commander) {
            return redirect()->route('weapons.index')->with('error', 'Weapon is currently assigned.');
        }

        $this->deleteImage('private/weapons', $weapon->image);

        $weapon->delete();

        return redirect()->route('weapons.index')->with('success', 'Weapon deleted successfully.');
    }

    public function show(Weapon $weapon)
    {
        return view('personal.weapons.show_weapon', compact('weapon'));
    }
}
