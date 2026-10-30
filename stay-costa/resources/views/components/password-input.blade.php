@props([
    'name' => 'password',
    'label' => 'Contraseña',
    'required' => true
])

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ $label }}</label>
    <div class="relative">
        <input 
            type="password" 
            name="{{ $name }}" 
            {{ $required ? 'required' : '' }} 
            class="w-full p-3 pr-10 border border-gray-300 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A90E2] focus:border-transparent transition"
        >
        <button 
            type="button" 
            onclick="togglePasswordVisibility(this)"
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#4A90E2] transition"
            title="Mostrar u ocultar contraseña"
        >
            <!-- Ícono Ojo Abierto -->
            <svg class="eye-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <!-- Ícono Ojo Oculto/Tachado -->
            <svg class="eye-off-icon w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.038 10.038 0 013.682-.821c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18" />
            </svg>
        </button>
    </div>

    @error($name)
        <p class="text-rose-500 text-xs mt-1 font-medium flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            {{ $message }}
        </p>
    @enderror
</div>

@once
<script>
    function togglePasswordVisibility(button) {
        const container = button.parentElement;
        const input = container.querySelector('input');
        const eyeIcon = button.querySelector('.eye-icon');
        const eyeOffIcon = button.querySelector('.eye-off-icon');

        const esPassword = input.type === 'password';
        input.type = esPassword ? 'text' : 'password';

        eyeIcon.classList.toggle('hidden', esPassword);
        eyeOffIcon.classList.toggle('hidden', !esPassword);
    }
</script>
@endonce