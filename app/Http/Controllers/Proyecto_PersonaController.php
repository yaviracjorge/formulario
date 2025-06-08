<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proyecto;
use App\Models\Proyecto_Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Proyecto_PersonaController extends Controller
{
  public function create(Request $request)
  {
    $persona_id = session('persona_id');
    $proyectos = Proyecto::all();

    return view('proyecto.create', compact(['persona_id', 'proyectos']));
  }

  //este metodo crea/guarda la proyecto de la persona
  public function store(Request $request)
  {
    $request->validate([
      'persona_id' => 'required|exists:personas,id',
    ]);

    Proyecto_Persona::create($request->all());
    $persona_id = $request->persona_id;

    return view('cuentabancaria.create', compact('persona_id'))->with('success', 'Proyecto asignado correctamente');
  }

  //redirigue al formulario para actualizar
  public function edit(Proyecto_Persona $proyecto_persona)
  {
    $proyecto_persona->load(['persona', 'proyecto']);
    $proyectos = Proyecto::all();
    return view('proyecto.edit', compact('proyecto_persona', 'proyectos'));
  }

  // metodo sirve para actualizar 
  public function update(Request $request, Proyecto_Persona $proyecto_persona)
  {
    $validated = $request->validate([
      'proyecto_id' => 'required|exists:proyectos,id',
      'fecha_ingreso' => 'required|date',
      'cargo' => 'required|string|max:100',
      'tiempo_dedicacion' => 'required|string|max:10',
      'sucursal' => 'required|string|max:100',
      'lugar_sufragio' => 'required|string|max:100',
    ]);

    try {
      $proyecto_persona->update($validated);

      // Limpiar el cache de relaciones
      $proyecto_persona->refresh();
      $proyecto_persona->load('proyecto', 'persona');

      return redirect()
        ->route('persona.show', $proyecto_persona->persona_id)
        ->with('success', 'Proyecto actualizado correctamente.');
    } catch (\Exception $e) {
      return back()
        ->withInput()
        ->withErrors(['error' => 'Error al actualizar: ' . $e->getMessage()]);
    }
  }


  public function showReassignForm($persona_id)
  {

    // Validar que la persona exista
    $persona = Persona::findOrFail($persona_id);

    $proyectos = Proyecto::all();

    // Obtener proyecto actual con eager loading
    $proyectoActual = Proyecto_Persona::with('proyecto')
      ->where('persona_id', $persona_id)
      ->whereNull('fecha_salida')
      ->first();

    return view('proyecto.newproyecto', [
      'persona_id' => $persona_id,
      'proyectos' => $proyectos,
      'proyectoActual' => $proyectoActual
    ]);
  }




  public function storeReassignment(Request $request)
  {
    $validated = $request->validate([
      'persona_id' => 'required|exists:personas,id',
      'proyecto_id' => 'required|exists:proyectos,id',
      'fecha_ingreso' => 'required|date',
      'cargo' => 'required|string|max:100',
      'tiempo_dedicacion' => 'required|string|max:10',
      'sucursal' => 'required|string|max:100',
      'lugar_sufragio' => 'required|string|max:100',
    ]);

    DB::beginTransaction();
    try {
      // 1. Obtener el proyecto actual activo (sin fecha_salida)
      $proyectoActual = Proyecto_Persona::where('persona_id', $validated['persona_id'])
        ->whereNull('fecha_salida')
        ->first();

      if (!$proyectoActual) {
        throw new \Exception('No se encontró proyecto actual asignado para cerrar.');
      }

      // 2. Validar que no se reasigne al mismo proyecto
      if ($proyectoActual->proyecto_id == $validated['proyecto_id']) {
        throw new \Exception('La persona ya está asignada a este proyecto.');
      }

      // 3. Cerrar el proyecto actual asignando fecha_salida = fecha_ingreso de nuevo proyecto
      $proyectoActual->fecha_salida = $validated['fecha_ingreso'];
      $proyectoActual->save();

      // 4. Crear nueva asignación para la persona con el nuevo proyecto
      Proyecto_Persona::create([
        'persona_id' => $validated['persona_id'],
        'proyecto_id' => $validated['proyecto_id'],
        'fecha_ingreso' => $validated['fecha_ingreso'],
        'cargo' => $validated['cargo'],
        'tiempo_dedicacion' => $validated['tiempo_dedicacion'],
        'sucursal' => $validated['sucursal'],
        'lugar_sufragio' => $validated['lugar_sufragio'],
      ]);

      DB::commit();

      return redirect()
        ->route('persona.show', $validated['persona_id'])
        ->with('success', 'Proyecto reasignado correctamente.');
    } catch (\Exception $e) {
      DB::rollBack();
      return back()
        ->withInput()
        ->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function historial($persona_id)
  {
    $persona = Persona::findOrFail($persona_id);

    // Traer todas las asignaciones de proyecto de esa persona ordenadas por fecha de ingreso
    $historial = Proyecto_Persona::with('proyecto')
      ->where('persona_id', $persona_id)
      ->orderBy('fecha_ingreso', 'desc')
      ->get();

    return view('proyecto.historial', compact('persona', 'historial'));
  }
}
