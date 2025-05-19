<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaone;

class PersonaoneController extends Controller
{
    public function create(){
        return view('personacreate');
    }

    public function store(Request $request){

        Personaone::create($request->all());
    }
}
