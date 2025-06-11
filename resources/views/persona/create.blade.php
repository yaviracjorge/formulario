@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">Crear Persona</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('persona.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- DATOS PERSONALES -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Datos Personales</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="cedula" class="block text-gray-700 mb-1">Cédula:</label>
                    <input type="text" id="cedula" name="cedula" value="{{ old('cedula') }}" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label for="ruc" class="block text-gray-700 mb-1">RUC:</label>
                    <input type="text" id="ruc" name="ruc" value="{{ old('ruc') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="nombres" class="block text-gray-700 mb-1">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label for="apellidos" class="block text-gray-700 mb-1">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label for="estado_civil" class="block text-gray-700 mb-1">Estado Civil:</label>
                    <input type="text" id="estado_civil" name="estado_civil" value="{{ old('estado_civil') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="hijos" class="block text-gray-700 mb-1">Hijos:</label>
                    <input type="number" id="hijos" name="hijos" value="{{ old('hijos') }}" min="0" class="w-full p-2 border rounded">
                </div>
                <div class="col-span-2">
                    <label for="direccion" class="block text-gray-700 mb-1">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="correo" class="block text-gray-700 mb-1">Correo:</label>
                    <input type="email" id="correo" name="correo" value="{{ old('correo') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="lugar_nacimiento" class="block text-gray-700 mb-1">Lugar de Nacimiento:</label>
                    <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ old('lugar_nacimiento') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="fecha_nacimiento" class="block text-gray-700 mb-1">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="w-full p-2 border rounded">
                </div>
            </div>
        </div>

        <!-- INFORMACIÓN MÉDICA -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Información Médica</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="discapacidad" class="block text-gray-700 mb-1">Discapacidad:</label>
                    <input type="text" id="discapacidad" name="discapacidad" value="{{ old('discapacidad') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="alergias" class="block text-gray-700 mb-1">Alergias:</label>
                    <input type="text" id="alergias" name="alergias" value="{{ old('alergias') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="restricciones" class="block text-gray-700 mb-1">Restricciones Médicas:</label>
                    <input type="text" id="restricciones" name="restricciones" value="{{ old('restricciones') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="tipo_sangre" class="block text-gray-700 mb-1">Tipo de Sangre:</label>
                    <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre') }}" class="w-full p-2 border rounded">
                </div>
            </div>
        </div>

        <!-- TELÉFONOS -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Teléfonos</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="telefono_personal" class="block text-gray-700 mb-1">Teléfono Personal:</label>
                    <input type="text" id="telefono_personal" name="telefono_personal" value="{{ old('telefono_personal') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="telefono_casa" class="block text-gray-700 mb-1">Teléfono de Casa:</label>
                    <input type="text" id="telefono_casa" name="telefono_casa" value="{{ old('telefono_casa') }}" class="w-full p-2 border rounded">
                </div>
            </div>
        </div>

        <!-- CONTACTO DE EMERGENCIA -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Contacto de Emergencia</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="contacto_emergencia_nombre" class="block text-gray-700 mb-1">Nombre:</label>
                    <input type="text" id="contacto_emergencia_nombre" name="contacto_emergencia_nombre" value="{{ old('contacto_emergencia_nombre') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="contacto_emergencia_telefono" class="block text-gray-700 mb-1">Teléfono:</label>
                    <input type="text" id="contacto_emergencia_telefono" name="contacto_emergencia_telefono" value="{{ old('contacto_emergencia_telefono') }}" class="w-full p-2 border rounded">
                </div>
            </div>
        </div>

        <!-- EXPERIENCIA LABORAL -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Experiencia Laboral</h3>
            <textarea id="experiencia" name="experiencia" rows="4" class="w-full p-2 border rounded">{{ old('experiencia') }}</textarea>
        </div>

        <!-- ASIGNACIÓN A PROYECTO -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Asignación a Proyecto</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="proyecto_id" class="block text-gray-700 mb-1">Proyecto:</label>
                    <select id="proyecto_id" name="proyecto_id" class="w-full p-2 border rounded" required>
                        <option value="">Seleccione un proyecto</option>
                        @foreach($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}" {{ old('proyecto_id') == $proyecto->id ? 'selected' : '' }}>
                                {{ $proyecto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="fecha_ingreso" class="block text-gray-700 mb-1">Fecha de Ingreso:</label>
                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="cargo" class="block text-gray-700 mb-1">Cargo:</label>
                    <input type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="tiempo" class="block text-gray-700 mb-1">Tiempo:</label>
                    <input type="text" id="tiempo" name="tiempo" value="{{ old('tiempo') }}" class="w-full p-2 border rounded">
                </div>
                <div class="col-span-2">
                    <label for="sucursal" class="block text-gray-700 mb-1">Sucursal:</label>
                    <input type="text" id="sucursal" name="sucursal" value="{{ old('sucursal') }}" class="w-full p-2 border rounded">
                </div>
            </div>
        </div>

        <!-- INFORMACIÓN BANCARIA -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Información Bancaria</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="nombre_banco" class="block text-gray-700 mb-1">Nombre del Banco:</label>
                    <input type="text" id="nombre_banco" name="nombre_banco" value="{{ old('nombre_banco') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="numero_cuenta" class="block text-gray-700 mb-1">Número de Cuenta:</label>
                    <input type="text" id="numero_cuenta" name="numero_cuenta" value="{{ old('numero_cuenta') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="tipo_cuenta" class="block text-gray-700 mb-1">Tipo de Cuenta:</label>
                    <input type="text" id="tipo_cuenta" name="tipo_cuenta" value="{{ old('tipo_cuenta') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="nombre_titular" class="block text-gray-700 mb-1">Nombre del Titular:</label>
                    <input type="text" id="nombre_titular" name="nombre_titular" value="{{ old('nombre_titular') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="codigo_banco" class="block text-gray-700 mb-1">Código SWIFT/BIC:</label>
                    <input type="text" id="codigo_banco" name="codigo_banco" value="{{ old('codigo_banco') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="moneda" class="block text-gray-700 mb-1">Moneda:</label>
                    <input type="text" id="moneda" name="moneda" value="{{ old('moneda') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="sucursal_banco" class="block text-gray-700 mb-1">Sucursal del Banco:</label>
                    <input type="text" id="sucursal_banco" name="sucursal_banco" value="{{ old('sucursal_banco') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="direccion_banco" class="block text-gray-700 mb-1">Dirección del Banco:</label>
                    <input type="text" id="direccion_banco" name="direccion_banco" value="{{ old('direccion_banco') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="pais_banco" class="block text-gray-700 mb-1">País:</label>
                    <input type="text" id="pais_banco" name="pais_banco" value="{{ old('pais_banco') }}" class="w-full p-2 border rounded">
                </div>
            </div>
        </div>

        <!-- FOTO -->
        <div>
            <label for="foto" class="block text-gray-700 mb-1">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" class="w-full p-2 border rounded">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Guardar
            </button>
            <a href="{{ route('persona.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">Cancelar</a>
        </div>
    </form>
</div>
@endsection
