<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle del Servicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-start mb-6">
                        <a href="{{ route('admin.servicio.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Volver
                        </a>
                    </div>

                    <div class="text-center mb-8">
                        <i class="{{ $servicio->icono }} text-5xl text-blue-400 mb-4"></i>
                        <h1 class="text-4xl font-bold text-blue-500">{{ $servicio->titulo }}</h1>
                        <p class="mt-2 text-sm text-gray-400">Dato personal: {{ $servicio->datoPersonal->nombre ?? 'Sin dato' }}</p>
                    </div>

                    <div class="bg-gray-700 rounded-lg p-6 shadow-md">
                        <h2 class="text-xl font-semibold text-white mb-4">Descripción</h2>
                        <p class="text-gray-200 leading-relaxed">{{ $servicio->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
