<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Proyectos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-10 px-4 flex items-start justify-center">

    <div class="w-full max-w-6xl bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">
            Historial de Proyectos de {{ $persona->nombres }} {{$persona->apellidos}}
        </h1>

        @if($historial->isEmpty())
            <p class="text-gray-600 text-center">No hay proyectos asignados para esta persona.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Proyecto</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Fecha Ingreso</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Fecha Salida</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Cargo</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Dedicación</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Sucursal</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Lugar Sufragio</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($historial as $asignacion)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->proyecto->nombre_proyecto }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->fecha_ingreso }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->fecha_salida ?? 'Actual' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->cargo }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->tiempo_dedicacion }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->sucursal }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $asignacion->lugar_sufragio }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6 text-right">
            <a href="{{ route('persona.show', $persona->id) }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                Volver al detalle de persona
            </a>
        </div>
    </div>

</body>
</html>
