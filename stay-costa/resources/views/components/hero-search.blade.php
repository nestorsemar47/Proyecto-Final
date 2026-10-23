<div class="bg-[#1A365D] text-white rounded-2xl p-8 mb-10 shadow-lg text-center">
    <h1 class="text-3xl sm:text-4xl font-bold mb-3">Encuentra tu estancia ideal en Stay Costa</h1>
    <p class="text-gray-300 mb-6 text-sm sm:text-base">Explora las mejores casas de playa y ranchos en El Salvador</p>

    <div class="max-w-2xl mx-auto flex flex-col sm:flex-row gap-3">
        <input 
            type="text" 
            id="inputBuscar" 
            placeholder="¿A dónde quieres ir?" 
            class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2]"
        >
        <button 
            type="button" 
            id="btnBuscar" 
            class="bg-[#4A90E2] hover:bg-[#3b7ac8] text-white font-bold px-6 py-3 rounded-lg transition transform duration-200 hover:scale-[1.2]"
        >
            Buscar
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputBuscar = document.getElementById('inputBuscar');
        const btnBuscar = document.getElementById('btnBuscar');
        const contenedor = document.getElementById('contenedorPropiedades');
        let temporizadorDebounce = null;

        function realizarBusqueda(query = '') {
            fetch(`/buscar-propiedades?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(propiedades => {
                    if (propiedades.length === 0) {
                        contenedor.innerHTML = `
                            <div class="col-span-full bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-xl text-center">
                                No se encontraron propiedades que coincidan con la búsqueda.
                            </div>
                        `;
                        return;
                    }

                    let htmlConstruido = '';
                    propiedades.forEach(propiedad => {
                        htmlConstruido += `
                            <div class="bg-white rounded-xl shadow-md border overflow-hidden transition transform hover:-translate-y-1">
                                <img src="${propiedad.imagen_url}" alt="${propiedad.titulo}" class="w-full h-48 object-cover">
                                <div class="p-5">
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">${propiedad.titulo}</h3>
                                    <p class="text-gray-600 text-sm mb-3">${propiedad.ubicacion} • ${propiedad.habitaciones} hab.</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-green-600 font-bold text-lg">$${propiedad.precio_noche} / noche</span>
                                        <a href="/propiedades/${propiedad.id}" class="bg-[#4A90E2] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#3b7ac8] transition">
                                            Ver Detalles
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    contenedor.innerHTML = htmlConstruido;
                })
                .catch(error => console.error('Error al realizar la búsqueda:', error));
        }

        inputBuscar.addEventListener('input', (e) => {
            clearTimeout(temporizadorDebounce);
            temporizadorDebounce = setTimeout(() => {
                realizarBusqueda(e.target.value);
            }, 300);
        });

        btnBuscar.addEventListener('click', () => {
            clearTimeout(temporizadorDebounce);
            inputBuscar.value = '';
            realizarBusqueda('');
        });
    });
</script>