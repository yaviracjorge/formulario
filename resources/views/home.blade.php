<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="max-w-4xl mx-auto px-4">
        <h1>
            "Bienvenido a la página de inicio donde inicia la magia de Laravel"
        </h1>
         <x-alert>
            contenido de la alerta
         </x-alert>
    </div>
    <div>
        <a href="/curso/create">
            <button>Crear</button>
        </a>
    </div>
    <table class="min-w-full bg-white border border-gray-300">
    <thead class="bg-gray-100 text-gray-700">
        <tr>
        <th class="py-2 px-4 border-b">Nombre</th>
        <th class="py-2 px-4 border-b">Descripción</th>
        <th class="py-2 px-4 border-b">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
        <tr>
            <td class="py-2 px-4 border-b">{{ $dato->name }}</td>
            <td class="py-2 px-4 border-b">{{ $dato->descripcion }}</td>
            <td class="py-2 px-4 border-b">
            <div class="flex gap-2">
                <a href="/curso/ {{$dato->id}}">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                Mostrar
                </button>
                </a>
                <a href="/curso/{{$dato->id}}/edit">
                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                Editar
                </button>
                </a>
            </div>
            </td>
        </tr>

        @endforeach
    </tbody>
    </table>   
</body>
</html>