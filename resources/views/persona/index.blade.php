@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Personas</h1>

    <a href="{{ route('persona.create') }}" class="btn btn-primary mb-3">Crear Nueva Persona</a>
    <a href="{{ route('persona.pdf') }}" class="btn btn-danger mb-3" target="_blank">Descargar PDF</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Formación</th>
                <th>Proyecto Actual</th>
                <th>Acciones</th>
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
                        {{ $formacion->titulo }} <br>
                    @endforeach
                </td>
                <td>
                    @if ($persona->proyectos_persona->count())
                        {{ $persona->proyectos_persona->first()->proyecto->nombre ?? 'N/A' }}
                    @else
                        Sin proyecto
                    @endif
                </td>
                <td>
                    <a href="{{ route('persona.show', $persona->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('persona.edit', $persona->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <!-- Aquí puedes agregar botón para eliminar si tienes -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
