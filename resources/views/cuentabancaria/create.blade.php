<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cuenta Bancaria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Agregar Cuenta Bancaria</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('cuentabancaria.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Campo oculto con persona_id -->
                <input type="hidden" name="persona_id" value="{{ $persona_id }}">

                <div>
                    <label for="banco" class="block text-sm font-medium text-gray-700 mb-1">Banco:</label>
                    <input type="text" id="banco" name="banco" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                           placeholder="Nombre del banco"
                           required>
                </div>

                <div>
                    <label for="tipo_cuenta" class="block text-sm font-medium text-gray-700 mb-1">Tipo de cuenta:</label>
                    <select id="tipo_cuenta" name="tipo_cuenta" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">-- Seleccione un tipo --</option>
                        <option value="Cuenta corriente">Cuenta corriente</option>
                        <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                        <option value="Cuenta nómina">Cuenta nómina</option>
                        <option value="Cuenta vista">Cuenta vista</option>
                    </select>
                </div>

                <div>
                    <label for="numero_cuenta" class="block text-sm font-medium text-gray-700 mb-1">Número de cuenta:</label>
                    <input type="text" id="numero_cuenta" name="numero_cuenta" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                           placeholder="Número de cuenta"
                           required>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm transition duration-300">
                        Guardar Cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>