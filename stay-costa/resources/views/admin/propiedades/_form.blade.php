{{-- Formulario compartido por create y edit.
     Variables esperadas: $accion, $metodo, $textoBoton, $propiedad (puede ser null). --}}
<form action="{{ $accion }}" method="POST" class="space-y-4">
    @csrf
    @if ($metodo !== 'POST')
        @method($metodo)
    @endif

    <div>
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título de la Propiedad</label>
        <input
            id="titulo"
            type="text"
            name="titulo"
            value="{{ old('titulo', optional($propiedad)->titulo) }}"
            required
            maxlength="255"
            class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
        >
        @error('titulo')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación</label>
            <input
                id="ubicacion"
                type="text"
                name="ubicacion"
                value="{{ old('ubicacion', optional($propiedad)->ubicacion) }}"
                required
                maxlength="255"
                class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
            >
            @error('ubicacion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="precio_noche" class="block text-sm font-medium text-gray-700">Precio por Noche (USD)</label>
            <input
                id="precio_noche"
                type="number"
                step="0.01"
                min="0"
                name="precio_noche"
                value="{{ old('precio_noche', optional($propiedad)->precio_noche) }}"
                required
                class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
            >
            @error('precio_noche')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="habitaciones" class="block text-sm font-medium text-gray-700">Número de Habitaciones</label>
            <input
                id="habitaciones"
                type="number"
                min="1"
                name="habitaciones"
                value="{{ old('habitaciones', optional($propiedad)->habitaciones) }}"
                required
                class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
            >
            @error('habitaciones')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="imagen_url" class="block text-sm font-medium text-gray-700">URL de la Imagen</label>
            <input
                id="imagen_url"
                type="url"
                name="imagen_url"
                value="{{ old('imagen_url', optional($propiedad)->imagen_url) }}"
                placeholder="https://ejemplo.com/imagen.jpg"
                required
                class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
            >
            @error('imagen_url')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea
            id="descripcion"
            name="descripcion"
            rows="4"
            required
            class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
        >{{ old('descripcion', optional($propiedad)->descripcion) }}</textarea>
        @error('descripcion')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex flex-col sm:flex-row gap-3 pt-2">
        <button
            type="submit"
            class="w-full sm:flex-1 bg-blue-600 text-white font-bold py-2.5 rounded-md hover:bg-blue-700 transition duration-200"
        >
            {{ $textoBoton }}
        </button>
        <a
            href="{{ route('admin.propiedades.index') }}"
            class="w-full sm:w-auto text-center bg-gray-100 text-gray-700 font-semibold py-2.5 px-5 rounded-md hover:bg-gray-200 transition duration-200"
        >
            Cancelar
        </a>
    </div>
</form>
