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

    {{-- Mostrar mensaje de éxito --}}
    @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
      </div>
    @endif

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('asignaciones.reasignar') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
      @csrf
      <input type="hidden" name="persona_id" value="{{ $persona_id }}">

      {{-- Proyecto actual (si existe) --}}
      @if($proyectoActual)
        <div class="mb-6 p-4 bg-gray-100 rounded-md">
          <p class="text-gray-700 font-semibold mb-1">Proyecto actual:</p>
          <p class="text-gray-700">Nombre: {{ $proyectoActual->proyecto->nombre_proyecto }}</p>
          <p class="text-gray-700">Fecha de ingreso: {{ $proyectoActual->fecha_ingreso }}</p>
          @if($proyectoActual->fecha_salida)
            <p class="text-gray-700">Fecha de salida: {{ $proyectoActual->fecha_salida }}</p>
          @else
            <p class="text-red-600 font-semibold">Proyecto aún activo</p>
          @endif
        </div>
      @endif

      {{-- Nuevo proyecto --}}
      <div class="mb-4">
        <label for="proyecto_id" class="block text-sm font-medium text-gray-700 mb-1">Nuevo proyecto:</label>
        <select id="proyecto_id" name="proyecto_id" required
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          <option value="" disabled selected>Seleccione un proyecto</option>
          @foreach($proyectos as $proyecto)
            <option value="{{ $proyecto->id }}" {{ old('proyecto_id') == $proyecto->id ? 'selected' : '' }}>
              {{ $proyecto->nombre_proyecto }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Fecha de ingreso --}}
      <div class="mb-4">
        <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700 mb-1">Fecha de ingreso:</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" required
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          value="{{ old('fecha_ingreso', date('Y-m-d')) }}">
      </div>

      {{-- Cargo --}}
      <div class="mb-4">
        <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required maxlength="255"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          value="{{ old('cargo') }}">
      </div>

      {{-- Tiempo de dedicación --}}
      <div class="mb-4">
        <label for="tiempo_dedicacion" class="block text-sm font-medium text-gray-700 mb-1">Tiempo de dedicación (ej: FT, PT):</label>
        <input type="text" id="tiempo_dedicacion" name="tiempo_dedicacion" required maxlength="3"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          value="{{ old('tiempo_dedicacion') }}">
      </div>

      {{-- Sucursal --}}
      <div class="mb-4">
        <label for="sucursal" class="block text-sm font-medium text-gray-700 mb-1">Sucursal:</label>
        <input type="text" id="sucursal" name="sucursal" required maxlength="255"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          value="{{ old('sucursal') }}">
      </div>

      {{-- Lugar de sufragio --}}
      <div class="mb-6">
        <label for="lugar_sufragio" class="block text-sm font-medium text-gray-700 mb-1">Lugar de sufragio:</label>
        <input type="text" id="lugar_sufragio" name="lugar_sufragio" required maxlength="255"
          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
          value="{{ old('lugar_sufragio') }}">
      </div>

      <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm transition duration-300">
        Reasignar Proyecto
      </button>
    </form>
  </div>
</body>
</html>
