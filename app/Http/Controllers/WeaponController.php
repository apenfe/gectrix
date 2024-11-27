<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeaponRequest;
use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index()
    {
        $weapons = Weapon::paginate(21);
        return view('personal.weapons.submodule_weapons', compact('weapons'));
    }

    public function create()
    {
        return view('personal.weapons.create_weapon');
    }

    public function store(WeaponRequest $request)
    {

        Weapon::create($request->validated());

        return redirect()->route('weapons.index')->with('success', 'Weapon created successfully.');
    }

    public function edit(Weapon $weapon)
    {
        return view('personal.weapons.update_weapon', compact('weapon'));
    }

    public function update(WeaponRequest $request, Weapon $weapon)
    {
        $weapon->update($request->validated());

        return redirect()->route('weapons.index')->with('success', 'Weapon updated successfully.');
    }

    public function destroy(Weapon $weapon)
    {
        if($weapon->soldier || $weapon->vehicle || $weapon->commander){
            return redirect()->route('weapons.index')->with('error', 'Weapon is currently assigned.');
        }

        $weapon->delete();

        return redirect()->route('weapons.index')->with('success', 'Weapon deleted successfully.');
    }

    public function show(Weapon $weapon)
    {
        return view('personal.weapons.show_weapon', compact('weapon'));
    }
}
