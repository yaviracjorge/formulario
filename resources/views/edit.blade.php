<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Curso</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

  <div class="max-w-3xl mx-auto p-6">
    
    <a href="{{ route('home') }}" class="inline-block mb-4 text-indigo-600 hover:underline">
      ← Volver al inicio
    </a>

    <div class="bg-white p-6 rounded-lg shadow">
      <h1 class="text-2xl font-bold mb-4 text-gray-900">Editar Curso</h1>

      <form action="{{ route('curso.update', $dato->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre del curso</label>
          <input type="text" name="name" id="name" value="{{ $dato->name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
          <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" name="descripcion" id="descripcion" value="{{ $dato->descripcion }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
          <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
          <input type="text" name="categoria" id="categoria" value="{{ $dato->categoria }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="pt-4">
          <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-md shadow">
            Actualizar
          </button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
