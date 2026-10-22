@extends('layouts.main')

@section('title', 'Panel de Administración - Propiedades')

@section('content')
<div class="max-w-6xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg border">
    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Propiedades</h1>
        
        <a href="{{ route('admin.propiedades.create') }}" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
            + Nueva Propiedad
        </a>
    </div>

    {{-- Alerta Flotante de Éxito --}}
    @if (session('exito'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded text-sm">
            {{ session('exito') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b text-gray-700 uppercase text-xs">
                    <th class="p-3">ID</th>
                    <th class="p-3">Imagen</th>
                    <th class="p-3">Título</th>
                    <th class="p-3">Ubicación</th>
                    <th class="p-3">Precio / Noche</th>
                    <th class="p-3">Habitaciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propiedades as $propiedad)
                    <tr class="border-b hover:bg-gray-50 text-sm">
                        <td class="p-3 font-bold text-gray-600">#{{ $propiedad->id }}</td>
                        <td class="p-3">
                            <img src="{{ $propiedad->imagen_url }}" alt="{{ $propiedad->titulo }}" class="w-16 h-12 object-cover rounded">
                        </td>
                        <td class="p-3 font-semibold text-gray-800">{{ $propiedad->titulo }}</td>
                        <td class="p-3 text-gray-600">{{ $propiedad->ubicacion }}</td>
                        <td class="p-3 text-green-600 font-bold">${{ $propiedad->precio_noche }} USD</td>
                        <td class="p-3 text-gray-600">{{ $propiedad->habitaciones }} hab.</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-6 text-gray-500">
                            No hay propiedades registradas en la plataforma.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection