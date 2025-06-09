<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Mi Aplicación')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">Mi Aplicación</a>
            <nav>
                <a href="{{ route('persona.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Personas</a>
            </nav>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow p-4 mt-8 text-center text-gray-600">
        &copy; {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.
    </footer>

</body>
</html>
