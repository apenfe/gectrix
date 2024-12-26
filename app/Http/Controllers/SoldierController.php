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
        return view('personal.soldiers.create_soldier');
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
        return view('personal.soldiers.show_soldier', compact('soldier'));
    }

    public function edit(Soldier $soldier)
    {
        return view('personal.soldiers.update_soldier', compact('soldier'));
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

    public function unroll(Soldier $soldier)
    {
        $soldier->status = 'baja';
        $soldier->date_of_demobilization = now();
        $soldier->save();

        return redirect()->back()->with('status', 'Fecha de desenrole actualizada');
    }

    public function kill(Soldier $soldier)
    {
        $soldier->status = 'abatido';
        $soldier->date_of_death = now();
        $soldier->save();

        return redirect()->back()->with('status', 'Fecha de fallecimiento actualizada');
    }
}
