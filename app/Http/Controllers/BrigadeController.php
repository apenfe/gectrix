<?php

namespace App\Http\Controllers;

use App\Models\Brigade;
use Illuminate\Http\Request;

class BrigadeController extends Controller
{
    public function index()
    {
        $brigades = Brigade::all();
        return view('personal.brigades.submodule_brigades', compact('brigades'));
    }
}
