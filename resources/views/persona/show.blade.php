<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalle de Personas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Detalle de Personas</h1>

        <div class="flex justify-between mb-4 gap-3 flex-wrap">
            <a href="{{ route('persona.create') }}">
                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow-sm">
                    Crear Empleado
                </button>
            </a>
            <a href="{{ route('proyectos.create') }}">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow-sm">
                    Crear Proyecto
                </button>
            </a>
            @if($mostrard->isNotEmpty())
                <a href="{{ route('persona.pdf.individual', $mostrard->first()->id) }}" target="_blank">
                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow-sm">
                        Descargar PDF General
                    </button>
                </a>
            @endif
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b text-left">Foto</th>
                        <th class="py-3 px-4 border-b text-left">Nombres</th>
                        <th class="py-3 px-4 border-b text-left">Apellidos</th>
                        <th class="py-3 px-4 border-b text-left">Cédula/Pasaporte</th>
                        <th class="py-3 px-4 border-b text-left">Correo</th>
                        <th class="py-3 px-4 border-b text-left">Proyecto Actual</th>
                        <th class="py-3 px-4 border-b text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mostrard as $persona)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 border-b">
                            @if($persona->foto)
                                <img src="{{ asset('storage/fotos/' . $persona->foto) }}" alt="Foto de {{ $persona->nombre }}" class="w-12 h-12 rounded object-cover">
                            @else
                                <span class="text-gray-400">Sin foto</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b">{{ $persona->nombre }}</td>
                        <td class="py-3 px-4 border-b">{{ $persona->apellido }}</td>
                        <td class="py-3 px-4 border-b">{{ $persona->cedula }}</td>
                        <td class="py-3 px-4 border-b">{{ $persona->correo }}</td>
                        <td class="py-3 px-4 border-b">
                            @if($persona->proyecto_actual && $persona->proyecto_actual->proyecto)
                                {{ $persona->proyecto_actual->proyecto->nombre_proyecto }}
                            @else
                                <span class="text-gray-400">Sin proyecto</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('persona.show', $persona->id) }}">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded shadow">
                                        Mostrar
                                    </button>
                                </a>
                                <a href="{{ route('persona.pdf', $persona->id) }}" target="_blank" rel="noopener">
                                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded shadow">
                                        PDF
                                    </button>
                                </a>
                                <a href="{{ route('persona.edit', $persona->id) }}">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded shadow">
                                        Editar
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
