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
        $soldiers = Cache::rememberForever('soldiers', function () {
            return Soldier::all();
        });

        $vehicles = Cache::rememberForever('vehicles', function () {
            return Vehicle::all();
        });

        $weapons = Cache::rememberForever('weapons', function () {
            return Weapon::all();
        });

        $commanders = Cache::rememberForever('commanders', function () {
            return Commander::all();
        });

        $brigades = Brigade::all();

        return view('personal.module_personal', compact('soldiers', 'vehicles', 'weapons', 'commanders', 'brigades'));
    }
}
