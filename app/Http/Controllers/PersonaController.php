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
        $personas = Persona::with([
            'informacionNacimiento',
            'direccionDomicilio',
            'informacionMedica',
            'informacionContacto',
            'contactoEmergencia',
            'informacionLaboral'
        ])->get();

        return view('persona.show', compact('personas'));
    }

    //manda al formulario para crear una persona
    public function create()
    {
        return view('persona.create');
    }


    /**
     * Crea una nueva persona con toda su información relacionada y redirije a crear formación
     */
    public function store(Request $request)
    {
        // Validación
        $validatedData = $request->validate([
            // Datos principales
            'cedula_pasaporte' => 'required|string|max:20|unique:personas',
            'ruc' => 'nullable|string|max:20',
            'apellidos' => 'required|string|max:100',
            'nombres' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'correo' => 'required|email|unique:personas',
            'estado_civil' => 'required|string|max:20',
            'num_hijos' => 'nullable|integer|min:0',

            // Información de nacimiento
            'pais_nacimiento' => 'required|string|max:30',
            'provincia_nacimiento' => 'required|string|max:30',
            'canton_nacimiento' => 'required|string|max:30',

            // Dirección
            'direccion_completa' => 'required|string',

            // Información médica
            'tipo_sangre' => 'required|string|max:6',
            'posee_discapacidad' => 'required|boolean',
            'discapacidad_detalle' => 'nullable|string|max:100',
            'posee_alergia' => 'required|boolean',
            'alergia_detalle' => 'nullable|string|max:100',
            'posee_restriccion_alimentaria' => 'required|boolean',
            'restriccion_alimentaria_detalle' => 'nullable|string',

            // Información de contacto
            'telefono_convencional' => 'nullable|string|max:15',
            'telefono_celular' => 'nullable|string|max:15',

            // Contacto de emergencia
            'contacto_emergencia_nombre' => 'nullable|string|max:70',
            'contacto_emergencia_parentesco' => 'nullable|string|max:20',
            'contacto_emergencia_convencional' => 'nullable|string|max:15',
            'contacto_emergencia_celular' => 'nullable|string|max:15',

            // Información laboral
            'ultima_empresa' => 'required|string',
        ]);

        // Crear la persona
        $persona = Persona::create([
            'cedula_pasaporte' => $validatedData['cedula_pasaporte'],
            'ruc' => $validatedData['ruc'],
            'apellidos' => $validatedData['apellidos'],
            'nombres' => $validatedData['nombres'],
            'fecha_nacimiento' => $validatedData['fecha_nacimiento'],
            'correo' => $validatedData['correo'],
            'estado_civil' => $validatedData['estado_civil'],
            'num_hijos' => $validatedData['num_hijos'],
        ]);

        // Crear información de nacimiento
        $persona->informacionNacimiento()->create([
            'pais_nacimiento' => $validatedData['pais_nacimiento'],
            'provincia_nacimiento' => $validatedData['provincia_nacimiento'],
            'canton_nacimiento' => $validatedData['canton_nacimiento'],
        ]);

        // Crear dirección de domicilio
        $persona->direccionDomicilio()->create([
            'direccion_completa' => $validatedData['direccion_completa'],
        ]);

        // Crear información médica
        $persona->informacionMedica()->create([
            'tipo_sangre' => $validatedData['tipo_sangre'],
            'posee_discapacidad' => $validatedData['posee_discapacidad'],
            'discapacidad_detalle' => $validatedData['discapacidad_detalle'],
            'posee_alergia' => $validatedData['posee_alergia'],
            'alergia_detalle' => $validatedData['alergia_detalle'],
            'posee_restriccion_alimentaria' => $validatedData['posee_restriccion_alimentaria'],
            'restriccion_alimentaria_detalle' => $validatedData['restriccion_alimentaria_detalle'],
        ]);

        // Crear información de contacto
        $persona->informacionContacto()->create([
            'telefono_convencional' => $validatedData['telefono_convencional'],
            'telefono_celular' => $validatedData['telefono_celular'],
        ]);

        // Crear contacto de emergencia
        $persona->contactoEmergencia()->create([
            'nombre' => $validatedData['contacto_emergencia_nombre'],
            'parentesco' => $validatedData['contacto_emergencia_parentesco'],
            'telefono_convencional' => $validatedData['contacto_emergencia_convencional'],
            'telefono_celular' => $validatedData['contacto_emergencia_celular'],
        ]);

        // Crear información laboral
        $persona->informacionLaboral()->create([
            'ultima_empresa' => $validatedData['ultima_empresa'],
        ]);
    
        // Redireccionar a crear formación con el ID de la persona
        return redirect('/formacion/create')->with('persona_id', $persona->id);
    }

    /**
     * Muestra una persona específica con toda su información
     */
    public function show($id)
    {
        $persona = Persona::with([

            'informacionNacimiento',
            'direccionDomicilio',
            'informacionMedica',
            'informacionContacto',
            'contactoEmergencia',
            'informacionLaboral',
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
     * Muestra el formulario para editar una persona
     */
    public function edit($id)
    {
        $persona = Persona::with([
            'informacionNacimiento',
            'direccionDomicilio',
            'informacionMedica',
            'informacionContacto',
            'contactoEmergencia',
            'informacionLaboral'
        ])->findOrFail($id);

        return view('persona.edit', compact('persona'));
    }

    /**
     * Actualiza la persona y toda su información relacionada
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);

        // Validación
        $validatedData = $request->validate([
            // Datos principales
            'cedula_pasaporte' => [
                'required',
                'string',
                'max:20',
                Rule::unique('personas')->ignore($persona->id),
            ],
            'ruc' => 'nullable|string|max:20',
            'apellidos' => 'required|string|max:100',
            'nombres' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'correo' => [
                'required',
                'email',
                Rule::unique('personas')->ignore($persona->id),
            ],
            'estado_civil' => 'required|string|max:20',
            'num_hijos' => 'nullable|integer|min:0',

            // Información de nacimiento
            'pais_nacimiento' => 'required|string|max:30',
            'provincia_nacimiento' => 'required|string|max:30',
            'canton_nacimiento' => 'required|string|max:30',

            // Dirección
            'direccion_completa' => 'required|string',

            // Información médica
            'tipo_sangre' => 'required|string|max:6',
            'posee_discapacidad' => 'required|boolean',
            'discapacidad_detalle' => 'nullable|string|max:100',
            'posee_alergia' => 'required|boolean',
            'alergia_detalle' => 'nullable|string|max:100',
            'posee_restriccion_alimentaria' => 'required|boolean',
            'restriccion_alimentaria_detalle' => 'nullable|string',

            // Información de contacto
            'telefono_convencional' => 'nullable|string|max:15',
            'telefono_celular' => 'nullable|string|max:15',

            // Contacto de emergencia
            'contacto_emergencia_nombre' => 'nullable|string|max:70',
            'contacto_emergencia_parentesco' => 'nullable|string|max:20',
            'contacto_emergencia_convencional' => 'nullable|string|max:15',
            'contacto_emergencia_celular' => 'nullable|string|max:15',

            // Información laboral
            'ultima_empresa' => 'required|string',
        ]);

        // Actualizar la persona principal
        $persona->update([
            'cedula_pasaporte' => $validatedData['cedula_pasaporte'],
            'ruc' => $validatedData['ruc'],
            'apellidos' => $validatedData['apellidos'],
            'nombres' => $validatedData['nombres'],
            'fecha_nacimiento' => $validatedData['fecha_nacimiento'],
            'correo' => $validatedData['correo'],
            'estado_civil' => $validatedData['estado_civil'],
            'num_hijos' => $validatedData['num_hijos'],
        ]);

        // Actualizar información de nacimiento
        $persona->informacionNacimiento()->updateOrCreate(
            ['persona_id' => $persona->id],
            [
                'pais_nacimiento' => $validatedData['pais_nacimiento'],
                'provincia_nacimiento' => $validatedData['provincia_nacimiento'],
                'canton_nacimiento' => $validatedData['canton_nacimiento'],
            ]
        );

        // Actualizar dirección de domicilio
        $persona->direccionDomicilio()->updateOrCreate(
            ['persona_id' => $persona->id],
            ['direccion_completa' => $validatedData['direccion_completa']]
        );

        // Actualizar información médica
        $persona->informacionMedica()->updateOrCreate(
            ['persona_id' => $persona->id],
            [
                'tipo_sangre' => $validatedData['tipo_sangre'],
                'posee_discapacidad' => $validatedData['posee_discapacidad'],
                'discapacidad_detalle' => $validatedData['discapacidad_detalle'],
                'posee_alergia' => $validatedData['posee_alergia'],
                'alergia_detalle' => $validatedData['alergia_detalle'],
                'posee_restriccion_alimentaria' => $validatedData['posee_restriccion_alimentaria'],
                'restriccion_alimentaria_detalle' => $validatedData['restriccion_alimentaria_detalle'],
            ]
        );

        // Actualizar información de contacto
        $persona->informacionContacto()->updateOrCreate(
            ['persona_id' => $persona->id],
            [
                'telefono_convencional' => $validatedData['telefono_convencional'],
                'telefono_celular' => $validatedData['telefono_celular'],
            ]
        );

        // Actualizar contacto de emergencia
        $persona->contactoEmergencia()->updateOrCreate(
            ['persona_id' => $persona->id],
            [
                'nombre' => $validatedData['contacto_emergencia_nombre'],
                'parentesco' => $validatedData['contacto_emergencia_parentesco'],
                'telefono_convencional' => $validatedData['contacto_emergencia_convencional'],
                'telefono_celular' => $validatedData['contacto_emergencia_celular'],
            ]
        );

        // Actualizar información laboral
        $persona->informacionLaboral()->updateOrCreate(
            ['persona_id' => $persona->id],
            ['ultima_empresa' => $validatedData['ultima_empresa']]
        );
      

        return redirect()->route('persona.show', $persona->id)
            ->with('success', 'Persona actualizada correctamente');
    }


    //genera el pdf
    public function generatePdf($id)
    {
        $persona = Persona::with([
            'informacionNacimiento',
            'direccionDomicilio',
            'informacionMedica',
            'informacionContacto',
            'contactoEmergencia',
            'informacionLaboral'
        ])->findOrFail($id);
        

        $pdf = PDF::loadView('persona.pdf', compact('persona'));

        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
            'dpi' => 96,
            'defaultFont' => 'DejaVu Sans',
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isFontSubsettingEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        $filename = 'persona_' . $persona->cedula_pasaporte . '_' . date('Y-m-d') . '.pdf';

        return $pdf->stream($filename);
    }
}
