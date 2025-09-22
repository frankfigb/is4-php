<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tipos de Habilidad') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="container mx-auto p-4">

                        {{-- Botón para añadir arriba de la tabla --}}
                        <div class="flex justify-start mb-4">
                            <a href="{{ route('admin.tipo-habilidad.create') }}"
                               class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                ➕ Añadir Nuevo Tipo
                            </a>
                        </div>

                        <div class="bg-gray-700 rounded-lg shadow-xl p-6">
                            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Listado de Tipos de Habilidad</h1>

                            <div class="overflow-x-auto">
                                <table class="min-w-full leading-normal text-white">
                                    <thead>
                                    <tr class="bg-gray-600 text-white">
                                        <th class="px-5 py-3 border-b-2 border-gray-500 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-500 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-500 text-left text-xs font-semibold uppercase tracking-wider">Creado</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-500 text-left text-xs font-semibold uppercase tracking-wider">Actualizado</th>
                                        <th class="px-5 py-3 border-b-2 border-gray-500 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tipos as $tipo)
                                        <tr class="hover:bg-gray-600 transition duration-300 ease-in-out">
                                            <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                                {{ $tipo->id }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                                {{ $tipo->nombre }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                                {{ $tipo->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                                {{ $tipo->updated_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                                <div class="flex flex-wrap gap-2">
                                                    <a href="{{ route('admin.tipo-habilidad.show', $tipo->id) }}"
                                                       class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition duration-200">
                                                        👁 Ver
                                                    </a>
                                                    <a href="{{ route('admin.tipo-habilidad.edit', $tipo->id) }}"
                                                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition duration-200">
                                                        ✏️ Editar
                                                    </a>
                                                    <form action="{{ route('admin.tipo-habilidad.destroy', $tipo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition duration-200">
                                                            🗑 Eliminar
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

                        {{-- Botón para añadir debajo de la tabla --}}
                        <div class="flex justify-start mt-4">
                            <a href="{{ route('admin.tipo-habilidad.create') }}"
                               class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200">
                                ➕ Añadir Nuevo Tipo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
