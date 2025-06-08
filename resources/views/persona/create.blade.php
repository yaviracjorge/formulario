<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Persona</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <a href="{{ route('home') }}" class="inline-block mb-4 text-indigo-600 hover:underline">
            ← Volver al inicio
        </a>
        <h2 class="text-2xl font-semibold mb-6">Formulario de Persona</h2>
        <form action="{{ route('persona.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- DATOS PERSONALES -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Datos Personales</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Cédula/Pasaporte:</label>
                        <input type="text" name="cedula_pasaporte" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">RUC:</label>
                        <input type="text" name="ruc" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Apellidos:</label>
                        <input type="text" name="apellidos" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Nombres:</label>
                        <input type="text" name="nombres" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Estado Civil:</label>
                        <input type="text" name="estado_civil" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Número de Hijos:</label>
                        <input type="number" name="num_hijos" class="w-full p-2 border rounded">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700">Dirección Domicilio:</label>
                        <textarea name="direccion_domicilio" class="w-full p-2 border rounded"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700">Correo:</label>
                        <input type="email" name="correo" class="w-full p-2 border rounded" required>
                    </div>
                </div>
            </div>

            <!-- NACIMIENTO -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Lugar y Fecha de Nacimiento</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">País de Nacimiento:</label>
                        <input type="text" name="pais_nacimiento" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Provincia de Nacimiento:</label>
                        <input type="text" name="provincia_nacimiento" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Cantón de Nacimiento:</label>
                        <input type="text" name="canton_nacimiento" class="w-full p-2 border rounded" required>
                    </div>
                </div>
            </div>

            <!-- INFORMACIÓN MÉDICA -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Información Médica</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">¿Posee Discapacidad?</label>
                        <select name="posee_discapacidad" class="w-full p-2 border rounded">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Detalle Discapacidad:</label>
                        <input type="text" name="discapacidad_detalle" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">¿Posee Alergia?</label>
                        <select name="posee_alergia" class="w-full p-2 border rounded">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Detalle Alergia:</label>
                        <input type="text" name="alergia_detalle" class="w-full p-2 border rounded">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700">Restricción Alimentaria:</label>
                        <input type="text" name="restriccion_alimentaria" class="w-full p-2 border rounded">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700">Tipo de Sangre:</label>
                        <input type="text" name="tipo_sangre" class="w-full p-2 border rounded" required>
                    </div>
                </div>
            </div>

            <!-- TELÉFONOS -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Teléfonos Personales</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Teléfono Convencional:</label>
                        <input type="text" name="telefono_convencional" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Celular:</label>
                        <input type="text" name="telefono_celular" class="w-full p-2 border rounded">
                    </div>
                </div>
            </div>

            <!-- CONTACTO DE EMERGENCIA -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contacto de Emergencia</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Nombre:</label>
                        <input type="text" name="contacto_emergencia_nombre" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Parentesco:</label>
                        <input type="text" name="contacto_emergencia_parentesco" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Teléfono Convencional:</label>
                        <input type="text" name="contacto_emergencia_convencional" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Celular:</label>
                        <input type="text" name="contacto_emergencia_celular" class="w-full p-2 border rounded">
                    </div>
                </div>
            </div>

            <!-- EXPERIENCIA LABORAL -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Experiencia Laboral</h3>
                <label class="block text-gray-700 mb-2">Última Empresa:</label>
                <textarea name="ultima_empresa" class="w-full p-2 border rounded"></textarea>
            </div>


            <!-- BOTÓN DE ENVÍO -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition">
                    Guardar Datos Completos
                </button>
            </div>
        </form>
    </div>

</body>

</html>