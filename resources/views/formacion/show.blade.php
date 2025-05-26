<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mostrar Curso</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

  <div class="max-w-3xl mx-auto p-6">

    <a href="{{ route('home') }}" class="inline-block mb-4 text-indigo-600 hover:underline">
      ← Volver al inicio
    </a>
    @foreach($dato as $datos)

    <div class="bg-white rounded-lg shadow p-6 space-y-4">
      <h1 class="text-2xl font-bold text-gray-900">Detalles del Curso</h1>

      <div class="space-y-2">
        <p><span class="font-semibold">Nombre:</span> {{ $datos->nivel }}</p>
        <p><span class="font-semibold">Nombre:</span> {{ $datos->titulo_obtenido}}</p>
      </div>
    </div>
    @endforeach

  </div>

</body>

</html>