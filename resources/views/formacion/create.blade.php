<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Formación Académica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Agregar Formación Académica</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('formacion.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Campo oculto con el ID de la persona -->
                <input type="hidden" name="persona_id" value="{{ $persona_id }}">

                <!-- Nivel de educación -->
                <div>
                    <label for="nivel" class="block text-sm font-medium text-gray-700 mb-1">Nivel de educación:</label>
                    <select id="nivel" name="nivel" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">-- Seleccione un nivel --</option>
                        <option value="Bachiller">Bachiller</option>
                        <option value="Estudiante universitario">Estudiante universitario</option>
                        <option value="Tercer nivel completo">Tercer nivel completo</option>
                        <option value="Diplomado">Diplomado</option>
                        <option value="Especialización">Especialización</option>
                        <option value="Maestría">Maestría</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                </div>

                <!-- Título obtenido -->
                <div>
                    <label for="titulo_obtenido" class="block text-sm font-medium text-gray-700 mb-1">Título obtenido:</label>
                    <input type="text" id="titulo_obtenido" name="titulo_obtenido" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                           placeholder="Ingrese el título obtenido"
                           required>
                </div>

                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm transition duration-300">
                        Guardar Formación
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>