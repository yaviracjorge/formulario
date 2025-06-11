<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proyecto;
use App\Models\ProyectoPersona; // Asegúrate de que este modelo exista en app/Models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoPersonaController extends Controller
{
    public function create(Request $request)
    {
        $persona_id = session('persona_id');
        $proyectos = Proyecto::all();

        return view('proyecto.create', compact('persona_id', 'proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'proyecto_id' => 'required|exists:proyectos,id',
            'fecha_ingreso' => 'required|date',
            'cargo' => 'required|string|max:100',
            'tiempo_dedicacion' => 'required|string|max:10',
            'sucursal' => 'required|string|max:100',
            'lugar_sufragio' => 'required|string|max:100',
        ]);

        ProyectoPersona::create($request->all());

        return redirect()
            ->route('cuentabancaria.create', ['persona_id' => $request->persona_id])
            ->with('success', 'Proyecto asignado correctamente');
    }

    public function edit(ProyectoPersona $proyecto_persona)
    {
        $proyecto_persona->load(['persona', 'proyecto']);
        $proyectos = Proyecto::all();

        return view('proyecto.edit', compact('proyecto_persona', 'proyectos'));
    }

    public function update(Request $request, ProyectoPersona $proyecto_persona)
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
        $persona = Persona::findOrFail($persona_id);
        $proyectos = Proyecto::all();

        $proyectoActual = ProyectoPersona::with('proyecto')
            ->where('persona_id', $persona_id)
            ->whereNull('fecha_salida')
            ->first();

        return view('proyecto.newproyecto', compact('persona_id', 'proyectos', 'proyectoActual'));
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
            $proyectoActual = ProyectoPersona::where('persona_id', $validated['persona_id'])
                ->whereNull('fecha_salida')
                ->first();

            if (!$proyectoActual) {
                throw new \Exception('No se encontró proyecto actual asignado para cerrar.');
            }

            if ($proyectoActual->proyecto_id == $validated['proyecto_id']) {
                throw new \Exception('La persona ya está asignada a este proyecto.');
            }

            $proyectoActual->fecha_salida = $validated['fecha_ingreso'];
            $proyectoActual->save();

            ProyectoPersona::create($validated);

            DB::commit();

            return redirect()
                ->route('persona.show', ['id' => $validated['persona_id']])
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

        $historial = ProyectoPersona::with('proyecto')
            ->where('persona_id', $persona_id)
            ->orderBy('fecha_ingreso', 'desc')
            ->get();

        return view('proyecto.historial', compact('persona', 'historial'));
    }
}
