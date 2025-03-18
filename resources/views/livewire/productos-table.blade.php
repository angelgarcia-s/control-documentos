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
                            @if($column['sortable'])
                                <i class="ti {{ $orderBy === $column['name'] ? ($orderDirection === 'asc' ? 'ti-sort-ascending' : 'ti-sort-descending') : 'ti-arrows-sort' }} ml-1"></i>
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
                                       wire:model.live="search.{{ $column['name'] }}"
                                       class="ti-form-input w-full text-sm px-2 py-1 border rounded focus:ring-1 focus:ring-blue-500"
                                       placeholder="Buscar {{ $column['label'] }}'">
                    
                                @if(!empty($search[$column['name']]))
                                    <button type="button"
                                            onclick="window.location.href='{{ route('productos.index') }}'"
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
                                <select wire:change="executeAction({{ $producto->id }}, $event.target.value)"
                                        wire:key="select-{{ $producto->id }}"
                                        class="action-select ti-form-select inline-flex items-center px-2 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
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
                                @if ($column['name'] === 'id_familia')
                                    {{ $producto->familia?->nombre ?? '-' }}
                                @elseif ($column['name'] === 'id_color')
                                    {{ $producto->colores?->nombre ?? '-' }}
                                @elseif ($column['name'] === 'id_tamano')
                                    {{ $producto->tamanos?->nombre ?? '-' }}
                                @elseif ($column['name'] === 'id_proveedor')
                                    {{ $producto->proveedor?->nombre ?? '-' }}
                                @else
                                    {{ $producto->{$column['name']} ?? '-' }}
                                @endif
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

    <!-- Modal de Confirmación usando componente -->
<x-modal name="delete-producto" :show="$confirmingDelete !== null" maxWidth="md">
    <div class="p-6">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Confirmar eliminación</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-6">¿Estás seguro de que quieres borrar este producto?</p>
        <div class="flex justify-end space-x-2">
            <button wire:click="cancelDelete" 
                    class="ti-btn ti-btn-secondary !py-1 !px-2 ti-btn-wave">
                Cancelar
            </button>
            <button wire:click="deleteProducto" 
                    wire:loading.attr="disabled" 
                    class="ti-btn ti-btn-danger !py-1 !px-2 ti-btn-wave">
                Confirmar
            </button>
        </div>
    </div>
</x-modal>

<script>
    document.addEventListener('livewire:initialized', function () {
        Livewire.on('resetSelects', () => {
            document.querySelectorAll('.action-select').forEach(select => {
                select.value = '';
            });
        });
        
        Livewire.on('search-updated', () => {
            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.value = '';
            });
        });

        // Depuración de eventos
        Livewire.on('open-modal', (name) => {
            console.log('Evento open-modal disparado:', name);
        });
        Livewire.on('close-modal', (name) => {
            console.log('Evento close-modal disparado:', name);
        });
    });
</script>