@extends('layouts.main')

@section('title', 'Registrar Nueva Propiedad')

@section('content')
<div class="max-w-2xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg border">
    
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800">Registrar Nueva Propiedad</h1>
        <a href="{{ route('admin.propiedades.index') }}" class="text-gray-600 hover:underline text-sm">
            ← Volver al Panel
        </a>
    </div>

    <form action="{{ route('admin.propiedades.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Título de la Propiedad</label>
            <input type="text" name="titulo" value="{{ old('titulo') }}" required class="w-full mt-1 p-2 border rounded-md">
            @error('titulo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Ubicación</label>
                <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" required class="w-full mt-1 p-2 border rounded-md">
                @error('ubicacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Precio por Noche (USD)</label>
                <input type="number" step="0.01" name="precio_noche" value="{{ old('precio_noche') }}" required class="w-full mt-1 p-2 border rounded-md">
                @error('precio_noche')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Número de Habitaciones</label>
                <input type="number" name="habitaciones" value="{{ old('habitaciones') }}" required class="w-full mt-1 p-2 border rounded-md">
                @error('habitaciones')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">URL de la Imagen</label>
                <input type="url" name="imagen_url" value="{{ old('imagen_url') }}" placeholder="https://ejemplo.com/imagen.jpg" required class="w-full mt-1 p-2 border rounded-md">
                @error('imagen_url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" rows="4" required class="w-full mt-1 p-2 border rounded-md">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Publicar Propiedad
        </button>
    </form>

</div>
@endsection