<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stay Costa - @yield('title', 'Reserva de Propiedades')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <header>
        <div>
            <h1>

            </h1>
            <nav>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
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