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
            <ul class="mt-1">
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
    
    <form action="{{ route('persona.update', $persona->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Cédula/Pasaporte:</label>
                <input type="text" name="cedula_pasaporte" value="{{ old('cedula_pasaporte', $persona->cedula_pasaporte) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">RUC:</label>
                <input type="text" name="ruc" value="{{ old('ruc', $persona->ruc) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Apellidos:</label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $persona->apellidos) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Nombres:</label>
                <input type="text" name="nombres" value="{{ old('nombres', $persona->nombres) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Estado Civil:</label>
                <input type="text" name="estado_civil" value="{{ old('estado_civil', $persona->estado_civil) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Número de Hijos:</label>
                <input type="number" name="num_hijos" value="{{ old('num_hijos', $persona->num_hijos) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Restricción Alimentaria:</label>
                <input type="text" name="restriccion_alimentaria" value="{{ old('restriccion_alimentaria', $persona->restriccion_alimentaria) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Dirección Domicilio:</label>
                <textarea name="direccion_domicilio" class="w-full p-2 border rounded">{{ old('direccion_domicilio', $persona->direccion_domicilio) }}</textarea>
            </div>
            <div>
                <label class="block text-gray-700">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento->format('Y-m-d')) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">País de Nacimiento:</label>
                <input type="text" name="pais_nacimiento" value="{{ old('pais_nacimiento', $persona->pais_nacimiento) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Provincia de Nacimiento:</label>
                <input type="text" name="provincia_nacimiento" value="{{ old('provincia_nacimiento', $persona->provincia_nacimiento) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Cantón de Nacimiento:</label>
                <input type="text" name="canton_nacimiento" value="{{ old('canton_nacimiento', $persona->canton_nacimiento) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">¿Posee Discapacidad?</label>
                <select name="posee_discapacidad" class="w-full p-2 border rounded">
                    <option value="0" {{ $persona->posee_discapacidad ? '' : 'selected' }}>No</option>
                    <option value="1" {{ $persona->posee_discapacidad ? 'selected' : '' }}>Sí</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700">Detalle Discapacidad:</label>
                <input type="text" name="discapacidad_detalle" value="{{ old('discapacidad_detalle', $persona->discapacidad_detalle) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">¿Posee Alergia?</label>
                <select name="posee_alergia" class="w-full p-2 border rounded">
                    <option value="0" {{ $persona->posee_alergia ? '' : 'selected' }}>No</option>
                    <option value="1" {{ $persona->posee_alergia ? 'selected' : '' }}>Sí</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700">Detalle Alergia:</label>
                <input type="text" name="alergia_detalle" value="{{ old('alergia_detalle', $persona->alergia_detalle) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Tipo de Sangre:</label>
                <input type="text" name="tipo_sangre" value="{{ old('tipo_sangre', $persona->tipo_sangre) }}" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Correo:</label>
                <input type="email" name="correo" value="{{ old('correo', $persona->correo) }}" class="w-full p-2 border rounded" required>
            </div>
        </div>

        <h3 class="text-lg font-semibold mt-6">Contacto de Emergencia</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Nombre:</label>
                <input type="text" name="contacto_emergencia_nombre" value="{{ old('contacto_emergencia_nombre', $persona->contacto_emergencia_nombre) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Parentesco:</label>
                <input type="text" name="contacto_emergencia_parentesco" value="{{ old('contacto_emergencia_parentesco', $persona->contacto_emergencia_parentesco) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Teléfono Convencional:</label>
                <input type="text" name="contacto_emergencia_convencional" value="{{ old('contacto_emergencia_convencional', $persona->contacto_emergencia_convencional) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Celular:</label>
                <input type="text" name="contacto_emergencia_celular" value="{{ old('contacto_emergencia_celular', $persona->contacto_emergencia_celular) }}" class="w-full p-2 border rounded">
            </div>
        </div>

        <h3 class="text-lg font-semibold mt-6">Teléfonos Personales</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Teléfono Convencional:</label>
                <input type="text" name="telefono_convencional" value="{{ old('telefono_convencional', $persona->telefono_convencional) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-gray-700">Celular:</label>
                <input type="text" name="telefono_celular" value="{{ old('telefono_celular', $persona->telefono_celular) }}" class="w-full p-2 border rounded">
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700">Última Empresa:</label>
            <textarea name="ultima_empresa" class="w-full p-2 border rounded">{{ old('ultima_empresa', $persona->ultima_empresa) }}</textarea>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition">Actualizar</button>
        </div>
    </form>
</div>

</body>
</html>