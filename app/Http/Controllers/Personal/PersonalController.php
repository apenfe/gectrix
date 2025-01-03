<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Personal\Brigade;
use App\Models\Personal\Vehicle;
use App\Models\Personal\Weapon;

class PersonalController extends Controller
{
    public function index()
    {

        $vehicles = Vehicle::all()->groupBy('model')->map(function ($group) {
            return $group->first();
        });

        $weapons = Weapon::all()->groupBy('model')->map(function ($group) {
            return $group->first();
        });

        $brigades = Brigade::select('name', 'description', 'army', 'status', 'current_subordinates', 'latitude', 'longitude', 'unit_emblem', 'commander_id')->first();

        return view('personal.module_personal', compact('vehicles', 'weapons', 'brigades'));
    }
}
