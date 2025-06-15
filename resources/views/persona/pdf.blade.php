<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Persona - {{ $persona->nombres }} {{ $persona->apellidos }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "DejaVu Sans", Arial, sans-serif !important;
            font-size: 10px !important;
            line-height: 1.4 !important;
            color: #333 !important;
            background: white;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100% !important;
            margin: 0 auto;
            padding: 10px !important;
        }

        .header {
            text-align: center;
            margin-bottom: 15px !important;
            background-color: #FF8C42;
            padding: 8px;
            color: white;
        }

        .header h1 {
            font-size: 16px !important;
            font-weight: bold !important;
            margin: 0;
        }

        .section-table {
            width: 100% !important;
            border-collapse: collapse;
            margin-bottom: 0px !important;
            border: 2px solid #000;
        }

        .section-header {
            background-color: #D3D3D3;
            font-weight: bold !important;
            text-align: center;
            padding: 5px !important;
            border: 1px solid #000;
            font-size: 11px !important;
        }

        .field-label {
            background-color: #f8f9fa;
            border: 1px solid #000;
            padding: 3px 5px !important;
            font-weight: bold !important;
            font-size: 9px !important;
            text-align: right;
            vertical-align: middle;
            margin: 0;
            line-height: 1.2;
        }

        .field-value {
            border: 1px solid #000;
            padding: 3px 5px !important;
            font-size: 9px !important;
            vertical-align: middle;
            margin: 0;
            line-height: 1.2;
        }

        .education-table {
            width: 100% !important;
            border-collapse: collapse;
            border: 2px solid #000;
            margin-bottom: 0px !important;
        }

        .education-header {
            background-color: #D3D3D3;
            font-weight: bold !important;
            text-align: center;
            padding: 5px !important;
            border: 1px solid #000;
            font-size: 10px !important;
        }

        .education-cell {
            border: 1px solid #000;
            padding: 5px !important;
            font-size: 9px !important;
            text-align: center;
            vertical-align: middle;
            margin: 0;
            line-height: 1.2;
        }

        .work-section {
            margin-top: 0px;
        }

        .work-table {
            width: 100% !important;
            border-collapse: collapse;
            border: 2px solid #000;
            margin-bottom: 0px !important;
        }

        .banking-header {
            background-color: #D3D3D3;
            font-weight: bold !important;
            text-align: center;
            padding: 5px !important;
            border: 1px solid #000;
            font-size: 11px !important;
            text-transform: uppercase;
        }

        /* Estilos específicos para la tabla de lugar de nacimiento */
        .birth-place-row td {
            width: 16.66% !important;
        }

        .birth-place-row .field-label {
            width: 16.66% !important;
        }

        .birth-place-row .field-value {
            width: 16.66% !important;
        }

        /* Estilos para la fila de discapacidad/alergia */
        .health-row td {
            width: 12.5% !important;
        }

        /* Estilos adicionales para PDF */
        @media print {
            body {
                margin: 0;
                padding: 10px;
            }

            .container {
                padding: 0 !important;
            }

            .section-table {
                page-break-inside: avoid;
            }
        }

        @page {
            margin: 10mm;
            size: A4;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>FICHA PERSONAL</h1>

        </div>

        <!-- Información General -->
        <table class="section-table">
            <thead>
                <tr>
                    <th colspan="4" class="section-header">Información General</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="field-label" style="width: 11%;">Número de Cédula/Pasaporte</td>
                    <td class="field-value" style="width: 11%;">{{ $persona->cedula_pasaporte }}</td>
                    <td class="field-label" style="width: 11%;">RUC</td>
                    <td class="field-value" style="width: 11%;">{{ $persona->ruc ?? '' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Apellidos</td>
                    <td class="field-value">{{ $persona->apellidos }}</td>
                    <td class="field-label">Nombres</td>
                    <td class="field-value">{{ $persona->nombres }}</td>
                </tr>

                <tr>
                    <td class="field-label">Última lugar donde trabajó</td>
                    <td class="field-value" colspan="3">{{ $persona->informacionLaboral->ultima_empresa ?? '' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Teléfono Convencional</td>
                    <td class="field-value">{{ $persona->informacionContacto->telefono_convencional ?? '' }}</td>
                    <td class="field-label">Teléfono Celular</td>
                    <td class="field-value">{{ $persona->informacionContacto->telefono_celular ?? '' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Número de Hijos</td>
                    <td class="field-value">{{ $persona->num_hijos ?? '0' }}</td>
                    <td class="field-label">Estado Civil</td>
                    <td class="field-value">{{ $persona->estado_civil ?? 'SOLTERA/O' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Restricción alimentaria</td>
                    <td class="field-value" colspan="3">{{ $persona->informacionMedica->restriccion_alimentaria_detalle ?? 'NINGUNA' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Dirección de domicilio</td>
                    <td class="field-value" colspan="3">{{ $persona->direccionDomicilio->direccion_completa }}</td>
                </tr>

                <tr>
                    <td class="field-label">Fecha de Nacimiento</td>
                    <td class="field-value" colspan="3">{{ $persona->fecha_nacimiento->format('Y-m-d') }}</td>
                </tr>

                <tr class="birth-place-row">
                    <td class="field-label">Lugar de Nacimiento</td>
                    <td class="field-label">País</td>
                    <td class="field-value">{{ $persona->informacionNacimiento->pais_nacimiento ?? '' }}</td>
                    <td class="field-label">Provincia</td>
                    <td class="field-value">{{ $persona->informacionNacimiento->provincia_nacimiento ?? '' }}</td>
                    <td class="field-label">Cantón</td>
                    <td class="field-value">{{ $persona->informacionNacimiento->canton_nacimiento ?? '' }}</td>
                </tr>

                <tr class="health-row">
                    <td class="field-label">Posee alguna discapacidad</td>
                    <td class="field-value">{{ $persona->informacionMedica->posee_discapacidad ? 'SÍ' : 'NO' }}</td>
                    <td class="field-label">Especifique:</td>
                    <td class="field-value" colspan="5">{{ $persona->informacionMedica->discapacidad_detalle ?? '' }}</td>
                </tr>

                <tr class="health-row">
                    <td class="field-label">Posee alguna alergia</td>
                    <td class="field-value">{{ $persona->informacionMedica->posee_alergia ? 'SÍ' : 'NO' }}</td>
                    <td class="field-label">Especifique:</td>
                    <td class="field-value" colspan="5">{{ $persona->informacionMedica->alergia_detalle ?? '' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Tipo de Sangre</td>
                    <td class="field-value">{{ $persona->informacionMedica->tipo_sangre ?? '' }}</td>
                    <td class="field-label">Mail</td>
                    <td class="field-value" colspan="5">{{ $persona->correo }}</td>
                </tr>

                <tr>
                    <td class="field-label">Nombre de contacto en caso de emergencia</td>
                    <td class="field-value" colspan="2">{{ $persona->contactoEmergencia->nombre ?? '' }}</td>
                    <td class="field-label">Parentesco</td>
                    <td class="field-value" colspan="3">{{ $persona->contactoEmergencia->parentesco ?? '' }}</td>
                </tr>

                <tr>
                    <td class="field-label">Teléfono Convencional</td>
                    <td class="field-value">{{ $persona->contactoEmergencia->telefono_convencional ?? '' }}</td>
                    <td class="field-label">Celular</td>
                    <td class="field-value" colspan="4">{{ $persona->contactoEmergencia->telefono_celular ?? '' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Formación Académica -->
        <div class="work-section">
            <table class="education-table">
                <thead>
                    <tr>
                        <th class="education-header" colspan="2" style="text-align: center;">FORMACIÓN ACADÉMICA</th>
                    </tr>
                    <tr>
                        <th class="education-header" style="width: 25%;">Instrucción</th>
                        <th class="education-header" style="width: 25%;">Título Obtenido</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="education-cell">Bachiller</td>
                        <td class="education-cell">{{ $persona->formacion->titulo_obtenido ?? '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- Información Laboral -->
@if($proyectoActual)
    <div class="work-section">
        <table class="work-table">
            <thead>
                <tr>
                    <th colspan="4" class="education-header">PROYECTO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="field-label" style="width: 20%;">Fecha de Ingreso al ACF</td>
                    <td class="field-value" style="width: 30%;">{{ $proyectoActual->fecha_ingreso ?? '' }}</td>
                    <td class="field-label" style="width: 15%;">Cargo</td>
                    <td class="field-value" style="width: 35%;">{{ $proyectoActual->cargo ?? '' }}</td>
                </tr>
                <tr>
                    <td class="field-label">Tiempo dedicación</td>
                    <td class="field-value" colspan="3">{{ $proyectoActual->tiempo_dedicacion ?? '' }}</td>
                </tr>
                <tr>
                    <td class="field-label">Proyecto</td>
                    <td class="field-value">{{ $proyectoActual->proyecto->nombre_proyecto ?? '' }}</td>
                    <td class="field-label">Lugar</td>
                    <td class="field-value">{{ $proyectoActual->sucursal ?? '' }}</td>
                </tr>
                <tr>
                    <td class="field-label">Lugar donde Sufraga</td>
                    <td class="field-value" colspan="3">{{ $proyectoActual->lugar_sufragio ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endif

    <!-- Información Bancaria -->
    <table class="section-table">
        <thead>
            <tr>
                <th colspan="4" class="banking-header">INFORMACIÓN DE LA ENTIDAD BANCARIA DONDE MANTIENE UNA CUENTA ACTIVA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="field-label" style="width: 25%;">Institución Bancaria</td>
                <td class="field-value" style="width: 25%;">{{ $persona->cuentaBancaria->banco ?? '' }}</td>
                <td class="field-label" style="width: 25%;">Tipo de Cuenta</td>
                <td class="field-value" style="width: 25%;">{{ $persona->cuentaBancaria->tipo_cuenta ?? '' }}</td>
            </tr>
            <tr>
                <td class="field-label">Numero de Cuenta</td>
                <td class="field-value" colspan="3">{{ $persona->cuentaBancaria->numero_cuenta ?? '' }}</td>
            </tr>
        </tbody>
    </table>
    </div>

</body>

</html>