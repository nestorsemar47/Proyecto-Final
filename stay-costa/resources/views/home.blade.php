@extends('layouts.main')

@section('title', 'Inicio')

@section('content')
    <!-- Componente de Banner e Interacción de Búsqueda -->
    <x-hero-search />

    <!-- Grid de Propiedades -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Propiedades Destacadas</h2>
    </div>

    <div id="contenedorPropiedades" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($propiedades as $propiedad)
            <x-property-card :propiedad="$propiedad" />
        @endforeach
    </div>
@endsection