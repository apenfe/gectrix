<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Personal\Brigade;

class BrigadeController extends Controller
{
    public function index()
    {
        $brigades = Brigade::all();

        return view('personal.brigades.submodule_brigades', compact('brigades'));
    }
}
