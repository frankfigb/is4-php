<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Imagen') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="container mx-auto">

                        {{-- Botón de volver --}}
                        <div class="flex justify-start mb-6">
                            <a href="{{ route('admin.imagen.index') }}"
                               class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                ← Volver
                            </a>
                        </div>

                        {{-- Formulario --}}
                        <form action="{{ route('admin.imagen.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Formulario de Imagen</h1>

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

                            {{-- Campo Tipo de Imagen --}}
                            <div>
                                <label for="tipo_imagen_id" class="block text-sm font-semibold text-white">Tipo de Imagen</label>
                                <select name="tipo_imagen_id" id="tipo_imagen_id"
                                        required
                                        class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                    <option value="">-- Seleccione un tipo --</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ old('tipo_imagen_id') == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Campo Archivo + Vista previa --}}
                            <div>
                                <label for="imagen" class="block text-sm font-semibold text-white">Archivo (Imagen)</label>
                                <input type="file"
                                       name="imagen"
                                       id="imagen"
                                       accept="image/*"
                                       required
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm"
                                       onchange="previewImage(event)">
                                <p class="text-xs text-gray-400 mt-1">Seleccioná una imagen para subir.</p>

                                {{-- Vista previa --}}
                                <div id="preview-container" class="mt-4 hidden">
                                    <p class="text-sm font-semibold text-white mb-2">Vista previa:</p>
                                    <img id="preview" class="max-w-xs rounded-md border border-gray-400 shadow-md">
                                </div>
                            </div>

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
                            </div>

                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4 mt-6">
                                <a href="{{ route('admin.imagen.index') }}"
                                   class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                    ✖ Cancelar
                                </a>
                                <button type="submit"
                                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                    💾 Guardar
                                </button>
                            </div>
                        </form>

                        {{-- Script para vista previa --}}
                        <script>
                            function previewImage(event) {
                                const input = event.target;
                                const preview = document.getElementById('preview');
                                const container = document.getElementById('preview-container');

                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        container.classList.remove('hidden');
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                } else {
                                    preview.src = '';
                                    container.classList.add('hidden');
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
