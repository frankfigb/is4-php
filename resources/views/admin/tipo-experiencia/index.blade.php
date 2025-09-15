<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tipos de Experiencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">

                        {{-- Mensajes de éxito o error --}}
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-600 text-white rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-600 text-white rounded-lg">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Botón para añadir arriba de la tabla (a la izquierda) --}}
                        <div class="flex justify-start mb-4">
                            <a href="{{ route('admin.tipo-experiencia.create') }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Añadir Nuevo Tipo
                            </a>
                        </div>

                        <div class="bg-gray-800 rounded-lg shadow-xl p-6">
                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Listado de Tipos de Experiencia</h1>

                            <div class="overflow-x-auto">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr class="bg-gray-700 text-gray-300">
                                        <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-xs font-semibold uppercase tracking-wider">Creado</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-xs font-semibold uppercase tracking-wider">Actualizado</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-700 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tipo as $tipo)
                                        <tr class="hover:bg-gray-700 transition duration-300 ease-in-out">
                                            <td class="px-5 py-5 border-b border-gray-700 text-sm">
                                                <p class="text-gray-200 whitespace-no-wrap">{{ $tipo->id }}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-700 text-sm">
                                                <p class="text-gray-200 whitespace-no-wrap">{{ $tipo->nombre }}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-700 text-sm">
                                                <p class="text-gray-200 whitespace-no-wrap">{{ $tipo->created_at->format('d/m/Y H:i') }}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-700 text-sm">
                                                <p class="text-gray-200 whitespace-no-wrap">{{ $tipo->updated_at->format('d/m/Y H:i') }}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-700 text-sm">
                                                <div class="flex space-x-2">
                                                    {{-- Ver --}}
                                                    <a href="{{ route('admin.tipo-experiencia.show', $tipo->id) }}"
                                                       class="inline-block w-20 text-center border border-green-400 text-green-400 hover:bg-green-400 hover:text-white px-2 py-1 rounded-md transition duration-300 ease-in-out">
                                                        Ver
                                                    </a>
                                                    {{-- Editar --}}
                                                    <a href="{{ route('admin.tipo-experiencia.edit', $tipo->id) }}"
                                                       class="inline-block w-20 text-center border border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-white px-2 py-1 rounded-md transition duration-300 ease-in-out">
                                                        Editar
                                                    </a>
                                                    {{-- Eliminar --}}
                                                    <form action="{{ route('admin.tipo-experiencia.destroy', $tipo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="inline-block w-20 text-center border border-red-400 text-red-400 hover:bg-red-400 hover:text-white px-2 py-1 rounded-md transition duration-300 ease-in-out">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Botón para añadir debajo de la tabla (a la izquierda) --}}
                        <div class="flex justify-start mt-4">
                            <a href="{{ route('admin.tipo-experiencia.create') }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Añadir Nuevo Tipo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
