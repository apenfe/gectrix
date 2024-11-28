<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use Illuminate\Http\Request;

class SoldierController extends Controller
{
    public function index()
    {
        $soldiers = Soldier::paginate(20);
        return view('personal.soldiers.submodule_soldiers', compact('soldiers'));
    }

    public function create()
    {
        return view('personal.soldiers.submodule_soldiers_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rank' => 'required',
            'unit' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        Soldier::create($request->all());

        return redirect()->route('personal.soldiers')
            ->with('success', 'Soldier created successfully.');
    }

    public function show(Soldier $soldier)
    {
        return view('personal.soldiers.submodule_soldiers_show', compact('soldier'));
    }

    public function edit(Soldier $soldier)
    {
        return view('personal.soldiers.submodule_soldiers_edit', compact('soldier'));
    }

    public function update(Request $request, Soldier $soldier)
    {
        $request->validate([
            'name' => 'required',
            'rank' => 'required',
            'unit' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $soldier->update($request->all());

        return redirect()->route('personal.soldiers')
            ->with('success', 'Soldier updated successfully');
    }

    public function destroy(Soldier $soldier)
    {
        $soldier->delete();

        return redirect()->route('personal.soldiers')
            ->with('success', 'Soldier deleted successfully');
    }

}
