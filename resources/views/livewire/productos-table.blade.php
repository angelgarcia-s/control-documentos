<div class="overflow-x-auto">
    <!-- Tabla de productos -->
    <div class="ti-custom-table ti-striped-table ti-custom-table-hover">
        <table class="w-full bg-white table-auto whitespace-nowrap border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="py-3 px-6 text-left border">Acciones</th>
                    @foreach($columns as $column)
                        <th class="py-3 px-6 text-left border cursor-pointer" wire:click="sortBy('{{ $column['name'] }}')">
                            {{ $column['label'] }}
                            @if($orderBy === $column['name']) 
                                <i class="ti {{ $orderDirection === 'asc' ? 'ti-sort-ascending' : 'ti-sort-descending' }} ml-1"></i>
                            @endif
                        </th>
                    @endforeach
                </tr>
                <tr>
                    <th class="border px-4 py-2"></th>
                    @foreach($columns as $column)
                    <th class="border px-4 py-2 relative">
                        @if($column['searchable'])
                            <div class="relative">
                                <input type="text"
                                       wire:model.lazy="search.{{ $column['name'] }}"
                                       class="ti-form-input w-full text-sm px-2 py-1 border rounded focus:ring-1 focus:ring-blue-500"
                                       placeholder="Buscar {{ $column['label'] }}'">
                    
                                @if(!empty($search[$column['name']]))
                                    <button type="button"
                                            wire:click="clearSearch('{{ $column['name'] }}')"
                                            wire:target="clearSearch"
                                            wire:loading.attr="disabled"
                                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                        <i class="ti ti-x text-sm"></i>
                                    </button>
                                @endif
                            </div>
                        @endif
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                        <td class="py-3 px-6 border">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('productos.show', $producto->id) }}" 
                                   class="ti-btn ti-btn-outline-primary !py-1 !px-2 ti-btn-w-xs ti-btn-wave">
                                    Ver
                                </a>
                                <select wire:change="confirmDelete({{ $producto->id }})" 
                                        class="action-select inline-flex items-center px-2 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                                    <option value="">Acción</option>
                                    <option value="codigos">Códigos de barras</option>
                                    <option value="print">PrintCards</option>
                                    <option value="editar">Editar</option>
                                    <option value="borrar">Borrar</option>
                                </select>
                            </div>
                        </td>
                        @foreach($columns as $column)
                            <td class="py-3 px-6 border">
                                {{ $producto->{$column['name']} ?? '-' }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $productos->links() }}
    </div>
</div>