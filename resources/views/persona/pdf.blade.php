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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1>Listado de Personas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Formación</th>
                <th>Proyecto Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mostrard as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->email }}</td>
                    <td>
                        @foreach ($persona->formacion as $formacion)
                            {{ $formacion->titulo }}<br>
                        @endforeach
                    </td>
                    <td>
                        @php
                            $proyecto = $persona->proyectos_persona->whereNull('fecha_salida')->first();
                        @endphp
                        {{ $proyecto ? $proyecto->proyecto->nombre : 'Sin proyecto' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
