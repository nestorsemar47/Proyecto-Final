@extends('layouts.main')

@section('title', 'Sobre Nosotros')

@section('content')
<div class="max-w-6xl mx-auto my-8 space-y-8">

    <!-- Hero Banner Sobre Nosotros -->
    <div class="bg-[#1A365D] text-white rounded-2xl p-8 sm:p-12 shadow-lg text-center relative overflow-hidden">
        <div class="relative z-10 max-w-3xl mx-auto space-y-4">
            <span class="inline-block bg-[#4A90E2]/20 border border-[#4A90E2] text-[#4A90E2] font-semibold text-xs px-3.5 py-1.5 rounded-full uppercase tracking-wider">
                Tu refugio frente al mar
            </span>
            <h1 class="text-3xl sm:text-5xl font-bold tracking-tight">Conoce la experiencia Stay Costa</h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                Somos la plataforma salvadoreña dedicada a conectar a viajeros con los mejores ranchos, villas y casas de playa de El Salvador. Transparencia, confort y seguridad en cada reserva.
            </p>
        </div>
        <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-[#4A90E2]/10 rounded-full blur-2xl pointer-events-none"></div>
    </div>

    <!-- Misión y Visión -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Misión -->
        <div class="bg-white rounded-2xl p-8 shadow-md border border-gray-100 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Nuestra Misión</h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Facilitar la conexión entre viajeros y propietarios de alojamientos vacacionales en El Salvador a través de una plataforma digital práctica y accesible, que simplifique la búsqueda de espacios para disfrutar nuevas experiencias.
                </p>
            </div>
        </div>

        <!-- Visión -->
        <div class="bg-white rounded-2xl p-8 shadow-md border border-gray-100 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Nuestra Visión</h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Convertirnos en una plataforma referente en El Salvador para descubrir alojamientos vacacionales, impulsando el turismo local y creando nuevas oportunidades para quienes ofrecen espacios de hospedaje.
                </p>
            </div>
        </div>
    </div>

    <!-- Ubicación, Contacto y Redes Sociales -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Datos de Contacto -->
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 space-y-4">
            <h3 class="text-xl font-bold text-gray-800 border-b pb-3">Atención al Cliente</h3>
            
            <div class="flex items-start gap-3 text-sm">
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-[#4A90E2] shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h32a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm0 6a2 2 0 012-2h32a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2zm0 6a2 2 0 012-2h32a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2z"></path></svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Teléfono / WhatsApp</p>
                    <p class="text-gray-500">+503 7240-8912</p>
                </div>
            </div>

            <div class="flex items-start gap-3 text-sm">
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-[#4A90E2] shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Correo Electrónico</p>
                    <p class="text-gray-500">contacto@staycosta.com</p>
                </div>
            </div>

            <div class="flex items-start gap-3 text-sm">
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-[#4A90E2] shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Horario de Atención</p>
                    <p class="text-gray-500">Lunes a Domingo: 8:00 AM - 8:00 PM</p>
                </div>
            </div>
        </div>

        <!-- Oficina Principal -->
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 space-y-4">
            <h3 class="text-xl font-bold text-gray-800 border-b pb-3">Oficina Central</h3>
            
            <div class="flex items-start gap-3 text-sm">
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-[#4A90E2] shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Ubicación</p>
                    <p class="text-gray-500">Edificio Millennium Plaza, Nivel 5<br>Paseo General Escalón, San Salvador, El Salvador.</p>
                </div>
            </div>

            <div class="pt-2">
                <span class="inline-block bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1 rounded-full">
                    Atención presencial previa cita
                </span>
            </div>
        </div>

        <!-- Redes Sociales -->
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 flex flex-col justify-between space-y-4">
            <div>
                <h3 class="text-xl font-bold text-gray-800 border-b pb-3">Síguenos en Redes</h3>
                <p class="text-gray-500 text-sm mt-3 mb-4">Descubre nuevos alojamientos, promociones exclusivas y experiencias en la costa.</p>
            </div>

            <div class="space-y-3">
                <a href="https://instagram.com" target="_blank" class="flex items-center justify-between p-3 rounded-xl bg-gray-50 hover:bg-pink-50 border border-gray-100 transition duration-200 group">
                    <span class="font-semibold text-sm text-gray-700 group-hover:text-[#F527DA]">Instagram</span>
                    <span class="text-xs text-gray-400 group-hover:text-[#F527DA]">@staycosta.sv &rarr;</span>
                </a>

                <a href="https://facebook.com" target="_blank" class="flex items-center justify-between p-3 rounded-xl bg-gray-50 hover:bg-blue-50 border border-gray-100 transition duration-200 group">
                    <span class="font-semibold text-sm text-gray-700 group-hover:text-[#4A90E2]">Facebook</span>
                    <span class="text-xs text-gray-400 group-hover:text-[#4A90E2]">/staycostasv &rarr;</span>
                </a>

                <a href="https://wa.me/50372408912" target="_blank" class="flex items-center justify-between p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-100 transition duration-200 group">
                    <span class="font-semibold text-sm text-emerald-800">WhatsApp Oficial</span>
                    <span class="text-xs text-emerald-600 font-bold">Escribir ahora &rarr;</span>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection