<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        return view('personal.vehicles.submodule_vehicles', compact('vehicles'));
    }

    public function create()
    {
        return view('personal.vehicles.create_vehicle');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'license_plate' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('private/vehicles', $filename, 'public');

        Vehicle::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'license_plate' => $request->license_plate,
            'image' => $filename,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('personal.vehicles.update_vehicle', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'license_plate' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($vehicle->image) {
            Storage::disk('public')->delete('private/vehicles/' . $vehicle->image);
        }

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('private/vehicles', $filename, 'public');

        $vehicle->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'license_plate' => $request->license_plate,
            'image' => $filename,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->soldiers || $vehicle->weapon || $vehicle->squad) {
            return redirect()->route('vehicles.index')->with('error', 'Vehicle is currently assigned.');
        }

        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('personal.vehicles.show_vehicle', compact('vehicle'));
    }
}
