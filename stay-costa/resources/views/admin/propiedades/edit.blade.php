@extends('layouts.main')

@section('title', 'Editar Propiedad')

@section('content')
<div class="max-w-2xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg border">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-6 border-b pb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Editar Propiedad</h1>
            <p class="text-xs text-gray-500 mt-1">ID #{{ $propiedad->id }} · {{ $propiedad->titulo }}</p>
        </div>

        <div class="flex items-center gap-3">
            @if ($propiedad->activo)
                <span class="inline-block bg-emerald-100 text-emerald-800 text-xs px-2.5 py-1 rounded-full font-semibold uppercase">
                    Activa
                </span>
            @else
                <span class="inline-block bg-rose-100 text-rose-700 text-xs px-2.5 py-1 rounded-full font-semibold uppercase">
                    Inactiva
                </span>
            @endif

            <a href="{{ route('admin.propiedades.index') }}" class="text-gray-600 hover:underline text-sm">
                ← Volver al Panel
            </a>
        </div>
    </div>

    @include('admin.propiedades._form', [
        'propiedad' => $propiedad,
        'accion' => route('admin.propiedades.update', $propiedad),
        'metodo' => 'PUT',
        'textoBoton' => 'Guardar Cambios',
    ])

</div>
@endsection
