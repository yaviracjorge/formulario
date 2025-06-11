<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Persona - {{ $persona->nombres }} {{ $persona->apellidos }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Editar Persona</h2>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">¡Error!</strong>
            <ul class="mt-1 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('persona.update', $persona->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="cedula_pasaporte" class="block text-gray-700">Cédula/Pasaporte:</label>
                <input id="cedula_pasaporte" type="text" name="cedula_pasaporte" value="{{ old('cedula_pasaporte', $persona->cedula_pasaporte) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="ruc" class="block text-gray-700">RUC:</label>
                <input id="ruc" type="text" name="ruc" value="{{ old('ruc', $persona->ruc) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="apellidos" class="block text-gray-700">Apellidos:</label>
                <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos', $persona->apellidos) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="nombres" class="block text-gray-700">Nombres:</label>
                <input id="nombres" type="text" name="nombres" value="{{ old('nombres', $persona->nombres) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="estado_civil" class="block text-gray-700">Estado Civil:</label>
                <input id="estado_civil" type="text" name="estado_civil" value="{{ old('estado_civil', $persona->estado_civil) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="num_hijos" class="block text-gray-700">Número de Hijos:</label>
                <input id="num_hijos" type="number" name="num_hijos" value="{{ old('num_hijos', $persona->num_hijos) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="restriccion_alimentaria" class="block text-gray-700">Restricción Alimentaria:</label>
                <input id="restriccion_alimentaria" type="text" name="restriccion_alimentaria" value="{{ old('restriccion_alimentaria', $persona->restriccion_alimentaria) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="direccion_domicilio" class="block text-gray-700">Dirección Domicilio:</label>
                <textarea id="direccion_domicilio" name="direccion_domicilio" class="w-full p-2 border rounded">{{ old('direccion_domicilio', $persona->direccion_domicilio) }}</textarea>
            </div>
            <div>
                <label for="fecha_nacimiento" class="block text-gray-700">Fecha de Nacimiento:</label>
                <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento ? $persona->fecha_nacimiento->format('Y-m-d') : '') }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="pais_nacimiento" class="block text-gray-700">País de Nacimiento:</label>
                <input id="pais_nacimiento" type="text" name="pais_nacimiento" value="{{ old('pais_nacimiento', $persona->pais_nacimiento) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="provincia_nacimiento" class="block text-gray-700">Provincia de Nacimiento:</label>
                <input id="provincia_nacimiento" type="text" name="provincia_nacimiento" value="{{ old('provincia_nacimiento', $persona->provincia_nacimiento) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="canton_nacimiento" class="block text-gray-700">Cantón de Nacimiento:</label>
                <input id="canton_nacimiento" type="text" name="canton_nacimiento" value="{{ old('canton_nacimiento', $persona->canton_nacimiento) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="posee_discapacidad" class="block text-gray-700">¿Posee Discapacidad?</label>
                <select id="posee_discapacidad" name="posee_discapacidad" class="w-full p-2 border rounded">
                    <option value="0" {{ old('posee_discapacidad', $persona->posee_discapacidad) == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('posee_discapacidad', $persona->posee_discapacidad) == 1 ? 'selected' : '' }}>Sí</option>
                </select>
            </div>
            <div>
                <label for="discapacidad_detalle" class="block text-gray-700">Detalle Discapacidad:</label>
                <input id="discapacidad_detalle" type="text" name="discapacidad_detalle" value="{{ old('discapacidad_detalle', $persona->discapacidad_detalle) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="posee_alergia" class="block text-gray-700">¿Posee Alergia?</label>
                <select id="posee_alergia" name="posee_alergia" class="w-full p-2 border rounded">
                    <option value="0" {{ old('posee_alergia', $persona->posee_alergia) == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('posee_alergia', $persona->posee_alergia) == 1 ? 'selected' : '' }}>Sí</option>
                </select>
            </div>
            <div>
                <label for="alergia_detalle" class="block text-gray-700">Detalle Alergia:</label>
                <input id="alergia_detalle" type="text" name="alergia_detalle" value="{{ old('alergia_detalle', $persona->alergia_detalle) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="tipo_sangre" class="block text-gray-700">Tipo de Sangre:</label>
                <input id="tipo_sangre" type="text" name="tipo_sangre" value="{{ old('tipo_sangre', $persona->tipo_sangre) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="correo" class="block text-gray-700">Correo:</label>
                <input id="correo" type="email" name="correo" value="{{ old('correo', $persona->correo) }}" class="w-full p-2 border rounded" required>
            </div>
        </div>

        <h3 class="text-lg font-semibold mt-6">Contacto de Emergencia</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="contacto_emergencia_nombre" class="block text-gray-700">Nombre:</label>
                <input id="contacto_emergencia_nombre" type="text" name="contacto_emergencia_nombre" value="{{ old('contacto_emergencia_nombre', $persona->contacto_emergencia_nombre) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="contacto_emergencia_parentesco" class="block text-gray-700">Parentesco:</label>
                <input id="contacto_emergencia_parentesco" type="text" name="contacto_emergencia_parentesco" value="{{ old('contacto_emergencia_parentesco', $persona->contacto_emergencia_parentesco) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="contacto_emergencia_convencional" class="block text-gray-700">Teléfono Convencional:</label>
                <input id="contacto_emergencia_convencional" type="text" name="contacto_emergencia_convencional" value="{{ old('contacto_emergencia_convencional', $persona->contacto_emergencia_convencional) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="contacto_emergencia_celular" class="block text-gray-700">Teléfono Celular:</label>
                <input id="contacto_emergencia_celular" type="text" name="contacto_emergencia_celular" value="{{ old('contacto_emergencia_celular', $persona->contacto_emergencia_celular) }}" class="w-full p-2 border rounded">
            </div>
        </div>

        <h3 class="text-lg font-semibold mt-6">Foto (Opcional)</h3>
        <div>
            <input id="foto" type="file" name="foto" accept="image/*" class="border rounded p-2 w-full">
            @if($persona->foto)
                <img src="{{ asset('storage/' . $persona->foto) }}" alt="Foto de {{ $persona->nombres }}" class="mt-3 max-w-xs rounded">
            @endif
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Actualizar</button>
            <a href="{{ route('persona.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
