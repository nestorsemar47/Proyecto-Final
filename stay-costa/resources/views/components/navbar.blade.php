@php
    $enlacesNav = [
        ['texto' => 'Inicio', 'url' => route('home'), 'activo' => request()->routeIs('home')],
        ['texto' => 'Propiedades', 'url' => route('propiedades.index'), 'activo' => request()->routeIs('propiedades.*')],
        ['texto' => 'Nosotros', 'url' => url('/nosotros'), 'activo' => request()->is('nosotros')],
        ['texto' => 'Contacto', 'url' => url('/contacto'), 'activo' => request()->is('contacto')],
    ];
@endphp

<header class="bg-[#1A365D] text-white shadow-xl sticky top-0 z-50 border-b border-[#4A90E2]/20">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4">

        <div class="flex items-center justify-between gap-3">

            <!-- Logo / Identidad de Marca -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 min-w-0 group">
                <div class="relative shrink-0 overflow-hidden rounded-full w-10 h-10 sm:w-11 sm:h-11 border-2 border-[#4A90E2] shadow-md transition transform duration-200 group-hover:scale-105 bg-white flex items-center justify-center">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Stay Costa" class="w-full h-full object-cover scale-110">
                </div>
                <span class="font-brand text-2xl sm:text-3xl tracking-wider text-white transition duration-200 group-hover:text-[#4A90E2] truncate">
                    STAY COSTA
                </span>
            </a>

            <!-- Enlaces principales (escritorio) -->
            <div class="hidden lg:flex items-center gap-0.5 xl:gap-2 text-sm font-medium">
                @foreach ($enlacesNav as $enlace)
                    <a
                        href="{{ $enlace['url'] }}"
                        @if ($enlace['activo']) aria-current="page" @endif
                        class="inline-block px-2.5 xl:px-3 py-2 rounded-md transition duration-200 {{ $enlace['activo'] ? 'text-white bg-white/10' : 'text-gray-200 hover:text-white hover:bg-white/10' }}"
                    >
                        {{ $enlace['texto'] }}
                    </a>
                @endforeach
            </div>

            <!-- Sesión / acciones (escritorio) -->
            <div class="hidden lg:flex items-center gap-2 xl:gap-3 text-sm">
                @guest
                    <a href="{{ route('login') }}" class="inline-block text-gray-200 hover:text-white font-medium px-2.5 xl:px-3 py-2 rounded-md transition duration-200 hover:bg-white/10">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="inline-block bg-[#4A90E2] hover:bg-[#3b7ac8] text-white font-bold px-3 xl:px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition duration-200 hover:scale-105 whitespace-nowrap">
                        Registrarse
                    </a>
                @endguest

                @auth
                    @if (Auth::user()->rol === 'administrador')
                        <a href="{{ route('admin.propiedades.index') }}" class="inline-flex items-center gap-1.5 bg-[#4A90E2]/20 border border-[#4A90E2] text-[#4A90E2] hover:bg-[#4A90E2] hover:text-white font-bold px-3 py-1.5 rounded-lg transition duration-200 hover:scale-105 animate-glow whitespace-nowrap">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Panel Admin
                        </a>
                    @else
                        <a href="{{ route('reservas.mis_reservas') }}" class="inline-block text-gray-200 hover:text-white font-medium px-2.5 xl:px-3 py-2 rounded-md transition duration-200 hover:bg-white/10 whitespace-nowrap">
                            Mis Reservas
                        </a>
                    @endif

                    <div class="h-5 w-px bg-gray-600/50 my-auto"></div>

                    <div class="flex items-center gap-2 bg-white/10 px-2.5 xl:px-3 py-1.5 rounded-full border border-white/10 min-w-0">
                        <span class="w-2 h-2 shrink-0 rounded-full {{ Auth::user()->rol === 'administrador' ? 'bg-amber-400' : 'bg-green-400' }}"></span>
                        <span class="text-xs text-gray-200 truncate max-w-[90px] xl:max-w-[150px]" title="{{ Auth::user()->name }}">
                            <strong>{{ Auth::user()->name }}</strong>
                        </span>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="inline-block text-red-300 hover:text-red-100 font-medium text-xs px-2 py-1 rounded transition duration-200 hover:bg-red-500/20 whitespace-nowrap">
                            Salir
                        </button>
                    </form>
                @endauth
            </div>

            <!-- Botón menú móvil -->
            <button
                type="button"
                id="btnMenu"
                aria-controls="menuMovil"
                aria-expanded="false"
                aria-label="Abrir menú de navegación"
                class="lg:hidden inline-flex items-center justify-center w-10 h-10 shrink-0 rounded-lg text-gray-200 hover:text-white hover:bg-white/10 transition duration-200 focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
            >
                <svg id="iconoAbrir" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="iconoCerrar" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>

        <!-- Menú móvil -->
        <div id="menuMovil" class="lg:hidden hidden mt-3 pt-3 border-t border-white/10">
            <div class="max-h-[calc(100vh-6rem)] overflow-y-auto space-y-1">

                @foreach ($enlacesNav as $enlace)
                    <a
                        href="{{ $enlace['url'] }}"
                        @if ($enlace['activo']) aria-current="page" @endif
                        class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium transition duration-200 {{ $enlace['activo'] ? 'text-white bg-white/10' : 'text-gray-200 hover:text-white hover:bg-white/10' }}"
                    >
                        {{ $enlace['texto'] }}
                        @if ($enlace['activo'])
                            <span class="w-1.5 h-1.5 rounded-full bg-[#4A90E2]"></span>
                        @endif
                    </a>
                @endforeach

                <div class="border-t border-white/10 mt-3 pt-3 space-y-2">
                    @guest
                        <a href="{{ route('login') }}" class="block text-center text-gray-200 hover:text-white font-medium px-3 py-2.5 rounded-lg border border-white/15 hover:bg-white/10 transition duration-200">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="block text-center bg-[#4A90E2] hover:bg-[#3b7ac8] text-white font-bold px-3 py-2.5 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                            Registrarse
                        </a>
                    @endguest

                    @auth
                        @if (Auth::user()->rol === 'administrador')
                            <a href="{{ route('admin.propiedades.index') }}" class="flex items-center justify-center gap-2 bg-[#4A90E2]/20 border border-[#4A90E2] text-[#4A90E2] hover:bg-[#4A90E2] hover:text-white font-bold px-3 py-2.5 rounded-lg transition duration-200">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Panel Admin
                            </a>
                        @else
                            <a href="{{ route('reservas.mis_reservas') }}" class="block text-center text-gray-200 hover:text-white font-medium px-3 py-2.5 rounded-lg border border-white/15 hover:bg-white/10 transition duration-200">
                                Mis Reservas
                            </a>
                        @endif

                        <div class="flex items-center justify-between gap-2 bg-white/10 px-3 py-2 rounded-lg border border-white/10">
                            <div class="flex items-center gap-2 min-w-0">
                                <span class="w-2 h-2 shrink-0 rounded-full {{ Auth::user()->rol === 'administrador' ? 'bg-amber-400' : 'bg-green-400' }}"></span>
                                <span class="text-xs text-gray-200 truncate">
                                    <strong>{{ Auth::user()->name }}</strong>
                                </span>
                            </div>
                            <span class="text-[10px] uppercase tracking-wide text-gray-400 shrink-0">
                                {{ Auth::user()->rol === 'administrador' ? 'Admin' : 'Cliente' }}
                            </span>
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-center text-red-300 hover:text-red-100 font-medium text-sm px-3 py-2.5 rounded-lg bg-red-500/10 hover:bg-red-500/20 border border-red-400/20 transition duration-200">
                                Cerrar Sesión
                            </button>
                        </form>
                    @endauth
                </div>

            </div>
        </div>

    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnMenu = document.getElementById('btnMenu');
        const menuMovil = document.getElementById('menuMovil');
        const iconoAbrir = document.getElementById('iconoAbrir');
        const iconoCerrar = document.getElementById('iconoCerrar');

        if (!btnMenu || !menuMovil) {
            return;
        }

        // Abre/cierra el menú móvil y sincroniza iconos y accesibilidad.
        function alternarMenu(abrir) {
            menuMovil.classList.toggle('hidden', !abrir);
            btnMenu.setAttribute('aria-expanded', abrir ? 'true' : 'false');
            btnMenu.setAttribute('aria-label', abrir ? 'Cerrar menú de navegación' : 'Abrir menú de navegación');
            iconoAbrir?.classList.toggle('hidden', abrir);
            iconoCerrar?.classList.toggle('hidden', !abrir);
        }

        btnMenu.addEventListener('click', () => {
            alternarMenu(menuMovil.classList.contains('hidden'));
        });

        // Al navegar desde el menú, se cierra.
        menuMovil.querySelectorAll('a').forEach((enlace) => {
            enlace.addEventListener('click', () => alternarMenu(false));
        });

        // Escape cierra el menú.
        document.addEventListener('keydown', (evento) => {
            if (evento.key === 'Escape' && !menuMovil.classList.contains('hidden')) {
                alternarMenu(false);
                btnMenu.focus();
            }
        });

        // Si se agranda la ventana a escritorio, el menú móvil queda cerrado.
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && !menuMovil.classList.contains('hidden')) {
                alternarMenu(false);
            }
        });
    });
</script>
