<?php

namespace App\Http\Controllers;

use App\Models\Commander;
use Illuminate\Http\Request;

class CommanderController extends Controller
{
    public function index()
    {
        $commanders = Commander::all();
        return view('personal.commanders.submodule_commander', compact('commanders'));
    }
}
