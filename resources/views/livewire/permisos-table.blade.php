<div class="overflow-x-auto">
    <div class="ti-custom-table ti-striped-table ti-custom-table-hover">

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
                                       placeholder="Buscar {{ $columna['label'] }}'">
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
                @foreach($permisos as $permiso)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                        @foreach($columnas as $columna)
                            <td class="py-3 px-6 border">
                                @if($columna['name'] === 'category')
                                    <!-- Campo editable para la categoría -->
                                    <select wire:model.live="updateCategory.{{ $permiso->id }}"
                                            wire:change="updateCategory({{ $permiso->id }}, $event.target.value)"
                                            class="ti-form-select w-full px-2 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                                        @foreach($categoriasDisponibles as $categoria)
                                            <option value="{{ $categoria }}" {{ $permiso->category === $categoria ? 'selected' : '' }}>
                                                {{ $categoria }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    {{ $this->getColumnValue($permiso, $columna) }}
                                @endif
                            </td>
                        @endforeach
                        <td class="py-3 px-6 border">
                            <div class="flex items-center space-x-2">
                                @can('permisos-edit')
                                    <a href="{{ route('permisos.edit', $permiso) }}" class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave">
                                        <i class="ri-pencil-line"></i>
                                    </a>
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
        <!-- Select para elementos por página -->
        <div class="flex items-center space-x-2">
            <label for="perPage" class="text-sm text-gray-700 dark:text-gray-300">Mostrar:</label>
            <select wire:model.live="perPage" id="perPage"
                    class="ti-form-select w-16 px-2 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                @foreach($perPageOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <!-- Paginación de Livewire con Tailwind -->
        <div>
            {{ $permisos->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
