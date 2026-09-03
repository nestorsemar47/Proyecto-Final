@extends('layouts.main')

@section('title', 'Inicio - Stay Costa')

@section('content')

    <!-- Inyectamos el Banner Hero -->
    @include('components.hero')

    <!-- Secciones de Propiedades -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Propiedades Destacadas</h2>

    <!-- Reutilizamos la tarjeta en una cuadrícula (Grid) de 3 columnas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @include('components.propertyCard')
        @include('components.propertyCard')
        @include('components.propertyCard')
    </div>

@endsection