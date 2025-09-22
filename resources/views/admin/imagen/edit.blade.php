<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Imagen') }}
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
                        <form action="{{ route('admin.imagen.update', $imagen->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Editar Imagen</h1>

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
                                        class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                    <option value="">-- Seleccione un tipo --</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ old('tipo_imagen_id', $imagen->tipo_imagen_id) == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Vista previa destacada --}}
                            <div class="mt-6">
                                <label class="block text-sm font-semibold text-white mb-2">Imagen actual:</label>
                                @if($imagen->url && file_exists(public_path('storage/' . $imagen->url)))
                                    <div class="bg-gray-900 border border-gray-600 rounded-md p-4 shadow-md flex justify-center">
                                        <img src="{{ asset('storage/' . $imagen->url) }}" alt="Imagen actual" class="max-w-xs rounded-md border border-gray-400">
                                    </div>
                                @else
                                    <div class="text-sm text-gray-400">Sin archivo disponible</div>
                                @endif
                            </div>

                            {{-- Campo Archivo --}}
                            <div>
                                <label for="imagen" class="block text-sm font-semibold text-white mt-6">Reemplazar Imagen (opcional)</label>
                                <input type="file"
                                       name="imagen"
                                       id="imagen"
                                       accept="image/*"
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                <p class="text-xs text-gray-400 mt-1">Subí una nueva imagen si querés reemplazar la actual.</p>
                            </div>

                            {{-- Campo Dato Personal --}}
                            <div>
                                <label for="dato_personal_id" class="block text-sm font-semibold text-white">Dato Personal</label>
                                <select name="dato_personal_id" id="dato_personal_id"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                                    <option value="">-- Seleccione el usuario --</option>
                                    @foreach($datos as $dato)
                                        <option value="{{ $dato->id }}" {{ old('dato_personal_id', $imagen->dato_personal_id) == $dato->id ? 'selected' : '' }}>
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
                                    💾 Guardar Cambios
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
