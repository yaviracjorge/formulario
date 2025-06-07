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
            <a href="{{ route('crear_proyecto.create')}}">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow-sm">
                    Crear un Nuevo Proyecto
                </button>
            </a>
            <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b text-left">Nombre</th>
                        <th class="py-3 px-4 border-b text-left">Apellidos</th>
                        <th class="py-3 px-4 border-b text-left">Cédula/Pasaporte</th>
                        <th class="py-3 px-4 border-b text-left">Correo</th>
                        <th class="py-3 px-4 border-b text-left">Proyecto Actual</th>
                            <th class="py-3 px-4 border-b text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mostrard as $dato)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 border-b">{{ $dato->nombres }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->apellidos }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->cedula_pasaporte }}</td>
                        <td class="py-3 px-4 border-b">{{ $dato->correo }}</td>
                        <td class="py-3 px-4 border-b">
                            @if($dato->proyecto_actual)
                            {{ $dato->proyecto_actual->proyecto->nombre_proyecto }}
                            @else
                            Sin proyecto asignado
                            @endif
                        </td>
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