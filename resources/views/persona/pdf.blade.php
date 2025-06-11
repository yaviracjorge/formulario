<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #444;
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f0f0f0;
        }
        .foto {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 4px;
        }
        .section-title {
            background-color: #ddd;
            padding: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        .small-text {
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>

<h1>Listado de Personas</h1>

@foreach ($mostrard as $persona)

    <h2>{{ $persona->nombres }} {{ $persona->apellidos }}</h2>

    <table>
        <tr>
            <th>Foto</th>
            <td>
                <img src="{{ public_path('storage/' . $persona->foto) }}" alt="Foto" class="foto">
            </td>
        </tr>
        <tr>
            <th>Cédula / Pasaporte</th>
            <td>{{ $persona->cedula_pasaporte }}</td>
        </tr>
        <tr>
            <th>RUC</th>
            <td>{{ $persona->ruc ?? '-' }}</td>
        </tr>
        <tr>
            <th>Estado Civil</th>
            <td>{{ $persona->estado_civil ?? '-' }}</td>
        </tr>
        <tr>
            <th>Fecha Nacimiento</th>
            <td>{{ $persona->fecha_nacimiento ? $persona->fecha_nacimiento->format('d-m-Y') : '-' }}</td>
        </tr>
        <tr>
            <th>Dirección Domicilio</th>
            <td>{{ $persona->direccion_domicilio ?? '-' }}</td>
        </tr>
        <tr>
            <th>País / Provincia / Cantón</th>
            <td>
                {{ $persona->pais_nacimiento ?? '-' }} / 
                {{ $persona->provincia_nacimiento ?? '-' }} / 
                {{ $persona->canton_nacimiento ?? '-' }}
            </td>
        </tr>
        <tr>
            <th>Teléfono Celular</th>
            <td>{{ $persona->telefono_celular ?? '-' }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $persona->correo ?? '-' }}</td>
        </tr>
        <tr>
            <th>Posee Discapacidad</th>
            <td>{{ $persona->posee_discapacidad ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Detalle Discapacidad</th>
            <td>{{ $persona->discapacidad_detalle ?? '-' }}</td>
        </tr>
        <tr>
            <th>Posee Alergia</th>
            <td>{{ $persona->posee_alergia ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Detalle Alergia</th>
            <td>{{ $persona->alergia_detalle ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tipo de Sangre</th>
            <td>{{ $persona->tipo_sangre ?? '-' }}</td>
        </tr>
        <tr>
            <th>Última Empresa</th>
            <td>{{ $persona->ultima_empresa ?? '-' }}</td>
        </tr>
    </table>

    {{-- Cuenta Bancaria --}}
    <div class="section-title">Cuenta Bancaria</div>
    @if ($persona->cuentaBancaria)
        <table>
            <tr>
                <th>Banco</th>
                <td>{{ $persona->cuentaBancaria->nombre_banco }}</td>
            </tr>
            <tr>
                <th>Número de Cuenta</th>
                <td>{{ $persona->cuentaBancaria->numero_cuenta }}</td>
            </tr>
            <tr>
                <th>Tipo de Cuenta</th>
                <td>{{ $persona->cuentaBancaria->tipo_cuenta }}</td>
            </tr>
            <tr>
                <th>Nombre Titular</th>
                <td>{{ $persona->cuentaBancaria->nombre_titular }}</td>
            </tr>
            <tr>
                <th>Moneda</th>
                <td>{{ $persona->cuentaBancaria->moneda ?? '-' }}</td>
            </tr>
        </table>
    @else
        <p><em>No tiene cuenta bancaria registrada.</em></p>
    @endif

    {{-- Proyecto Actual --}}
    <div class="section-title">Proyecto Actual</div>
    @if ($persona->proyecto_actual)
        <table>
            <tr>
                <th>Nombre Proyecto</th>
                <td>{{ $persona->proyecto_actual->proyecto->nombre ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Fecha Ingreso</th>
                <td>{{ $persona->proyecto_actual->fecha_ingreso ? \Carbon\Carbon::parse($persona->proyecto_actual->fecha_ingreso)->format('d-m-Y') : '-' }}</td>
            </tr>
        </table>
    @else
        <p><em>No tiene proyecto actual asignado.</em></p>
    @endif

    {{-- Formación --}}
    <div class="section-title">Formación</div>
    @if ($persona->formacion && $persona->formacion->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Institución</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persona->formacion as $form)
                    <tr>
                        <td>{{ $form->titulo ?? '-' }}</td>
                        <td>{{ $form->institucion ?? '-' }}</td>
                        <td>{{ $form->anio ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p><em>No tiene formación registrada.</em></p>
    @endif

    <hr style="margin: 30px 0;">
@endforeach

</body>
</html>
