<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class PersonaController extends Controller
{

    //muestra en una tabla de todas las personas
    public function index()
    {
        $mostrard = Persona::with([
            'formacion',
            'proyectos_persona' => function ($query) {
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
            },
            'cuentaBancaria'
        ])->findOrFail($id);

        // Obtener el proyecto actual activo (sin fecha_salida)
        $proyectoActual = $persona->proyectos_persona
            ->where('fecha_salida', null)
            ->first();

        return view('welcome', compact('persona', 'proyectoActual'));
    }

    /**
     * Muestra el formulario para editar una persona.
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('persona.edit', compact('persona'));
    }

    /**
     * Actualiza la persona en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);

        // Validación de datos corregida
        $validatedData = $request->validate([
            'cedula_pasaporte' => [
                'required',
                'string',
                'max:20',
                Rule::unique('personas')->ignore($persona->id),
            ],
            'ruc' => ['nullable', 'string', 'max:20'],
            'apellidos' => ['required', 'string', 'max:100'],
            'nombres' => ['required', 'string', 'max:100'],
            'estado_civil' => ['nullable', 'string', 'max:20'],
            'num_hijos' => ['nullable', 'integer', 'min:0'],
            'restriccion_alimentaria' => ['nullable', 'string', 'max:100'],
            'direccion_domicilio' => ['required', 'string'],
            'fecha_nacimiento' => ['required', 'date'],
            'pais_nacimiento' => ['required', 'string', 'max:50'],
            'provincia_nacimiento' => ['required', 'string', 'max:50'],
            'canton_nacimiento' => ['required', 'string', 'max:50'],
            'posee_discapacidad' => ['required', 'in:0,1'], // Cambiado a 'in'
            'discapacidad_detalle' => ['nullable', 'string', 'max:100'],
            'posee_alergia' => ['required', 'in:0,1'], // Cambiado a 'in'
            'alergia_detalle' => ['nullable', 'string', 'max:100'],
            'tipo_sangre' => ['required', 'string', 'max:5'],
            'correo' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('personas')->ignore($persona->id),
            ],
            'contacto_emergencia_nombre' => ['nullable', 'string', 'max:100'],
            'contacto_emergencia_parentesco' => ['nullable', 'string', 'max:50'],
            'contacto_emergencia_convencional' => ['nullable', 'string', 'max:20'],
            'contacto_emergencia_celular' => ['nullable', 'string', 'max:20'],
            'telefono_convencional' => ['nullable', 'string', 'max:20'],
            'telefono_celular' => ['nullable', 'string', 'max:20'],
            'ultima_empresa' => ['required', 'string'],
        ]);

        // Convertir valores booleanos
        $validatedData['posee_discapacidad'] = (bool)$validatedData['posee_discapacidad'];
        $validatedData['posee_alergia'] = (bool)$validatedData['posee_alergia'];

        // Actualizar la persona
        $persona->update($validatedData);

        return redirect()->route('persona.show', $persona->id)->with('success', 'Persona actualizada correctamente.');
    }

    public function generatePdf($id)
    {
        $persona = Persona::with([
            'formacion',
            'cuentaBancaria',
            'proyecto_actual.proyecto'
        ])->findOrFail($id);

        $proyectoActual = $persona->proyecto_actual;

        $pdf = PDF::loadView('persona.pdf', compact('persona', 'proyectoActual'));

        // Configuraciones mejoradas para DomPDF
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
            'dpi' => 96,                    // Reducir DPI puede ayudar con el tamaño
            'defaultFont' => 'DejaVu Sans', // Fuente que soporta mejor los tamaños
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isFontSubsettingEnabled' => true,
            'debugPng' => false,
            'enable_php' => true
        ]);

        $filename = 'persona_' . $persona->cedula_pasaporte . '_' . date('Y-m-d') . '.pdf';

        return $pdf->stream($filename);
    }
}
