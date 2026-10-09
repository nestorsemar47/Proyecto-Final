@extends('layouts.main')

@section('titulo', $propiedad->titulo)

@section('content')
<div class="max-w-4xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg">
    <a href="{{ route('home') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Volver al inicio</a>
    @if (session('exito'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
        <p class="font-bold">¡Operación Exitosa!</p>
        <p>{{ session('exito') }}</p>
    </div>
    @endif
    
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

    <div class="mt-8 bg-gray-50 p-6 rounded-lg border">
    <h3 class="text-2xl font-bold mb-4 text-gray-800">Reservar esta propiedad</h3>

    <!-- El formulario enviará los datos mediante método POST -->
    <form action="{{ route('reservas.store') }}" method="POST" class="space-y-4">
        <!-- @csrf: Directiva de seguridad OBLIGATORIA en Laravel para prevenir ataques CSRF -->
        @csrf

        <!-- Campo oculto para saber qué propiedad se está reservando -->
        <input type="hidden" name="propiedad_id" value="{{ $propiedad->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
                <input type="text" name="nombre_cliente" required class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email_cliente" required class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha de llegada</label>
                <input type="date" name="fecha_inicio" required class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha de salida</label>
                <input type="date" name="fecha_fin" required class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Cantidad de huéspedes</label>
                <input type="number" name="huespedes" min="1" max="{{ $propiedad->habitaciones * 2 }}" value="1" required class="w-full mt-1 p-2 border rounded-md">
            </div>
        </div>

        <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-700 shadow-md transition duration-200">
            Confirmar y Pagar
        </button>
    </form>
    </div>
</div>
@endsection