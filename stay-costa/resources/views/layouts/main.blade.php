<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stay Costa - @yield('title', 'Reserva de Propiedades')</title>
    <!-- CDN de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    
    <header class="bg-white shadow-md">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo / Marca -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Stay Costa</a>

            <!-- Enlaces Principales de Navegación -->
            <div class="space-x-6 flex items-center">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Inicio</a>
                <a href="/propiedades" class="text-gray-700 hover:text-blue-600 font-medium">Propiedades</a>
                <a href="/nosotros" class="text-gray-700 hover:text-blue-600 font-medium">Nosotros</a>
                <a href="/contacto" class="text-gray-700 hover:text-blue-600 font-medium">Contacto</a>

                {{-- Opciones según estado de Autenticación --}}
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 font-medium transition duration-200">Registrarse</a>
                @endguest

                @auth
                    @if (Auth::user()->rol === 'administrador')
                        <a href="{{ route('admin.propiedades.index') }}" class="text-blue-600 font-bold hover:underline">
                            Panel Admin
                        </a>
                    @endif

                    <a href="{{ route('reservas.mis_reservas') }}" class="text-gray-700 hover:text-blue-600 font-medium">Mis Reservas</a>
                    
                    <span class="text-gray-600 text-sm">Hola, <strong>{{ Auth::user()->name }}</strong></span>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline text-sm ml-2 font-medium">
                            Cerrar Sesión
                        </button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-4 py-8 w-full">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 text-center text-sm">
        <p>&copy; {{ date('Y') }} Stay Costa. Todos los derechos reservados.</p>
    </footer>

</body>
</html>