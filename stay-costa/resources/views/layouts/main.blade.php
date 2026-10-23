<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stay Costa - @yield('title', 'Reserva de Propiedades')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-brand { font-family: 'Bebas Neue', cursive; letter-spacing: 1px; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 10px rgba(74, 144, 226, 0.2); } 50% { box-shadow: 0 0 20px rgba(74, 144, 226, 0.5); } }
        .animate-fade-in { animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-glow { animation: pulseGlow 3s infinite; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen antialiased">
    
    <!-- Componente Navbar -->
    <x-navbar />

    <!-- Alertas Globales -->
    <div class="max-w-7xl mx-auto px-6 pt-4 w-full">
        @if (session('exito'))
            <div class="animate-fade-in bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-lg shadow-sm">
                {{ session('exito') }}
            </div>
        @endif
        @if (session('error'))
            <div class="animate-fade-in bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-lg shadow-sm">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Contenido Dinámico -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 py-8 w-full animate-fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1A365D] text-gray-300 py-8 border-t border-gray-700/50 mt-auto text-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <span class="font-brand text-xl text-white tracking-wider">STAY COSTA</span>
                <p class="text-xs text-gray-400 mt-0.5">Tu refugio frente al mar. El Salvador.</p>
            </div>
            <p class="text-xs text-gray-400 text-center md:text-right">&copy; {{ date('Y') }} Stay Costa.</p>
        </div>
    </footer>

</body>
</html>