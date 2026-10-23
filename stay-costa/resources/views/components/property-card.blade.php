@props(['propiedad'])

<div class="bg-white rounded-xl shadow-md border overflow-hidden transition transform hover:-translate-y-1">
    <img src="{{ $propiedad->imagen_url }}" alt="{{ $propiedad->titulo }}" class="w-full h-48 object-cover">
    <div class="p-5">
        <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $propiedad->titulo }}</h3>
        <p class="text-gray-600 text-sm mb-3">{{ $propiedad->ubicacion }} • {{ $propiedad->habitaciones }} hab.</p>
        <div class="flex justify-between items-center">
            <span class="text-green-600 font-bold text-lg">${{ $propiedad->precio_noche }} / noche</span>
            <a href="{{ route('propiedades.show', $propiedad->id) }}" class="bg-[#4A90E2] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#3b7ac8] transition transform duration-200 hover:scale-[1.2]">
                Ver Detalles
            </a>
        </div>
    </div>
</div>