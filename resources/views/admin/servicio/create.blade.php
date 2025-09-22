<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Servicio') }}
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
                        <form action="{{ route('admin.servicio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Formulario de Servicio</h1>

                            {{-- Mensaje de éxito --}}
                            @if (session('success'))
                                <div class="mb-4 p-4 bg-green-600 text-white rounded-lg">
                                    {{ session('success') }}
                                </div>
                            @endif

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
                                        class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                    <option value="">-- Seleccione el usuario --</option>
                                    @foreach($datos as $dato)
                                        <option value="{{ $dato->id }}" {{ old('dato_personal_id') == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-gray-400 mt-1">Seleccioná el autor o responsable del servicio.</p>
                            </div>

                            {{-- Campo Imagen del Ícono --}}
                            <div>
                                <label for="imagen_icono" class="block text-sm font-semibold text-white">Imagen del ícono</label>
                                <input type="file"
                                       name="imagen_icono"
                                       id="imagen_icono"
                                       accept="image/*"
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                <p class="text-xs text-gray-400 mt-1">Subí una imagen que represente visualmente el servicio.</p>
                            </div>

                            {{-- Campo Título --}}
                            <div>
                                <label for="titulo" class="block text-sm font-semibold text-white">Título</label>
                                <input type="text"
                                       name="titulo"
                                       id="titulo"
                                       value="{{ old('titulo') }}"
                                       required
                                       placeholder="Ej: Desarrollo Web Personalizado"
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                <p class="text-xs text-gray-400 mt-1">Agregá un título claro y atractivo para el servicio.</p>
                            </div>

                            {{-- Campo Descripción --}}
                            <div>
                                <label for="descripcion" class="block text-sm font-semibold text-white">Descripción</label>
                                <textarea name="descripcion"
                                          id="descripcion"
                                          rows="4"
                                          required
                                          placeholder="Describí brevemente qué ofrece este servicio y cómo puede ayudar."
                                          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">{{ old('descripcion') }}</textarea>
                                <p class="text-xs text-gray-400 mt-1">Incluí detalles que ayuden al visitante a entender el valor del servicio.</p>
                            </div>

                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('admin.servicio.index') }}"
                                   class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                    ✖ Cancelar
                                </a>
                                <button type="submit"
                                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                    💾 Guardar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
