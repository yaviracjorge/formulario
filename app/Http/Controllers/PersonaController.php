<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

    //muestra en una tabla de todas las personas
public function index()
{
    $mostrard = Persona::with([
        'formacion',
        'proyectos_persona' => function($query) {
            $query->with('proyecto')
                  ->whereNull('fecha_salida'); // Solo proyectos activos
        }
    ])->get();
    
    return view('persona.show', compact('mostrard'));
}

    //manda al formulario para crear una persona
    public function create()
    {
        return view('persona.create');
    }

    //crea una nueva persona y redirije a crear una formacion
    public function store(Request $request)
    {
        $persona = Persona::create($request->all());
        return redirect('/formacion/create')->with('persona_id', $persona->id);
    }

    public function show($id)
    {
        $persona = Persona::with([
            'formacion',
            'proyectos_persona' => function ($query) {
                $query->with('proyecto')
                    ->orderBy('fecha_ingreso', 'desc');
            }
        ])->findOrFail($id);

        // Obtener el proyecto actual activo (sin fecha_salida)
        $proyectoActual = $persona->proyectos_persona
            ->where('fecha_salida', null)
            ->first();

        return view('welcome', compact('persona', 'proyectoActual'));
    }
}
