<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detalles de Cuenta Bancaria</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

  <div class="max-w-3xl mx-auto p-6">

    <a href="{{ route('home') }}" class="inline-block mb-4 text-indigo-600 hover:underline">
      ← Volver al inicio
    </a>
    
    @if(session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
        {{ session('success') }}
      </div>
    @endif
    
    @foreach($dato as $datos)
    <div class="bg-white rounded-lg shadow p-6 space-y-4 mb-4">
      <h1 class="text-2xl font-bold text-gray-900">Detalles de la Cuenta Bancaria</h1>

      <div class="space-y-2">
        <p><span class="font-semibold">Banco:</span> {{ $datos->banco }}</p>
        <p><span class="font-semibold">Tipo de cuenta:</span> {{ $datos->tipo_cuenta }}</p>
        <p><span class="font-semibold">Número de cuenta:</span> {{ $datos->numero_cuenta }}</p>
      </div>
      
      <div class="pt-4">
        <a href="{{ route('cuentabancaria.edit', $datos->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md shadow">
          Editar
        </a>
      </div>
    </div>
    @endforeach

  </div>

</body>
</html>