@props(['paginator'])

<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="tabulator-footer flex items-center justify-between w-full">
    <!-- Información de registros (izquierda) -->
    <div class="text-sm text-gray-700 leading-5 dark:text-gray-400">
        <!-- Texto Mostrando -->
        <span class="tabulator-page-counter font-normal">
            @if ($paginator->lastPage() == 1)
                Mostrando todos los <span>{{ $paginator->total() }}</span> registros
            @else
                Mostrando 
                @if ($paginator->firstItem())
                    <span>{{ $paginator->firstItem() }}</span> a 
                    <span>{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                de <span>{{ $paginator->total() }}</span> registros
            @endif
        </span>
    </div>

    <!-- Controles de paginación (derecha) -->
    <div class="tabulator-paginator flex items-center space-x-2">
        <!-- Select de per_page -->
        <form action="{{ route('productos.index') }}" method="GET" class="flex items-center">
            <select name="per_page" class="tabulator-page-size inline-flex items-center px-2 py-1 pr-4 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 mx-1" onchange="this.form.submit()">
                @foreach ([10, 25, 50, 100, 200] as $option)
                    <option value="{{ $option }}" {{ $paginator->perPage() == $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
            @foreach (request()->except('per_page') as $key => $value)
                @if (is_array($value))
                    @foreach ($value as $subKey => $subValue)
                        <input type="hidden" name="{{ $key }}[{{ $subKey }}]" value="{{ $subValue }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
        </form>

        <!-- Primera página -->
        @if ($paginator->onFirstPage())
            <span class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-400 rounded cursor-default dark:bg-gray-800 dark:border-gray-600">
                <i class="fa-solid fa-backward-fast"></i>
            </span>
        @else
            <a href="{{ $paginator->url(1) }}" class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700">
                <i class="fa-solid fa-backward-fast"></i>
            </a>
        @endif

        <!-- Anterior -->
        @if ($paginator->onFirstPage())
            <span class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-400 rounded cursor-default dark:bg-gray-800 dark:border-gray-600">
                <i class="fa-solid fa-backward-step"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700">
                <i class="fa-solid fa-backward-step"></i>
            </a>
        @endif

        <!-- Campo de texto para número de página -->
        <form action="{{ route('productos.index') }}" method="GET" class="flex items-center">
            <input type="number" name="page" min="1" max="{{ $paginator->lastPage() }}"
                   value="{{ $paginator->currentPage() }}"
                   class="w-16 px-2 py-2 text-center border rounded ti-form-input text-sm"
                   onchange="this.form.submit()">
            <span class="ml-2 text-sm text-gray-700">de {{ $paginator->lastPage() }}</span>
            @foreach (request()->except('page') as $key => $value)
                @if (is_array($value))
                    @foreach ($value as $subKey => $subValue)
                        <input type="hidden" name="{{ $key }}[{{ $subKey }}]" value="{{ $subValue }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
        </form>

        <!-- Siguiente -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700">
                <i class="fa-solid fa-forward-step"></i>
            </a>
        @else
            <span class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-400 rounded cursor-default dark:bg-gray-800 dark:border-gray-600">
                <i class="fa-solid fa-forward-step"></i>
            </span>
        @endif

        <!-- Última página -->
        @if ($paginator->currentPage() == $paginator->lastPage())
            <span class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-400 rounded cursor-default dark:bg-gray-800 dark:border-gray-600">
                <i class="fa-solid fa-forward-fast"></i>
            </span>
        @else
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="tabulator-page inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700">
                <i class="fa-solid fa-forward-fast"></i>
            </a>
        @endif
    </div>
</nav>

<style>
    .tabulator-footer .tabulator-page {
        margin: 0 2px; /* Espaciado entre botones como en Ynex */
    }
    @media (hover:hover) and (pointer:fine) {
        .tabulator-footer .tabulator-page:not(.cursor-default):hover {
            background: rgba(0, 0, 0, 0.2); /* Hover oscuro de Ynex */
            color: #fff;
            cursor: pointer;
        }
    }
</style>