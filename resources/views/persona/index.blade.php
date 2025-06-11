@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Personas</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('persona.create') }}" class="btn btn-primary">Crear Nueva Persona</a>
        <a href="{{ route('persona.pdf') }}" class="btn btn-danger" target="_blank">Descargar PDF General</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Foto</th>
                <th>ID</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Formación</th>
                <th>Proyecto Actual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($personas as $persona)
            <tr>
                <td class="text-center">
                    @if ($persona->foto_url)
                        <img src="{{ $persona->foto_url }}" alt="Foto de {{ $persona->nombres }}" width="50" height="50" class="rounded-circle" style="object-fit: cover;">
                    @else
                        <span class="text-muted">Sin foto</span>
                    @endif
                </td>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->nombres }}</td>
                <td>{{ $persona->correo }}</td>
                <td>{{ $persona->formacion->titulo ?? 'Sin formación' }}</td>
                <td>{{ $persona->proyecto_actual->proyecto->nombre_proyecto ?? 'Sin proyecto' }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('persona.show', $persona->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('persona.edit', $persona->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        {{-- Eliminar activado, con confirmación --}}
                        <form action="{{ route('persona.destroy', $persona->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta persona?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No hay personas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $personas->links() }}
    </div>
</div>
@endsection
