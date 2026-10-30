@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="max-w-md mx-auto my-8 sm:my-12">
    
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sm:p-8">
        
        <!-- Encabezado del Formulario -->
        <div class="text-center mb-6">
            <div class="w-12 h-12 rounded-full bg-[#1A365D] text-white flex items-center justify-center mx-auto mb-3 shadow-md">
                <svg class="w-6 h-6 text-[#4A90E2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Iniciar Sesión en Stay Costa</h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Ingresa tus credenciales para acceder a tu cuenta</p>
        </div>

        <!-- Alerta de Error de Sesión Local -->
        @if (session('error'))
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-3.5 mb-5 rounded-r-xl shadow-sm text-xs sm:text-sm font-medium flex items-center gap-2">
                <svg class="w-4 h-4 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Correo Electrónico -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="correo@ejemplo.com"
                    class="w-full p-3 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
                >
                @error('email')
                    <p class="text-rose-500 text-xs mt-1 font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Contraseña -->
            <x-password-input name="password" label="Contraseña" />

            <!-- Botón de Envío -->
            <button 
                type="submit" 
                class="w-full bg-[#4A90E2] hover:bg-[#3b7ac8] text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition transform duration-200 hover:scale-[1.01] flex items-center justify-center gap-2 mt-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                Ingresar
            </button>

            <!-- Redirección a Registro -->
            <div class="text-center text-sm text-gray-600 pt-4 border-t border-gray-100 mt-6">
                ¿No tienes una cuenta? 
                <a href="{{ route('register') }}" class="text-[#4A90E2] hover:text-[#1A365D] font-bold hover:underline transition">
                    Regístrate aquí
                </a>
            </div>
        </form>

    </div>

</div>
@endsection