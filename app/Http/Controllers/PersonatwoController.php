<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personatwo;

class PersonatwoController extends Controller
{
    public function index(){
        $mostrard = Personatwo::all();
        return view('personashow', compact('mostrard'));
    }
}
