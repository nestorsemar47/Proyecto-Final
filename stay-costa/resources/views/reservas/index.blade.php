@extends('layouts.main')

@section('title', 'Mis Reservas')

@section('content')
<div class="max-w-4xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg border">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Mis Reservas Realizadas</h1>

    {{-- Si la colección de reservas está vacía --}}
    @if ($reservas->isEmpty())
        <div class="bg-blue-50 text-blue-700 p-4 rounded-md border border-blue-200">
            Aún no has realizado ninguna reserva. 
            <a href="{{ route('home') }}" class="font-bold underline">Explora nuestras propiedades</a>.
        </div>
    @else
        {{-- Listado de reservas en tarjetas --}}
        <div class="space-y-4">
            @foreach ($reservas as $reserva)
                <div class="border rounded-lg p-4 flex flex-col md:flex-row justify-between items-center bg-gray-50 shadow-sm">
                    <div class="mb-4 md:mb-0">
                        {{-- Accedemos a los datos de la propiedad relacionada --}}
                        <h2 class="text-xl font-bold text-gray-800">{{ $reserva->propiedad->titulo }}</h2>
                        <p class="text-sm text-gray-600">Ubicación: {{ $reserva->propiedad->ubicacion }}</p>
                        <p class="text-sm text-gray-600">
                            Fechas: <strong>{{ $reserva->fecha_inicio }}</strong> al <strong>{{ $reserva->fecha_fin }}</strong>
                        </p>
                        <p class="text-sm text-gray-600">Huéspedes: {{ $reserva->huespedes }}</p>
                    </div>

                    <div class="text-right">
                        <span class="block text-2xl font-bold text-green-600">${{ $reserva->total_pago }} USD</span>
                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-semibold uppercase mt-1">
                            {{ $reserva->estado }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection