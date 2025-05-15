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

    <div class="flex justify-end mb-4">
      <a href="{{ route('curso.create') }}">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
          Crear Curso
        </button>
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="py-3 px-4 border-b text-left">Nombre</th>
            <th class="py-3 px-4 border-b text-left">Descripción</th>
            <th class="py-3 px-4 border-b text-left">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datos as $dato)
          <tr class="hover:bg-gray-50 transition">
            <td class="py-3 px-4 border-b">{{ $dato->name }}</td>
            <td class="py-3 px-4 border-b">{{ $dato->descripcion }}</td>
            <td class="py-3 px-4 border-b">
              <div class="flex gap-2">
                <a href="{{ route('curso.show', $dato->id) }}">
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow-sm">
                    Mostrar
                  </button>
                </a>
                <a href="{{ route('curso.edit', $dato->id) }}">
                  <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
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

    <!-- Paginación -->
    <div class="mt-6">
      {{ $datos->links() }}
    </div>
  </div>

</body>
</html>
