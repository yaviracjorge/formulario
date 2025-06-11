<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class PersonaController extends Controller
{
    // Mostrar todas las personas con su proyecto actual
    public function index()
    {
        $personas = Persona::with([
            'formacion',
            'proyecto_actual.proyecto',
            'cuentaBancaria'
        ])->get();

        return view('persona.show', ['mostrard' => $personas]);
    }

    // Formulario para crear persona
    public function create()
    {
        return view('persona.create');
    }

    // Guardar persona
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('imagenes', 'public');
            $data['foto'] = $foto;
        }

        $persona = Persona::create($data);

        return redirect('/formacion/create')->with('persona_id', $persona->id);
    }

    // Mostrar datos de persona individual
    public function show($id)
    {
        $persona = Persona::with([
            'formacion',
            'proyectos_persona.proyecto',
            'cuentaBancaria'
        ])->findOrFail($id);

        $proyectoActual = $persona->proyectos_persona
            ->whereNull('fecha_salida')
            ->first();

        return view('welcome', compact('persona', 'proyectoActual'));
    }

    // Formulario para editar persona
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('persona.edit', compact('persona'));
    }

    // Actualizar persona
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);

        $validatedData = $request->validate([
            'cedula_pasaporte' => [
                'required', 'string', 'max:20',
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
            'posee_discapacidad' => ['required', 'in:0,1'],
            'discapacidad_detalle' => ['nullable', 'string', 'max:100'],
            'posee_alergia' => ['required', 'in:0,1'],
            'alergia_detalle' => ['nullable', 'string', 'max:100'],
            'tipo_sangre' => ['required', 'string', 'max:5'],
            'correo' => [
                'required', 'string', 'email', 'max:255',
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

        $validatedData['posee_discapacidad'] = (bool)$validatedData['posee_discapacidad'];
        $validatedData['posee_alergia'] = (bool)$validatedData['posee_alergia'];

        $persona->update($validatedData);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('imagenes', 'public');
            $persona->foto = $foto;
            $persona->save();
        }

        return redirect()->route('persona.show', $persona->id)
                         ->with('success', 'Persona actualizada correctamente.');
    }

    // Generar PDF para listado o persona individual
    public function pdf($id = null)
    {
        if ($id) {
            // PDF individual
            $personas = Persona::with(['formacion', 'cuentaBancaria', 'proyecto_actual.proyecto'])
                ->where('id', $id)
                ->get();
        } else {
            // PDF listado completo
            $personas = Persona::with(['formacion', 'cuentaBancaria', 'proyecto_actual.proyecto'])->get();
        }

        $pdf = Pdf::loadView('persona.pdf', ['mostrard' => $personas]);

        $filename = $id ? "persona_{$id}.pdf" : 'personas_listado.pdf';

        return $pdf->stream($filename);
    }
}
