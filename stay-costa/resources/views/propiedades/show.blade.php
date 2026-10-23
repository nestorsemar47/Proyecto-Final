@extends('layouts.main')

@section('title', $propiedad->titulo)

@section('content')
<div class="max-w-4xl mx-auto my-6 space-y-6">
    
    <!-- Botón Volver al Catálogo -->
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#4A90E2] hover:text-[#1A365D] transition duration-200 transform hover:-translate-x-1">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Volver al inicio
    </a>

    <!-- Card Principal de la Propiedad -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        
        <!-- Imagen Principal con Badge de Precio -->
        <div class="relative w-full h-80 sm:h-96">
            <img src="{{ $propiedad->imagen_url }}" alt="{{ $propiedad->titulo }}" class="w-full h-full object-cover">
            <div class="absolute top-4 right-4 bg-[#1A365D]/90 backdrop-blur-md text-white px-4 py-2 rounded-xl shadow-lg font-bold text-xl">
                ${{ $propiedad->precio_noche }} <span class="text-xs font-normal text-gray-300">/ noche</span>
            </div>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            
            <!-- Título e Insignias de Ubicación y Habitaciones -->
            <div>
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">{{ $propiedad->titulo }}</h1>
                
                <div class="flex flex-wrap items-center gap-3 text-sm font-medium">
                    <!-- Ubicación -->
                    <div class="flex items-center gap-1.5 bg-blue-50 text-[#1A365D] px-3.5 py-1.5 rounded-lg border border-blue-100">
                        <svg class="w-4 h-4 text-[#4A90E2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $propiedad->ubicacion }}
                    </div>

                    <!-- Habitaciones -->
                    <div class="flex items-center gap-1.5 bg-blue-50 text-[#1A365D] px-3.5 py-1.5 rounded-lg border border-blue-100">
                        <svg class="w-4 h-4 text-[#4A90E2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        {{ $propiedad->habitaciones }} {{ $propiedad->habitaciones == 1 ? 'Habitación' : 'Habitaciones' }}
                    </div>
                </div>
            </div>

            <!-- Descripción de la Propiedad -->
            <div class="border-t border-gray-100 pt-6">
                <h2 class="text-xl font-bold text-gray-800 mb-3">Descripción de la propiedad</h2>
                <p class="text-gray-600 leading-relaxed text-base">{{ $propiedad->descripcion }}</p>
            </div>

        </div>
    </div>

    <!-- Card del Formulario de Reserva -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sm:p-8">
        
        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
            <div class="w-10 h-10 rounded-full bg-[#1A365D] text-white flex items-center justify-center font-bold">
                <svg class="w-5 h-5 text-[#4A90E2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">Reservar esta propiedad</h3>
                <p class="text-xs sm:text-sm text-gray-500">Selecciona tus fechas y completa tus datos de contacto</p>
            </div>
        </div>

        <form action="{{ route('reservas.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Campo Oculto con el ID de la propiedad -->
            <input type="hidden" name="propiedad_id" value="{{ $propiedad->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo</label>
                    <input 
                        type="text" 
                        name="nombre_cliente" 
                        value="{{ old('nombre_cliente', Auth::check() ? Auth::user()->name : '') }}" 
                        required 
                        class="w-full p-3 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
                        placeholder="Ej. Juan Pérez"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico</label>
                    <input 
                        type="email" 
                        name="email_cliente" 
                        value="{{ old('email_cliente', Auth::check() ? Auth::user()->email : '') }}" 
                        required 
                        class="w-full p-3 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
                        placeholder="correo@ejemplo.com"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Fecha de llegada</label>
                    <input 
                        type="date" 
                        name="fecha_inicio" 
                        required 
                        class="w-full p-3 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Fecha de salida</label>
                    <input 
                        type="date" 
                        name="fecha_fin" 
                        required 
                        class="w-full p-3 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
                    >
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cantidad de huéspedes</label>
                    <input 
                        type="number" 
                        name="huespedes" 
                        min="1" 
                        max="{{ $propiedad->habitaciones * 2 }}" 
                        value="1" 
                        required 
                        class="w-full p-3 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
                    >
                    <p class="text-xs text-gray-400 mt-1">Capacidad orientativa: hasta {{ $propiedad->habitaciones * 2 }} personas.</p>
                </div>
            </div>

            <button 
                type="submit" 
                class="w-full bg-[#4A90E2] hover:bg-[#3b7ac8] text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition transform duration-200 hover:scale-[1.01] flex items-center justify-center gap-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Confirmar y Reservar
            </button>
        </form>

    </div>

</div>
@endsection