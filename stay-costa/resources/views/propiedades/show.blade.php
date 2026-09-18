@extends('layouts.main')

@section('titulo', $propiedad->titulo)

@section('content')
<div class="max-w-4xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg">
    <a href="{{ route('home') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Volver al inicio</a>
    
    <img src="{{ $propiedad->imagen_url }}" alt="{{ $propiedad->titulo }}" class="w-full h-80 object-cover rounded-md mb-6">
    
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold text-gray-800">{{ $propiedad->titulo }}</h1>
        <span class="text-2xl font-bold text-green-600">${{ $propiedad->precio_noche }} <span class="text-sm text-gray-500">/ noche</span></span>
    </div>

    <p class="text-gray-600 mb-4 font-semibold">{{ $propiedad->ubicacion }} • {{ $propiedad->habitaciones }} Habitaciones</p>
    
    <div class="border-t border-b py-4 my-4">
        <h2 class="text-xl font-bold mb-2 text-gray-700">Descripción</h2>
        <p class="text-gray-600 leading-relaxed">{{ $propiedad->descripcion }}</p>
    </div>

    <!-- Botón simulación para el siguiente paso: Reservas -->
    <div class="mt-6 text-right">
        <button class="bg-green-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-700 shadow-md">
            Reservar esta propiedad
        </button>
    </div>
</div>
@endsection