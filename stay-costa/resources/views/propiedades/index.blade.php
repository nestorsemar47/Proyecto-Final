@extends('layouts.main')

@section('title', 'Catálogo de Propiedades')

@section('content')
    <!-- Componente Reutilizable del Buscador en Tiempo Real -->
    <x-hero-search />

    <!-- Encabezado del Catálogo -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Catálogo Completo de Propiedades</h2>
    </div>

    <!-- Grid de Propiedades con el id "contenedorPropiedades" para la búsqueda AJAX -->
    <div id="contenedorPropiedades" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($propiedades as $propiedad)
            <x-property-card :propiedad="$propiedad" />
        @empty
            <div class="col-span-full bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-xl text-center">
                No hay propiedades registradas en este momento.
            </div>
        @endforelse
    </div>
@endsection