<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Proyecto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-2xl bg-white shadow-md rounded-lg p-8">
        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Asignar Persona a Proyecto</h2>

        <form action="{{ route('proyecto.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="persona_id" value="{{ $persona_id }}">
            <!-- Proyecto -->
            <div>
                <label for="proyecto_id" class="block text-sm font-medium text-gray-700 mb-1">Seleccionar Proyecto:</label>
                <select name="proyecto_id" id="proyecto_id" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Seleccione un proyecto --</option>
                    @foreach($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}">{{ $proyecto->nombre_proyecto }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha de ingreso -->
            <div>
                <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Ingreso:</label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Cargo -->
            <div>
                <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Escribe el cargo">
            </div>


            <!-- Tiempo de dedicación -->
            <div>
                <label for="tiempo_dedicacion" class="block text-sm font-medium text-gray-700 mb-1">Tiempo Dedicación:</label>
                <input type="text" id="tiempo_dedicacion" name="tiempo_dedicacion" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Ej: T100, T60, etc.">
            </div>

            <!-- Sucursal -->
            <div>
                <label for="sucursal" class="block text-sm font-medium text-gray-700 mb-1">Sucursal:</label>
                <input type="text" id="sucursal" name="sucursal" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Lugar de sufragio -->
            <div>
                <label for="lugar_sufragio" class="block text-sm font-medium text-gray-700 mb-1">Lugar de Sufragio:</label>
                <input type="text" id="lugar_sufragio" name="lugar_sufragio" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Botón -->
            <div class="text-end pt-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md shadow-sm transition duration-300">
                    Asignar Proyecto
                </button>
            </div>
        </form>

        @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mt-6">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

</body>

</html>