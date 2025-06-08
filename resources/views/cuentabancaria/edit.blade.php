<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Cuenta Bancaria</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

  <div class="max-w-3xl mx-auto p-6">

    <a href="{{ route('home') }}" class="inline-block mb-4 text-indigo-600 hover:underline">
      ← Volver al inicio
    </a>

    <div class="bg-white p-6 rounded-lg shadow">
      <h1 class="text-2xl font-bold mb-4 text-gray-900">Editar Cuenta Bancaria</h1>

      @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
          {{ session('success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
          <h2>Errores:</h2>
          <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('cuentabancaria.update', $cuentabancaria->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
          <label for="banco" class="block text-sm font-medium text-gray-700 mb-1">Banco:</label>
          <input type="text" name="banco" id="banco" value="{{ old('banco', $cuentabancaria->banco) }}" 
                 class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
          <label for="tipo_cuenta" class="block text-sm font-medium text-gray-700 mb-1">Tipo de cuenta:</label>
          <select id="tipo_cuenta" name="tipo_cuenta" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            <option value="{{ old('tipo_cuenta', $cuentabancaria->tipo_cuenta) }}">{{ $cuentabancaria->tipo_cuenta }}</option>
            <option value="Cuenta corriente">Cuenta corriente</option>
            <option value="Cuenta de ahorros">Cuenta de ahorros</option>
            <option value="Cuenta nómina">Cuenta nómina</option>
            <option value="Cuenta vista">Cuenta vista</option>
          </select>
        </div>

        <div>
          <label for="numero_cuenta" class="block text-sm font-medium text-gray-700 mb-1">Número de cuenta:</label>
          <input type="text" name="numero_cuenta" id="numero_cuenta" value="{{ old('numero_cuenta', $cuentabancaria->numero_cuenta) }}" 
                 class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" required>
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