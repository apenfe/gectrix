<?php

namespace App\Http\Controllers;

use App\Models\Brigade;
use App\Models\Commander;
use App\Models\Soldier;
use App\Models\Vehicle;
use App\Models\Weapon;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $soldiers = Soldier::all();
        $vehicles = Vehicle::all();
        $weapons = Weapon::all();
        $commanders = Commander::all();
        $brigades = Brigade::all();

        return view('personal.module_personal', compact('soldiers', 'vehicles', 'weapons', 'commanders', 'brigades'));
    }
}
