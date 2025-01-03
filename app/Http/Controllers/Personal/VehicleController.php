<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\VehicleRequest;
use App\Models\Personal\Vehicle;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class VehicleController extends Controller
{
    use ImageHandler;

    public function index(Request $request)
    {
        $vehiclesQuery = Vehicle::query()
            ->brand($request->input('brand'))
            ->model($request->input('model'))
            ->type($request->input('type'))
            ->status($request->input('status'))
            ->get();

        $vehicles = $this->paginate($vehiclesQuery, 9, $request->input('page', 1));

        return view('personal.vehicles.submodule_vehicles', compact('vehicles'));
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
        return view('personal.vehicles.create_vehicle');
    }

    public function store(VehicleRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $this->uploadImage($request, 'image', 'private/vehicles');
        Vehicle::create($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('personal.vehicles.update_vehicle', compact('vehicle'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $this->updateImage($request, 'image', 'private/vehicles', $vehicle->image);
        $vehicle->update($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->soldiers || $vehicle->weapon || $vehicle->squad) {
            return redirect()->route('vehicles.index')->with('error', 'Vehicle is currently assigned.');
        }

        $this->deleteImage('private/weapons', $vehicle->image);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('personal.vehicles.show_vehicle', compact('vehicle'));
    }
}
