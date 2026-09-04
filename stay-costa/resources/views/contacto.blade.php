@extends('layouts.main')

@section('title', 'Contacto - Stay Costa')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Contáctanos</h2>
        <p class="text-gray-600 mb-4">¿Tienes dudas o necesitas ayuda con tu reserva? Escríbenos.</p>
        
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" class="w-full border rounded p-2 mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Mensaje</label>
                <textarea class="w-full border rounded p-2 mt-1" rows="4"></textarea>
            </div>
            <button type="button" class="bg-blue-900 text-white px-4 py-2 rounded">Enviar</button>
        </form>
    </div>
@endsection