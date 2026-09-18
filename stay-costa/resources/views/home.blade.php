@extends('layouts.main')

@section('title', 'Inicio - Stay Costa')

@section('content')

    <!-- Inyectamos el Banner Hero -->
    @include('components.hero')

    <!-- Secciones de Propiedades -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Propiedades Destacadas</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
    {{-- Inicia el bucle: Por cada registro en $propiedades, llámalo individualmente $propiedad --}}
    @foreach ($propiedades as $propiedad)

        <div class="border rounded-lg overflow-hidden shadow-lg bg-white">
            {{-- Usamos {{ }} de Blade para imprimir variables de PHP en el HTML --}}
            <img src="{{ $propiedad->imagen_url }}" alt="{{ $propiedad->titulo }}" class="w-full h-48 object-cover">
            
            <div class="p-4">
                {{-- Imprimimos el título del objeto actual --}}
                <h3 class="font-bold text-xl mb-2">{{ $propiedad->titulo }}</h3>
                
                <p class="text-gray-600 text-sm mb-2">
                    {{ $propiedad->ubicacion }} • {{ $propiedad->habitaciones }} hab.
                </p>
                
                <p class="text-gray-700 text-base mb-4">
                    {{ $propiedad->descripcion }}
                </p>

                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-green-600">
                        ${{ $propiedad->precio_noche }} / noche
                    </span>
                    
                    <a href="{{ route('propiedades.show', $propiedad) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Ver detalles
                    </a>
                
                </div>
            </div>
        </div>

    @endforeach {{-- Fin del bucle --}}
</div>

@endsection