@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Nombres de Visualización de Categorías</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        {{ session('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="categorias-permisos-form" action="{{ route('categorias-permisos.update') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Categorías de Permisos</div>
                    <a href="{{ route('permisos.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Guardar</button>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12">
                        <!-- Encabezado -->
                        <div class="col-span-6 mb-3">
                            <div class="border-b border-gray-200 dark:border-gray-600 pb-3">
                                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Categoría Original</div>
                            </div>
                        </div>
                        <div class="col-span-6 mb-3">
                            <div class="border-b border-gray-200 dark:border-gray-600 pb-3">
                                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de Visualización</div>
                            </div>
                        </div>
                        <!-- Tarjetas -->
                        <div id="sortable-categorias" class="col-span-12 flex flex-col">
                            @foreach ($categorias as $categoria)
                                @php
                                    $encodedCategoria = urlencode($categoria);
                                    $displayName = $nombresVisuales[$categoria] ?? ucwords(str_replace('-', ' ', $categoria));
                                    $displayName = str_replace('Codigos', 'Códigos', $displayName);
                                @endphp
                                <div class="col-span-12 box cursor-move border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm hover:shadow-md transition-shadow" data-categoria="{{ $categoria }}">
                                    <div class="grid grid-cols-[1fr_1fr] gap-3 p-2">
                                        <div class="flex items-center gap-3">
                                            <i class="ri-more-2-fill text-2xl text-gray-300 dark:text-gray-400 pl-2"></i>
                                            <p class="text-lg text-gray-500">{{ $categoria }}</p>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="text" name="display_names[{{ $encodedCategoria }}]" value="{{ $displayName }}" class="form-control w-full">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">

                </div>
            </div>
        </div>
    </div>

    <!-- Campo oculto para enviar el orden de las categorías -->
    <input type="hidden" name="orden_categorias" id="orden-categorias">
</form>
@endsection

@section('styles')
    <style>
        /* Resaltar tarjeta al arrastrar */
        #sortable-categorias .sortable-ghost {
            opacity: 0.3; /* Reducimos la opacidad para que sea más opaca */
            background-color: rgba(var(--primary-rgb), 0.2); /* Fondo más visible */
            border: 2px dashed rgb(var(--primary-rgb));
        }
    </style>
@endsection

@section('scripts')
    <!-- Incluir SortableJS desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inicializar SortableJS en el contenedor de tarjetas
            const container = document.getElementById('sortable-categorias');
            Sortable.create(container, {
                animation: 150,
                handle: '.box', // Permitir arrastrar desde cualquier parte de la tarjeta
                ghostClass: 'sortable-ghost', // Clase para resaltar la tarjeta al arrastrar
                onEnd: function (evt) {
                    // Actualizar el campo oculto con el nuevo orden de las categorías
                    const cards = container.querySelectorAll('.box');
                    const ordenCategorias = Array.from(cards).map(card => card.dataset.categoria);
                    document.getElementById('orden-categorias').value = JSON.stringify(ordenCategorias);
                }
            });

            // Asegurarnos de que el campo oculto tenga el orden inicial
            const cardsIniciales = container.querySelectorAll('.box');
            const ordenInicial = Array.from(cardsIniciales).map(card => card.dataset.categoria);
            document.getElementById('orden-categorias').value = JSON.stringify(ordenInicial);
        });
    </script>
@endsection
