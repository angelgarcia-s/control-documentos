<div>
    <div class="box-header">
        <div class="box-title">Catálogo de Estados de PrintCard</div>
    </div>
    <div class="box-body">
        <div class="overflow-x-auto">
            <div class="ti-custom-table ti-striped-table ti-custom-table-hover">
                <!-- Mostrar el mensaje de error de Livewire -->
                @if ($errorMessage)
                    <x-alert type="danger" :message="$errorMessage" duration="3000"
                        x-init="setTimeout(() => { show = false; $wire.clearErrorMessage(); }, 3000)" />
                @endif

                <table class="w-full bg-white table-auto whitespace-nowrap border border-gray-300 rounded-lg">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            @foreach($columnas as $columna)
                                <th class="py-3 px-6 text-left border cursor-pointer" wire:click="ordenarPor('{{ $columna['name'] }}')">
                                    {{ $columna['label'] }}
                                    @if($columna['sortable'])
                                        <i class="ti {{ $orderBy === $columna['name'] ? ($orderDirection === 'asc' ? 'ti-sort-ascending' : 'ti-sort-descending') : 'ti-arrows-sort' }} ml-1"></i>
                                    @endif
                                </th>
                            @endforeach
                            <th class="py-3 px-6 text-left border">Acciones</th>
                        </tr>
                        <tr>
                            @foreach($columnas as $columna)
                                <th class="border px-4 py-2 relative">
                                    @if($columna['searchable'])
                                        <div class="relative">
                                            <input type="text"
                                                   wire:model.live="search.{{ $columna['name'] }}"
                                                   class="ti-form-input w-full text-sm px-2 py-1 border rounded focus:ring-1 focus:ring-blue-500"
                                                   placeholder="Buscar {{ $columna['label'] }}">
                                            @if(!empty($search[$columna['name']]))
                                                <button type="button"
                                                        wire:click="limpiarBusqueda('{{ $columna['name'] }}')"
                                                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                                    <i class="ti ti-x text-sm"></i>
                                                </button>
                                            @endif
                                        </div>
                                    @endif
                                </th>
                            @endforeach
                            <th class="border px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estados as $estado)
                            <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="py-3 px-6 border">{{ $estado->id }}</td>
                                <td class="py-3 px-6 border">{{ $estado->nombre }}</td>
                                <td class="py-3 px-6 border">
                                    @if($estado->color)
                                        <span class="inline-block px-2 py-1 rounded text-white bg-{{ $estado->color }}-500">{{ $estado->color }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="py-3 px-6 border">
                                    @if($estado->activo)
                                        <span class="text-green-600 font-bold">Sí</span>
                                    @else
                                        <span class="text-red-600 font-bold">No</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 border">
                                    <div class="flex items-center space-x-2">
                                        @can('estados-print-cards-edit')
                                            <a href="{{ route('estados-print-cards.edit', $estado) }}" class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave" title="Editar">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        @endcan
                                        @can('estados-print-cards-destroy')
                                            <button wire:click="confirmarEliminar({{ $estado->id }})" class="ti-btn text-lg text-rose-400 !py-1 !px-1 ti-btn-wave" title="Eliminar">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación con Livewire y <select> -->
            <div class="mt-3 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm text-gray-700 dark:text-gray-300">Mostrar:</label>
                    <select wire:model.live="perPage" id="perPage"
                            class="ti-form-select w-16 px-2 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                        @foreach($perPageOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    {{ $estados->links('vendor.pagination.tailwind') }}
                </div>
            </div>

            <!-- Modal basado en Livewire puro -->
            @if($confirmingDelete !== null)
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
                <div class="bg-white rounded-lg p-6 max-w-md w-full">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Confirmar eliminación</h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-6">
                        ¿Estás seguro de que quieres eliminar este estado?
                        <br>
                        <span class="text-xs text-rose-500">No se puede eliminar si está en uso por alguna PrintCard.</span>
                    </p>
                    <div class="flex justify-end space-x-2">
                        <button wire:click="cancelarEliminar"
                                class="ti-btn ti-btn-secondary !py-1 !px-2 ti-btn-wave">
                            Cancelar
                        </button>
                        <button wire:click="eliminarElemento"
                                wire:loading.attr="disabled"
                                class="ti-btn ti-btn-danger !py-1 !px-2 ti-btn-wave">
                            Confirmar
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
