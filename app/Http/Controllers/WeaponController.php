<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index()
    {
        $weapons = Weapon::all();
        return view('personal.weapons.submodule_weapons', compact('weapons'));
    }
}
