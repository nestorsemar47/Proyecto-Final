@extends('layouts.main')

@section('title', 'Crear Cuenta')

@section('content')
<div class="max-w-md mx-auto my-12 p-6 bg-white rounded-lg shadow-md border">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Crea tu cuenta en Stay Costa</h2>

    <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full mt-1 p-2 border rounded-md">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 p-2 border rounded-md">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" required class="w-full mt-1 p-2 border rounded-md">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" required class="w-full mt-1 p-2 border rounded-md">
        </div>

        <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 rounded-md hover:bg-green-700 transition duration-200">
            Registrarme
        </button>

        <p class="text-center text-sm text-gray-600 mt-4">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
        </p>
    </form>
</div>
@endsection