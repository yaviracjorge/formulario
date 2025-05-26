<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Detalle de Persona</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

  <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-8">
    <h1 class="text-3xl font-bold text-center mb-8">Datos de la Persona</h1>

    <div class="grid grid-cols-2 gap-4">
      <div><strong>Cédula o Pasaporte:</strong> {{ $persona->cedula_pasaporte }}</div>
      <div><strong>RUC:</strong> {{ $persona->ruc ?? ' ' }}</div>

      <div><strong>Apellidos:</strong> {{ $persona->apellidos }}</div>
      <div><strong>Nombres:</strong> {{ $persona->nombres }}</div>

      <div><strong>Estado Civil:</strong> {{ $persona->estado_civil ?? ' ' }}</div>
      <div><strong>Número de Hijos:</strong> {{ $persona->num_hijos ?? ' ' }}</div>

      <div><strong>Restricción Alimentaria:</strong> {{ $persona->restriccion_alimentaria ?? 'Ninguna' }}</div>
      <div><strong>Dirección Domicilio:</strong> {{ $persona->direccion_domicilio }}</div>

      <div><strong>Fecha de Nacimiento:</strong> {{ $persona->fecha_nacimiento }}</div>
      <div><strong>País de Nacimiento:</strong> {{ $persona->pais_nacimiento }}</div>
      <div><strong>Provincia de Nacimiento:</strong> {{ $persona->provincia_nacimiento }}</div>
      <div><strong>Cantón de Nacimiento:</strong> {{ $persona->canton_nacimiento }}</div>

      <div><strong>Posee Discapacidad:</strong> {{ $persona->posee_discapacidad ? 'Sí' : 'No' }}</div>
      <div><strong>Detalle Discapacidad:</strong> {{ $persona->discapacidad_detalle ?? ' ' }}</div>

      <div><strong>Posee Alergia:</strong> {{ $persona->posee_alergia ? 'Sí' : 'No' }}</div>
      <div><strong>Detalle Alergia:</strong> {{ $persona->alergia_detalle ?? ' ' }}</div>

      <div><strong>Tipo de Sangre:</strong> {{ $persona->tipo_sangre }}</div>
      <div><strong>Correo:</strong> {{ $persona->correo }}</div>

      <div><strong>Nombre Contacto Emergencia:</strong> {{ $persona->contacto_emergencia_nombre ?? ' ' }}</div>
      <div><strong>Parentesco Contacto Emergencia:</strong> {{ $persona->contacto_emergencia_parentesco ?? ' ' }}</div>
      <div><strong>Teléfono Convencional (Emergencia):</strong> {{ $persona->contacto_emergencia_convencional ?? ' ' }}</div>
      <div><strong>Celular (Emergencia):</strong> {{ $persona->contacto_emergencia_celular ?? ' ' }}</div>

      <div><strong>Teléfono Convencional:</strong> {{ $persona->telefono_convencional ?? ' ' }}</div>
      <div><strong>Teléfono Celular:</strong> {{ $persona->telefono_celular ?? ' ' }}</div>

      <div class="col-span-2"><strong>Última Empresa:</strong> {{ $persona->ultima_empresa }}</div>
    </div>

    @if($persona->formacion)
    <div class="mt-8 border-t pt-6">
      <h2 class="text-2xl font-bold mb-4 text-blue-600">Formación Académica</h2>
      <div class="grid grid-cols-2 gap-4">
        <div><strong>Nivel:</strong> {{ $persona->formacion->nivel }}</div>
        <div><strong>Título Obtenido:</strong> {{ $persona->formacion->titulo_obtenido }}</div>
      </div>
    </div>
    @else
    <div class="mt-8 border-t pt-6 text-red-600 font-semibold">
      Esta persona aún no tiene formación académica registrada.
    </div>
    @endif
  </div>

</body>
</html>
