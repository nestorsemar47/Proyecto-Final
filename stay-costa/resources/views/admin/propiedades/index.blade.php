@extends('layouts.main')

@section('title', 'Panel de Administración - Propiedades')

@section('content')
<div class="max-w-6xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg border">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Propiedades</h1>
            <p class="text-sm text-gray-500 mt-1">
                {{ $propiedades->count() }} registradas ·
                <span class="text-emerald-600 font-semibold">{{ $propiedades->where('activo', true)->count() }} activas</span>
                ·
                <span class="text-rose-500 font-semibold">{{ $propiedades->where('activo', false)->count() }} inactivas</span>
            </p>
        </div>

        <a href="{{ route('admin.propiedades.create') }}" class="inline-block text-center bg-blue-600 text-white font-bold px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
            + Nueva Propiedad
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b text-gray-700 uppercase text-xs">
                    <th class="p-3 whitespace-nowrap">ID</th>
                    <th class="p-3 whitespace-nowrap">Imagen</th>
                    <th class="p-3 whitespace-nowrap">Título</th>
                    <th class="p-3 whitespace-nowrap">Ubicación</th>
                    <th class="p-3 whitespace-nowrap">Precio / Noche</th>
                    <th class="p-3 whitespace-nowrap">Habitaciones</th>
                    <th class="p-3 whitespace-nowrap">Estado</th>
                    <th class="p-3 whitespace-nowrap text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propiedades as $propiedad)
                    <tr class="border-b hover:bg-gray-50 text-sm {{ $propiedad->activo ? '' : 'bg-gray-50' }}">
                        <td class="p-3 font-bold text-gray-600">#{{ $propiedad->id }}</td>
                        <td class="p-3">
                            <img
                                src="{{ $propiedad->imagen_url }}"
                                alt="{{ $propiedad->titulo }}"
                                class="w-16 h-12 object-cover rounded {{ $propiedad->activo ? '' : 'grayscale opacity-70' }}"
                            >
                        </td>
                        <td class="p-3 font-semibold text-gray-800">{{ $propiedad->titulo }}</td>
                        <td class="p-3 text-gray-600">{{ $propiedad->ubicacion }}</td>
                        <td class="p-3 text-green-600 font-bold whitespace-nowrap">${{ $propiedad->precio_noche }} USD</td>
                        <td class="p-3 text-gray-600">{{ $propiedad->habitaciones }} hab.</td>

                        <td class="p-3">
                            @if ($propiedad->activo)
                                <span class="inline-block bg-emerald-100 text-emerald-800 text-xs px-2.5 py-1 rounded-full font-semibold uppercase">
                                    Activa
                                </span>
                            @else
                                <span class="inline-block bg-rose-100 text-rose-700 text-xs px-2.5 py-1 rounded-full font-semibold uppercase">
                                    Inactiva
                                </span>
                            @endif
                        </td>

                        <td class="p-3">
                            <div class="flex items-center justify-end gap-2 whitespace-nowrap">
                                @if ($propiedad->activo)
                                    <a
                                        href="{{ route('propiedades.show', $propiedad) }}"
                                        target="_blank"
                                        rel="noopener"
                                        class="text-[#4A90E2] hover:text-[#1A365D] font-semibold text-xs hover:underline"
                                    >
                                        Ver
                                    </a>
                                @endif

                                <a
                                    href="{{ route('admin.propiedades.edit', $propiedad) }}"
                                    class="inline-block bg-blue-50 text-blue-700 border border-blue-200 hover:bg-blue-100 font-semibold text-xs px-3 py-1.5 rounded-md transition"
                                >
                                    Editar
                                </a>

                                @if ($propiedad->activo)
                                    <form
                                        action="{{ route('admin.propiedades.destroy', $propiedad) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Desactivar esta propiedad? Dejará de mostrarse en el catálogo público.');"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="bg-rose-50 text-rose-600 border border-rose-200 hover:bg-rose-100 font-semibold text-xs px-3 py-1.5 rounded-md transition"
                                        >
                                            Desactivar
                                        </button>
                                    </form>
                                @else
                                    <form
                                        action="{{ route('admin.propiedades.activar', $propiedad) }}"
                                        method="POST"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            type="submit"
                                            class="bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 font-semibold text-xs px-3 py-1.5 rounded-md transition"
                                        >
                                            Reactivar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-6 text-gray-500">
                            No hay propiedades registradas en la plataforma.
                            <a href="{{ route('admin.propiedades.create') }}" class="text-[#4A90E2] font-semibold hover:underline">
                                Registrar la primera
                            </a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
