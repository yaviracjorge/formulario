<?php

namespace App\Http\Controllers;

use App\Models\Proyecto as ModelsProyecto;
use Illuminate\Http\Request;

class Proyecto extends Controller
{
      public function create()
  {
    return view('crear_proyecto.create');
  }


    //crea una nueva persona y redirije a crear una formacion
    public function store(Request $request)
    {
        $request = ModelsProyecto::create($request->all());
        return redirect('/');
    }
}
