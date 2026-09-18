@extends('layouts.main')

@section('title', 'Propiedades Stay-Costa')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Propiedades Destacadas</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @include('components.propertyCard')
        @include('components.propertyCard')
        @include('components.propertyCard')
    </div>
@endsection