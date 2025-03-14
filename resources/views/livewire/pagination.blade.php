<div class="mt-3 flex justify-between items-center">
    <!-- Selector de registros por página -->
    <div class="flex items-center space-x-2">
        <span class="text-sm text-gray-700">Registros por página:</span>
        <select 
            wire:model.live="paginator.perPage" 
            class="ti-form-select text-sm border rounded px-2 py-1 focus:ring-1 focus:ring-blue-500"
        >
            @foreach($perPageOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Controles de paginación -->
    <div class="flex items-center space-x-2">
        <!-- Primera página -->
        <button 
            wire:click="gotoPage(1)" 
            class="ti-btn ti-btn-outline-secondary !py-1 !px-2 text-sm" 
            @if($paginator->onFirstPage()) disabled @endif
        >
            <i class="ti ti-chevrons-left"></i>
        </button>

        <!-- Página anterior -->
        <button 
            wire:click="previousPage" 
            class="ti-btn ti-btn-outline-secondary !py-1 !px-2 text-sm" 
            @if($paginator->onFirstPage()) disabled @endif
        >
            <i class="ti ti-chevron-left"></i>
        </button>

        <!-- Campo para elegir página -->
        <input 
            type="number" 
            wire:model.debounce.500ms="paginator.currentPage" 
            class="ti-form-input w-16 text-sm border rounded px-2 py-1 focus:ring-1 focus:ring-blue-500" 
            min="1" 
            max="{{ $paginator->lastPage() }}" 
            value="{{ $paginator->currentPage() }}"
        >
        <span class="text-sm text-gray-700">de {{ $paginator->lastPage() }}</span>

        <!-- Página siguiente -->
        <button 
            wire:click="nextPage" 
            class="ti-btn ti-btn-outline-secondary !py-1 !px-2 text-sm" 
            @if($paginator->onLastPage()) disabled @endif
        >
            <i class="ti ti-chevron-right"></i>
        </button>

        <!-- Última página -->
        <button 
            wire:click="gotoPage({{ $paginator->lastPage() }})" 
            class="ti-btn ti-btn-outline-secondary !py-1 !px-2 text-sm" 
            @if($paginator->onLastPage()) disabled @endif
        >
            <i class="ti ti-chevrons-right"></i>
        </button>
    </div>
</div>
