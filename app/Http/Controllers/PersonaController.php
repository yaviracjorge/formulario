<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

    //muestra en una tabla todos las personas, y sus formaciones
    public function index()
    {
        $mostrard = Persona::with('formacion')->get();
        return view('personashow', compact('mostrard'));
    }

    //manda al formulario para crear una persona
    public function create()
    {
        return view('personacreate');
    }

    //crea una nueva persona
    public function store(Request $request)
    {
        $persona = Persona::create($request->all());
        return redirect('/formacion/create')->with('persona_id', $persona->id);
    }

    public function show($id)
    {
        $persona = Persona::with('formacion')->findOrFail($id);
        return view('welcome', compact('persona'));
    }
}
