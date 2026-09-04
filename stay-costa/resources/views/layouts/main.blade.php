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
    
    <!-- Se eliminó min-h-screen y flex-col del header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide text-gray-800">Stay Costa</h1>
            
            <!-- Se agregó space-x-6 para separar los enlaces y text-base para una tipografía adecuada -->
            <nav class="text-base font-semibold space-x-6 text-gray-600">
                <a href="/" class="hover:text-gray-900 hover:underline">Inicio</a>
                <a href="#" class="hover:text-gray-900 hover:underline">Propiedades</a>
                <a href="/nosotros" class="hover:text-gray-900 hover:underline">Nosotros</a>
                <a href="contacto" class="hover:text-gray-900 hover:underline">Contacto</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-4 py-8 w-full">
        @yield('content')
    </main>

    <!-- Footer Global -->
    <footer class="bg-gray-800 text-white py-6 text-center text-sm">
        <p>&copy; {{ date('Y') }} Stay Costa. Todos los derechos reservados.</p>
    </footer>
</body>
</html>