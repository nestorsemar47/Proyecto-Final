@extends('layouts.main')

@section('title', 'Registrar Nueva Propiedad')

@section('content')
<div class="max-w-2xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg border">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-6 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800">Registrar Nueva Propiedad</h1>
        <a href="{{ route('admin.propiedades.index') }}" class="text-gray-600 hover:underline text-sm">
            ← Volver al Panel
        </a>
    </div>

    @include('admin.propiedades._form', [
        'propiedad' => null,
        'accion' => route('admin.propiedades.store'),
        'metodo' => 'POST',
        'textoBoton' => 'Publicar Propiedad',
    ])

</div>
@endsection
