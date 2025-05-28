<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reasignar Proyecto</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <div class="container mx-auto px-4 py-8 max-w-md">
    <form action="{{ route('proyecto.reasignar') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
      @csrf
      <input type="hidden" name="persona_id" value="{{ $persona_id }}">

      <!-- Proyecto actual (si existe) -->
      @if($proyectoActual)
        <div class="mb-6 p-4 bg-gray-100 rounded-md">
          <p class="text-gray-700"><strong>Proyecto actual:</strong> {{ $proyectoActual->proyecto->nombre_proyecto }}</p>
          <p class="text-gray-700"><strong>Fecha de ingreso:</strong> {{ $proyectoActual->fecha_ingreso }}</p>
          @if($proyectoActual->fecha_salida)
            <p class="text-gray-700"><strong>Fecha de salida:</strong> {{ $proyectoActual->fecha_salida }}</p>
          @else
            <p class="text-red-600 font-semibold"><strong>Proyecto aún activo</strong></p>
          @endif
        </div>
      @endif

      <!-- Nuevo proyecto -->
      <div>
        <label for="proyecto_id" class="block text-sm font-medium text-gray-700 mb-1">Nuevo proyecto:</label>
        <select id="proyecto_id" name="proyecto_id"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          required>
          @foreach($proyectos as $proyecto)
            <option value="{{ $proyecto->id }}">{{ $proyecto->nombre_proyecto }}</option>
          @endforeach
        </select>
      </div>

      <!-- Fecha de ingreso -->
      <div class="mt-4">
        <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700 mb-1">Fecha de ingreso:</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          required value="{{ date('Y-m-d') }}">
      </div>

      <!-- Cargo -->
      <div class="mt-4">
        <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">Cargo:</label>
        <input type="text" id="cargo" name="cargo"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          required>
      </div>

      <!-- Tiempo de dedicación -->
      <div class="mt-4">
        <label for="tiempo_dedicacion" class="block text-sm font-medium text-gray-700 mb-1">Tiempo de dedicación (ej: FT, PT):</label>
        <input type="text" id="tiempo_dedicacion" name="tiempo_dedicacion" maxlength="3"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          required>
      </div>

      <!-- Sucursal -->
      <div class="mt-4">
        <label for="sucursal" class="block text-sm font-medium text-gray-700 mb-1">Sucursal:</label>
        <input type="text" id="sucursal" name="sucursal"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          required>
      </div>

      <!-- Lugar de sufragio -->
      <div class="mt-4 mb-6">
        <label for="lugar_sufragio" class="block text-sm font-medium text-gray-700 mb-1">Lugar de sufragio:</label>
        <input type="text" id="lugar_sufragio" name="lugar_sufragio"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          required>
      </div>

      <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm transition duration-300">
        Reasignar Proyecto
      </button>
    </form>
  </div>
</body>
</html>
