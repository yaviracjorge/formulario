<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Proyecto_Persona;
use Illuminate\Http\Request;

class Proyecto_PersonaController extends Controller
{
  public function create(Request $request)
  {
    $persona_id = session('persona_id');
    $proyectos = Proyecto::all();

    return view('proyecto.create', compact(['persona_id', 'proyectos']));
  }

  //este metodo crea/guarda la formacion de la persona
  public function store(Request $request)
  {
    $request->validate([
      'persona_id' => 'required|exists:personas,id',
    ]);

    $asignacionExistente = Proyecto_Persona::where('persona_id', $request->persona_id)
      ->whereNull('fecha_salida')
      ->exists();

    if ($asignacionExistente) {
      return back()
        ->withInput()
        ->withErrors(['error' => 'Esta persona ya tiene un proyecto asignado']);
    }

    Proyecto_Persona::create($request->all());

    return redirect()->back()->with('success', 'Proyecto asignado correctamente');
  }
}
