<head>
  <meta charset="UTF-8">
  <title>Detalle de Persona</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-blur {
      position: relative;
      overflow: hidden; /* Para que el pseudo no sobresalga */
    }
    
    .bg-blur::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-image: url('{{ asset('imagenes/logo.png') }}');
      background-size: 120% auto;
      background-position: center center;
      background-repeat: no-repeat;
      filter: blur(4px);
      opacity: 0.1;
      z-index: 0;
      /* para que no se interponga en el contenido */
      pointer-events: none;
    }
    /* Para que el contenido esté sobre la imagen */
    .bg-blur > * {
      position: relative;
      z-index: 1;
    }
  </style>
</head>

<body class="bg-gray-100 p-6">

  <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-8 relative bg-blur">



    <a href="{{ route('home') }}" class="inline-block mb-4 text-indigo-600 hover:underline">
      ← Volver al inicio
    </a>
    <h1 class="text-3xl font-bold text-center mb-8">Datos de la Persona</h1>

    <div class="grid grid-cols-2 gap-4">

      <div><strong>Cédula o Pasaporte:</strong> {{ $persona->cedula_pasaporte }}</div>
      <div><strong>RUC:</strong> {{ $persona->ruc ?? ' ' }}</div>

      <div><strong>Apellidos:</strong> {{ $persona->apellidos }}</div>
      <div><strong>Nombres:</strong> {{ $persona->nombres }}</div>

      <div><strong>Estado Civil:</strong> {{ $persona->estado_civil ?? ' ' }}</div>
      <div><strong>Número de Hijos:</strong> {{ $persona->num_hijos ?? ' ' }}</div>

      <div><strong>Restricción Alimentaria:</strong> {{ $persona->informacionMedica->restriccion_alimentaria ?? 'Ninguna' }}</div>

      <!-- Dirección Domicilio -->
      <div><strong>Dirección Domicilio:</strong> {{ optional($persona->direccionDomicilio)->direccion_completa ?? 'No disponible' }}</div>

      <!-- Fecha de Nacimiento -->
      <div><strong>Fecha de Nacimiento:</strong> {{ $persona->fecha_nacimiento->format('d/m/Y') }}</div>

      <!-- País de Nacimiento -->
      <div><strong>País de Nacimiento:</strong> {{ optional($persona->informacionNacimiento)->pais_nacimiento ?? 'No disponible' }}</div>

      <!-- Provincia de Nacimiento -->
      <div><strong>Provincia de Nacimiento:</strong> {{ optional($persona->informacionNacimiento)->provincia_nacimiento ?? 'No disponible' }}</div>

      <!-- Cantón de Nacimiento -->
      <div><strong>Cantón de Nacimiento:</strong> {{ optional($persona->informacionNacimiento)->canton_nacimiento ?? 'No disponible' }}</div>

      <div><strong>Posee Discapacidad:</strong> {{ $persona->informacionMedica->posee_discapacidad ? 'Sí' : 'No' }}</div>
      <div><strong>Detalle Discapacidad:</strong> {{ optional($persona->informacionMedica)->discapacidad_detalle ?? 'Ninguna' }}</div>

      <div><strong>Posee Alergia:</strong> {{ $persona->informacionMedica->posee_alergia ? 'Sí' : 'No' }}</div>
      <div><strong>Detalle Alergia:</strong> {{ optional($persona->informacionMedica)->alergia_detalle ?? 'Ninguna' }}</div>

      <!-- Tipo de Sangre -->
      <div><strong>Tipo de Sangre:</strong> {{ optional($persona->informacionMedica)->tipo_sangre ?? 'No disponible' }}</div>

      <div><strong>Correo:</strong> {{ $persona->correo }}</div>

      <!-- Nombre Contacto Emergencia -->
      <div><strong>Nombre Contacto Emergencia:</strong> {{ optional($persona->contactoEmergencia)->nombre ?? 'No disponible' }}</div>
      <div><strong>Parentesco Contacto Emergencia:</strong> {{ optional($persona->contactoEmergencia)->parentesco ?? 'No disponible' }}</div>
      <div><strong>Teléfono Convencional (Emergencia):</strong> {{ optional($persona->contactoEmergencia)->telefono_convencional ?? 'No disponible' }}</div>
      <div><strong>Celular (Emergencia):</strong> {{ optional($persona->contactoEmergencia)->telefono_celular ?? 'No disponible' }}</div>

      <!-- Teléfonos de la persona -->
      <div><strong>Teléfono Convencional:</strong> {{ optional($persona->informacionContacto)->telefono_convencional ?? 'No disponible' }}</div>
      <div><strong>Teléfono Celular:</strong> {{ optional($persona->informacionContacto)->telefono_celular ?? 'No disponible' }}</div>

      <div class="col-span-2"><strong>Última Empresa:</strong> {{ optional($persona->informacionLaboral)->ultima_empresa ?? 'No disponible' }}</div> <a href="{{ route('persona.edit', $persona->id) }}">
        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
          Editar
        </button>
      </a>
    </div>

    @if($persona->formacion)
    <div class="mt-8 border-t pt-6">
      <h2 class="text-2xl font-bold mb-4 text-blue-600">Formación Académica</h2>
      <div class="grid grid-cols-2 gap-4">
        <div><strong>Nivel:</strong> {{ $persona->formacion->nivel }}</div>
        <div><strong>Título Obtenido:</strong> {{ $persona->formacion->titulo_obtenido }}</div>
        <a href="{{ route('formacion.edit', $persona->id) }}">
          <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
            Editar
          </button>
        </a>
      </div>
    </div>
    @else
    <div class="mt-8 border-t pt-6 text-red-600 font-semibold">
      Esta persona aún no tiene formación académica registrada.
    </div>
    @endif

    <div class="mt-8 border-t pt-6">
      <h2 class="text-2xl font-bold mb-4 text-blue-600">Proyecto Actual</h2>

      @if($proyectoActual)
      <div class="grid grid-cols-2 gap-4 mb-4 border-b pb-2">
        <div><strong class="text-gray-700">Fecha de Ingreso al Proyecto:</strong> {{ $proyectoActual->fecha_ingreso }}</div>
        <div><strong class="text-gray-700">Proyecto Asignado:</strong> {{ $proyectoActual->proyecto->nombre_proyecto }}</div>
        <div><strong class="text-gray-700">Cargo:</strong> {{ $proyectoActual->cargo }}</div>
        <div><strong class="text-gray-700">Tiempo de Dedicación:</strong> {{ $proyectoActual->tiempo_dedicacion }}</div>
        <div><strong class="text-gray-700">Sucursal:</strong> {{ $proyectoActual->sucursal }}</div>
        <div><strong class="text-gray-700">Lugar de Sufragio:</strong> {{ $proyectoActual->lugar_sufragio }}</div>

        <div class="col-span-2 flex gap-2">
          <a href="{{ route('proyecto.edit', $proyectoActual->id) }}">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow-sm">
              Editar Proyecto
            </button>
          </a>
          <a href="{{ route('proyecto.reasignacion', $persona->id) }}">
            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
              Asignar Nuevo Proyecto
            </button>
          </a>
          <a href="{{ route('proyecto.historial', $persona->id) }}">
            <button class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded shadow-sm">
              Ver Historial Completo
            </button>
          </a>
        </div>
      </div>
      @else
      <div class="text-red-600 font-semibold mb-4">
        Esta persona no tiene un proyecto activo asignado.
      </div>
      <a href="{{ route('proyecto.create', $persona->id) }}">
        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
          Asignar Proyecto
        </button>
      </a>
      @endif
    </div>

    <!-- Sección de Cuenta Bancaria -->
    <div class="mt-8 border-t pt-6">
      <h2 class="text-2xl font-bold mb-4 text-blue-600">Cuenta Bancaria</h2>

      @if($persona->cuentabancaria)
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div><strong>Banco:</strong> {{ $persona->cuentaBancaria->banco }}</div>
        <div><strong>Tipo de Cuenta:</strong> {{ $persona->cuentaBancaria->tipo_cuenta }}</div>
        <div><strong>Número de Cuenta:</strong> {{ $persona->cuentaBancaria->numero_cuenta }}</div>
        <div class="col-span-2">
          <a href="{{ route('cuentabancaria.edit', $persona->cuentaBancaria->id) }}">
            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow-sm">
              Editar Cuenta Bancaria
            </button>
          </a>
        </div>
      </div>
      @else
      <div class="text-red-600 font-semibold mb-4">
        Esta persona no tiene una cuenta bancaria registrada.
      </div>
      @endif
    </div>
    <!-- Fin de Sección de Cuenta Bancaria -->

    <!-- Botón para generar PDF -->
    <div class="mt-4">
      <a href="{{ route('persona.pdf', $persona->id) }}" target="_blank">
        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow-sm">
          📄 Generar PDF
        </button>
      </a>
    </div>

</body>

</html>