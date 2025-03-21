@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                        <span>{!! __('Mostrando') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('a') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('de') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('resultados') !!}</span>
                    </p>
                </div>

                <div class="flex items-center space-x-2">
                    <!-- Botón Primera -->
                    @if ($paginator->onFirstPage())
                        <button type="button" disabled class="ti-btn ti-btn-outline border-gray-300 py-2 ms-3 ti-btn-wave opacity-50 cursor-not-allowed">
                            <i class="fa-solid fa-backward-fast fa-md"></i>
                        </button>
                    @else
                        <button type="button" wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="ti-btn ti-btn-outline border-gray-300 py-2 ms-3 ti-btn-wave opacity-50">
                            <i class="fa-solid fa-backward-fast fa-md"></i>
                        </button>
                    @endif

                    <!-- Botón Anterior -->
                    @if ($paginator->onFirstPage())
                        <button type="button" disabled class="ti-btn ti-btn-outline border-gray-300 py-2 ti-btn-wave opacity-50 cursor-not-allowed">
                            <i class="fa-solid fa-backward fa-md"></i>
                        </button>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="ti-btn ti-btn-outline border-gray-300 py-2 ti-btn-wave opacity-50">
                            <i class="fa-solid fa-backward fa-md"></i>
                        </button>
                    @endif

                    <!-- Cuadro de texto para página -->
                    <input type="number" wire:model.live="page.{{ $paginator->getPageName() }}" 
                           class="ti-form-input w-16 text-sm px-2 py-1 border rounded text-center"
                           min="1" max="{{ $paginator->lastPage() }}"
                           placeholder="{{ $paginator->currentPage() }}">

                    <span class="text-sm text-gray-700 dark:text-gray-300">de {{ $paginator->lastPage() }}</span>

                    <!-- Botón Siguiente -->
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="ti-btn ti-ti-btn-outline border-gray-300 py-2 ti-btn-wave opacity-50">
                            <i class="fa-solid fa-forward fa-md"></i>
                        </button>
                    @else
                        <button type="button" disabled class="ti-btn ti-btn-outline border-gray-300 py-2 ti-btn-wave opacity-50 cursor-not-allowed">
                            <i class="fa-solid fa-forward fa-md"></i>
                        </button>
                    @endif

                    <!-- Botón Última -->
                    @if ($paginator->onLastPage())
                        <button type="button" disabled class="ti-btn ti-btn-outline border-gray-300 py-2 ti-btn-wave opacity-50 cursor-not-allowed">
                            <i class="fa-solid fa-forward-fast fa-md"></i>
                        </button>
                    @else
                        <button type="button" wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="ti-btn titi-btn-outline border-gray-300 py-2 ti-btn-wave opacity-50">
                            <i class="fa-solid fa-forward-fast fa-md"></i>
                        </button>
                    @endif
                </div>
            </div>
        </nav>
    @endif
</div>