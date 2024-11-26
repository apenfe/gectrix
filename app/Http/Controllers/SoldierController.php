<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use Illuminate\Http\Request;

class SoldierController extends Controller
{
    public function index()
    {
        $soldiers = Soldier::all();
        return view('personal.soldiers.submodule_soldiers', compact('soldiers'));
    }
}
