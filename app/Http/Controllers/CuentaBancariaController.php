<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaBancaria;

class CuentaBancariaController extends Controller
{

    // Muestra formulario para crear cuenta bancaria
    public function create()
    {
        // Obtener persona_id de la sesión
        $persona_id = session('persona_id');
        
        if (!$persona_id) {
            return redirect()->route('persona.create')->with('error', 'Primero debe crear una persona');
        }
        
        return view('cuentabancaria.create', compact('persona_id'));
    }

    public function store(Request $request)
    {
        // Obtener persona_id de la sesión si no viene en el request
        $persona_id = $request->input('persona_id', session('persona_id'));
        
        // Validación corregida
        $validated = $request->validate([
            'banco' => 'required|string|max:100',
            'tipo_cuenta' => 'required|string|max:50',
            'numero_cuenta' => 'required|string|max:50|unique:cuentabancaria,numero_cuenta',
        ]);
        
        // Añadir persona_id validado
        $validated['persona_id'] = $persona_id;
        
        // Crear registro
        CuentaBancaria::create($validated);
        
        // Redirección corregida
        return redirect()->route('home')->with('success', 'Cuenta bancaria creada exitosamente');
    }

   public function edit(CuentaBancaria $cuentabancaria)
    {
        return view('cuentabancaria.edit', compact('cuentabancaria'));
    }

    public function update(Request $request, CuentaBancaria $cuentabancaria)
    {
        // Validación corregida
        $validated = $request->validate([
            'banco' => 'required|string|max:100',
            'tipo_cuenta' => 'required|string|max:50',
            'numero_cuenta' => 'required|string|max:50|unique:cuentabancaria,numero_cuenta,'.$cuentabancaria->id,
        ]);
        
        // Actualizar registro
        $cuentabancaria->update($validated);
        
        // Redirección corregida
        return redirect()->route('home')->with('success', 'Cuenta bancaria actualizada exitosamente');
    }


}