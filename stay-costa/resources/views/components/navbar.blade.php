<header class="bg-[#1A365D] text-white shadow-xl sticky top-0 z-50 border-b border-[#4A90E2]/20">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap justify-between items-center gap-4">
        
        <!-- Logo / Identidad de Marca -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
            <div class="relative overflow-hidden rounded-full w-11 h-11 border-2 border-[#4A90E2] shadow-md transition transform duration-200 group-hover:scale-[1.2] bg-white flex items-center justify-center">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Stay Costa" class="w-full h-full object-cover scale-110">
            </div>
            <span class="font-brand text-3xl tracking-wider text-white transition duration-200 group-hover:text-[#4A90E2]">
                STAY COSTA
            </span>
        </a>

        <!-- Enlaces Principales -->
        <div class="flex items-center space-x-1 sm:space-x-4 text-sm font-medium">
            <a href="{{ route('home') }}" class="inline-block px-3 py-2 rounded-md text-gray-200 hover:text-white hover:bg-white/10 transition transform duration-200 hover:scale-[1.2]">
                Inicio
            </a>
            <a href="/propiedades" class="inline-block px-3 py-2 rounded-md text-gray-200 hover:text-white hover:bg-white/10 transition transform duration-200 hover:scale-[1.2]">
                Propiedades
            </a>
            <a href="/nosotros" class="inline-block px-3 py-2 rounded-md text-gray-200 hover:text-white hover:bg-white/10 transition transform duration-200 hover:scale-[1.2]">
                Nosotros
            </a>
            <a href="/contacto" class="inline-block px-3 py-2 rounded-md text-gray-200 hover:text-white hover:bg-white/10 transition transform duration-200 hover:scale-[1.2]">
                Contacto
            </a>
        </div>

        <!-- Estado de Autenticación -->
        <div class="flex items-center space-x-3 text-sm">
            @guest
                <a href="{{ route('login') }}" class="inline-block text-gray-200 hover:text-white font-medium px-3 py-2 transition transform duration-200 hover:scale-[1.2]">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="inline-block bg-[#4A90E2] hover:bg-[#3b7ac8] text-white font-bold px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition transform duration-200 hover:scale-[1.2]">
                    Registrarse
                </a>
            @endguest

            @auth
                @if (Auth::user()->rol === 'administrador')
                    <a href="{{ route('admin.propiedades.index') }}" class="inline-flex items-center gap-1.5 bg-[#4A90E2]/20 border border-[#4A90E2] text-[#4A90E2] hover:bg-[#4A90E2] hover:text-white font-bold px-3.5 py-1.5 rounded-lg transition transform duration-200 hover:scale-[1.2] animate-glow">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Panel Admin
                    </a>
                @else
                    <a href="{{ route('reservas.mis_reservas') }}" class="inline-block text-gray-200 hover:text-white font-medium px-3 py-2 transition transform duration-200 hover:scale-[1.2]">
                        Mis Reservas
                    </a>
                @endif

                <div class="h-5 w-px bg-gray-600/50 my-auto"></div>

                <div class="flex items-center space-x-2 bg-white/10 px-3 py-1.5 rounded-full border border-white/10">
                    <span class="w-2 h-2 rounded-full {{ Auth::user()->rol === 'admin' ? 'bg-amber-400' : 'bg-green-400' }}"></span>
                    <span class="text-xs text-gray-200">
                        <strong>{{ Auth::user()->name }}</strong>
                    </span>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="inline-block text-red-300 hover:text-red-100 font-medium text-xs px-2 py-1 rounded transition transform duration-200 hover:scale-[1.2] hover:bg-red-500/20">
                        Salir
                    </button>
                </form>
            @endauth
        </div>

    </nav>
</header>