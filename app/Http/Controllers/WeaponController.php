<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index()
    {
        $weapons = Weapon::all();
        return view('personal.weapons.submodule_weapons', compact('weapons'));
    }

    public function create()
    {
        return view('personal.weapons.submodule_weapons_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'damage' => 'required',
            'range' => 'required',
            'rate_of_fire' => 'required',
            'clip_size' => 'required',
            'reload_time' => 'required',
            'ammo' => 'required',
            'price' => 'required',
        ]);

        Weapon::create($request->all());

        return redirect()->route('weapons.index')->with('success', 'Weapon created successfully.');
    }

    public function edit(Weapon $weapon)
    {
        return view('personal.weapons.submodule_weapons_edit', compact('weapon'));
    }

    public function update(Request $request, Weapon $weapon)
    {
        $request->validate([
            'name' => 'required',
            'damage' => 'required',
            'range' => 'required',
            'rate_of_fire' => 'required',
            'clip_size' => 'required',
            'reload_time' => 'required',
            'ammo' => 'required',
            'price' => 'required',
        ]);

        $weapon->update($request->all());

        return redirect()->route('weapons.index')->with('success', 'Weapon updated successfully.');
    }

    public function destroy(Weapon $weapon)
    {
        $weapon->delete();

        return redirect()->route('weapons.index')->with('success', 'Weapon deleted successfully.');
    }

    public function show(Weapon $weapon)
    {
        return view('personal.weapons.submodule_weapons_show', compact('weapon'));
    }
}
