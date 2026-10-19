@extends('layouts.main')

@section('titulo','Iniciar Sesion')

@section('name')
    <div class="max-w-md mx-auto my-12 p-6 bg-white rounded-lg shadow-md border">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Iniciar Sesión en Stay Costa</h2>

    <!-- Si intentó reservar sin haber iniciado sesión, mostramos esta alerta de error -->
    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded text-sm">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 p-2 border rounded-md">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" required class="w-full mt-1 p-2 border rounded-md">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Ingresar
        </button>
    </form>
    </div>
@endsection
    