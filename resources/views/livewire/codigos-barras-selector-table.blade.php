<div class="overflow-x-auto">
    <div class="ti-custom-table ti-striped-table ti-custom-table-hover">
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
                </tr>
            </thead>
            <tbody>
                @foreach($elementos as $elemento)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                        @foreach($columnas as $columna)
                            <td class="py-3 px-6 border">
                                @if($columna['name'] === 'check')
                                    <input type="radio"
                                           name="code_selection"
                                           value="{{ $elemento->id }}"
                                           wire:change="$parent.selectCode({{ $elemento->id }})"
                                           {{ $selectedCode == $elemento->id ? 'checked' : '' }}
                                           class="ti-form-radio"
                                           :key="'codigo-'.$elemento->id.'-'.$selectedCode"
                                           >
                                @else
                                    {{ $elemento->{$columna['name']} ?? '-' }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

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
                {!! $elementos->links('vendor.pagination.tailwind') !!}
            </div>
        </div>
    </div>
</div>
