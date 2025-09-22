<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Imagen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">

                        {{-- Botón de volver --}}
                        <div class="flex justify-start mb-4">
                            <a href="{{ route('admin.imagen.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Volver
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6">
                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Detalle de Imagen</h1>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- ID --}}
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xs font-semibold uppercase text-gray-400">ID</p>
                                    <p class="text-lg text-gray-200 mt-1">{{ $imagen->id }}</p>
                                </div>

                                {{-- Tipo de Imagen --}}
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xs font-semibold uppercase text-gray-400">Tipo</p>
                                    <p class="text-lg text-gray-200 mt-1">{{ $imagen->tipoImagen->nombre ?? 'Sin tipo' }}</p>
                                </div>

                                {{-- Dato Personal --}}
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xs font-semibold uppercase text-gray-400">Dato Personal</p>
                                    <p class="text-lg text-gray-200 mt-1">{{ $imagen->datosPersonales->nombre ?? 'Sin dato' }}</p>
                                </div>

                                {{-- Archivo --}}
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xs font-semibold uppercase text-gray-400">Archivo</p>
                                    @if($imagen->url && file_exists(public_path('storage/' . $imagen->url)))
                                        <img src="{{ asset('storage/' . $imagen->url) }}" alt="Imagen" class="w-full max-w-md rounded shadow-md mt-2">
                                    @else
                                        <p class="text-gray-400 mt-2">Sin archivo disponible</p>
                                    @endif
                                </div>

                                {{-- Creado --}}
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xs font-semibold uppercase text-gray-400">Creado en</p>
                                    <p class="text-lg text-gray-200 mt-1">
                                        {{ $imagen->created_at ? $imagen->created_at->format('d/m/Y H:i') : 'Sin fecha' }}
                                    </p>
                                </div>

                                {{-- Actualizado --}}
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-xs font-semibold uppercase text-gray-400">Actualizado en</p>
                                    <p class="text-lg text-gray-200 mt-1">
                                        {{ $imagen->updated_at ? $imagen->updated_at->format('d/m/Y H:i') : 'Sin fecha' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
