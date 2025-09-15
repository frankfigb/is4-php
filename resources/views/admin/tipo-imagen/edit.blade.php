<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tipo de Imagen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">

                        {{-- Botón de volver --}}
                        <div class="flex justify-start mb-6">
                            <a href="{{ route('admin.tipo-imagen.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Volver
                            </a>
                        </div>

                        {{-- Formulario --}}
                        <form action="{{ route('admin.tipo-imagen.update', $tipo->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Editar Tipo de Imagen</h1>

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

                            {{-- Campo Nombre --}}
                            <div>
                                <label for="nombre" class="block text-sm font-semibold text-white">Nombre</label>
                                <input type="text"
                                       name="nombre"
                                       id="nombre"
                                       placeholder="Ingrese el nombre del tipo de imagen"
                                       value="{{ old('nombre', $tipo->nombre) }}"
                                       required
                                       class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-400 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 shadow-sm">
                            </div>

                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('admin.tipo-imagen.index') }}"
                                   class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                    Cancelar
                                </a>
                                <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                    Guardar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
