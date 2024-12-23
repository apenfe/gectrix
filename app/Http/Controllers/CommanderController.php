<?php

namespace App\Http\Controllers;

use App\Models\Commander;
use Illuminate\Http\Request;

class CommanderController extends Controller
{
    public function index()
    {
        $commanders = Commander::paginate(20);

        return view('personal.commanders.submodule_commander', compact('commanders'));
    }

    public function create()
    {
        return view('personal.commanders.submodule_commander_create');
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

        Commander::create($request->all());

        return redirect()->route('personal.commanders')
            ->with('success', 'Commander created successfully.');
    }

    public function show(Commander $commander)
    {
        return view('personal.commanders.show_commander', compact('commander'));
    }

    public function edit(Commander $commander)
    {
        return view('personal.commanders.submodule_commander_edit', compact('commander'));
    }

    public function update(Request $request, Commander $commander)
    {
        $request->validate([
            'name' => 'required',
            'rank' => 'required',
            'unit' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $commander->update($request->all());

        return redirect()->route('personal.commanders')
            ->with('success', 'Commander updated successfully');
    }

    public function destroy(Commander $commander)
    {
        $commander->delete();

        return redirect()->route('personal.commanders')
            ->with('success', 'Commander deleted successfully');
    }

    public function unroll(Commander $commander)
    {
        $commander->date_of_demobilization = now();
        $commander->status = 'baja';
        $commander->save();

        return redirect()->route('personal.commanders')
            ->with('success', 'Commander unrolled successfully');
    }

    public function kill(Commander $commander)
    {
        $commander->date_of_death = now();
        $commander->status = 'abatido';
        $commander->save();

        return redirect()->route('personal.commanders')
            ->with('success', 'Commander killed successfully');
    }
}
