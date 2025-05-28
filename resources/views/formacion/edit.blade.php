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
      <h1 class="text-2xl font-bold mb-4 text-gray-900">Editar Formacion</h1>

      {{--Enlista los errores(en este caso campo requeridos).--}}
      @if($errors->any())
      <div>
        <h2>Errors:</h2>
        <ul class="list-disc pl-5">
          @foreach($errors->all() as $error)
          <li class="text-red-600">{{ $error }}</li>
          @endforeach
      </div>
      @endif
      <form action="{{ route('formacion.update', $formacion->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
          <label for="nivel" class="block text-sm font-medium text-gray-700 mb-1">Nivel de educación:</label>
          <select id="nivel" name="nivel" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            <option value="{{ old('nivel',$formacion->nivel) }}">{{$formacion->nivel}}</option>
            <option value="Bachiller">Bachiller</option>
            <option value="Estudiante universitario">Estudiante universitario</option>
            <option value="Tercer nivel completo">Tercer nivel completo</option>
            <option value="Diplomado">Diplomado</option>
            <option value="Especialización">Especialización</option>
            <option value="Maestría">Maestría</option>
            <option value="Doctorado">Doctorado</option>
          </select>
        </div>
        <div>
          <label for="titulo_obtenido" class="block text-sm font-medium text-gray-700">Titulo</label>
          <input type="text" name="titulo_obtenido" id="titulo_obtenido" value="{{ old('titulo_obtenido',$formacion->titulo_obtenido) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
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