<?php

namespace App\Http\Controllers;

use App\Models\Brigade;
use App\Models\Commander;
use App\Models\Soldier;
use App\Models\Vehicle;
use App\Models\Weapon;
use Cache;

class PersonalController extends Controller
{
    public function index()
    {

        $vehicles =  Vehicle::all()->groupBy('model')->map(function ($group) {
            return $group->first();
        });

        $weapons = Weapon::all()->groupBy('model')->map(function ($group) {
            return $group->first();
        });

        $brigades = Brigade::select('name', 'description', 'army', 'status', 'current_subordinates', 'latitude', 'longitude', 'unit_emblem', 'commander_id')->first();

        return view('personal.module_personal', compact( 'vehicles', 'weapons', 'brigades'));
    }
}
