<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Servicio') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="container mx-auto">

                        {{-- Botón de volver --}}
                        <div class="flex justify-start mb-6">
                            <a href="{{ route('admin.servicio.index') }}"
                               class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                ← Volver
                            </a>
                        </div>

                        {{-- Formulario --}}
                        <form action="{{ route('admin.servicio.update', $servicio->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <h1 class="text-3xl font-bold mb-6 text-center text-yellow-400">Editar Servicio</h1>

                            {{-- Validaciones --}}
                            @if ($errors->any())
                                <div class="mb-4 p-4 bg-red-600 text-white rounded-lg">
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Campo Dato Personal --}}
                            <div>
                                <label for="dato_personal_id" class="block text-sm font-semibold text-white">Dato Personal</label>
                                <select name="dato_personal_id" id="dato_personal_id"
                                        required
                                        class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-yellow-500 focus:ring focus:ring-yellow-300 focus:ring-opacity-50 shadow-sm">
                                    <option value="">-- Seleccione un dato --</option>
                                    @foreach($datos as $dato)
                                        <option value="{{ $dato->id }}" {{ $servicio->dato_personal_id == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Imagen actual del ícono --}}
                            @if ($servicio->imagen_icono && file_exists(public_path('storage/' . $servicio->imagen_icono)))
                                <div>
                                    <label class="block text-sm font-semibold text-white mb-2">Imagen actual del ícono</label>
                                    <img src="{{ asset('storage/' . $servicio->imagen_icono) }}" alt="Ícono actual" class="w-16 h-16 object-contain rounded-md border border-gray-500">
                                </div>
                            @endif

                            {{-- Campo para subir nueva imagen --}}
                            <div>
                                <label for="imagen_icono" class="block text-sm font-semibold text-white mt-4">Reemplazar imagen del ícono</label>
                                <input type="file"
                                       name="imagen_icono"
                                       id="imagen_icono"
                                       accept="image/*"
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-yellow-500 focus:ring focus:ring-yellow-300 focus:ring-opacity-50 shadow-sm">
                                <p class="text-xs text-gray-400 mt-1">Subí una nueva imagen si querés reemplazar la actual.</p>
                            </div>

                            {{-- Campo Título --}}
                            <div>
                                <label for="titulo" class="block text-sm font-semibold text-white">Título</label>
                                <input type="text"
                                       name="titulo"
                                       id="titulo"
                                       value="{{ old('titulo', $servicio->titulo) }}"
                                       required
                                       placeholder="Agregá un título descriptivo para el servicio"
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-yellow-500 focus:ring focus:ring-yellow-300 focus:ring-opacity-50 shadow-sm">
                            </div>

                            {{-- Campo Descripción --}}
                            <div>
                                <label for="descripcion" class="block text-sm font-semibold text-white">Descripción</label>
                                <textarea name="descripcion"
                                          id="descripcion"
                                          rows="4"
                                          required
                                          placeholder="Agregá una descripción clara del servicio"
                                          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-yellow-500 focus:ring focus:ring-yellow-300 focus:ring-opacity-50 shadow-sm">{{ old('descripcion', $servicio->descripcion) }}</textarea>
                            </div>

                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('admin.servicio.index') }}"
                                   class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                    ✖ Cancelar
                                </a>
                                <button type="submit"
                                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                    🔄 Actualizar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
