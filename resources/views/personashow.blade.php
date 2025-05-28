<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Página de Inicio</h1>


        <div class="overflow-x-auto">
            <a href="{{ route('persona.create')}}">
                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
                    Crear Empleado
                </button>
            </a>
            <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b text-left">ID</th>
                        <th class="py-3 px-4 border-b text-left">Nombre</th>
                        <th class="py-3 px-4 border-b text-left">Apellidos</th>
                        <th class="py-3 px-4 border-b text-left">Cédula/Pasaporte</th>
                        <th class="py-3 px-4 border-b text-left">RUC</th>
                        <th class="py-3 px-4 border-b text-left">Estado Civil</th>
                        <th class="py-3 px-4 border-b text-left">Número de Hijos</th>
                        <th class="py-3 px-4 border-b text-left">Restricción Alimentaria</th>
                        <th class="py-3 px-4 border-b text-left">Dirección Domicilio</th>
                        <th class="py-3 px-4 border-b text-left">Fecha de Nacimiento</th>
                        <th class="py-3 px-4 border-b text-left">Lugar de Nacimiento</th>
                        <th class="py-3 px-4 border-b text-left">País de Nacimiento</th>
                        <th class="py-3 px-4 border-b text-left">Provincia de Nacimiento</th>
                        <th class="py-3 px-4 border-b text-left">Cantón de Nacimiento</th>
                        <th class="py-3 px-4 border-b text-left">Discapacidad</th>
                        <th class="py-3 px-4 border-b text-left">Detalle de Discapacidad</th>
                        <th class="py-3 px-4 border-b text-left">Alergia</th>
                        <th class="py-3 px-4 border-b text-left">Detalle de Alergia</th>
                        <th class="py-3 px-4 border-b text-left">Tipo de Sangre</th>
                        <th class="py-3 px-4 border-b text-left">Correo</th>
                        <th class="py-3 px-4 border-b text-left">Contacto de Emergencia</th>
                        <th class="py-3 px-4 border-b text-left">Parentesco</th>
                        <th class="py-3 px-4 border-b text-left">Teléfono Emergencia</th>
                        <th class="py-3 px-4 border-b text-left">Celular Emergencia</th>
                        <th class="py-3 px-4 border-b text-left">Teléfono Convencional</th>
                        <th class="py-3 px-4 border-b text-left">Teléfono Celular</th>
                        <th class="py-3 px-4 border-b text-left">Última Empresa</th>
                        <th class="py-3 px-4 border-b text-left">Nivel De estudios</th>
                        <th class="py-3 px-4 border-b text-left">Titulo Obtenido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mostrard as $dato)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 border-b">{{ $dato->id }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->nombres }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->apellidos }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->cedula_pasaporte }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->ruc }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->estado_civil }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->num_hijos }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->restriccion_alimentaria }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->direccion_domicilio }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->fecha_nacimiento }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->pais_nacimiento }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->provincia_nacimiento }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->canton_nacimiento }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->posee_discapacidad ? 'Sí' : 'No' }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->discapacidad_detalle }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->posee_alergia ? 'Sí' : 'No' }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->alergia_detalle }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->tipo_sangre }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->correo }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->contacto_emergencia_nombre }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->contacto_emergencia_parentesco }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->contacto_emergencia_convencional }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->contacto_emergencia_celular }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->telefono_convencional }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->telefono_celular }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->ultima_empresa }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->formacion->nivel ?? 'No registrado' }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->formacion->titulo_obtenido ?? 'No registrado' }}</td>
                        <td class="py-3 px-4 border-b">
                            <div class="flex gap-2">
                                <a href="{{ route('persona.show', $dato->id) }}">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow-sm">
                                        Mostrar
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



</body>

</html>