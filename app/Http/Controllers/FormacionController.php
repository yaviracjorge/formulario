<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formacion;


class FormacionController extends Controller
{

  //guarda el id de la persona y lo pasa como parametro al formulario para añadir la formacion
  public function create(Request $request)
  {
    $persona_id = session('persona_id');
    return view('formacion.create', compact('persona_id'));
  }

 //este metodo crea/guarda la formacion de la persona
  public function store(Request $request)
  {

    $request->validate([
      'persona_id' => 'required|exists:personas,id',
    ]);
    Formacion::create($request->all());
    return redirect('/proyecto/create')->with('persona_id', $request->persona_id);
  }

  //redirigue al formulario para actualizar
  public function edit(Formacion $formacion)
  {
    return view('formacion.edit', compact('formacion'));
  }

  // metodo sirve para actualizar la formacion
  public function update(Request $request, Formacion $formacion)
  {
    $formacion->update($request->all());
    return redirect('/');
  }

    public function show()
  {
    $dato = Formacion::all();
    return view('formacion.show', compact('dato'));
  }
}
