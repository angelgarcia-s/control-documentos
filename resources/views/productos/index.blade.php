@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <ol class="flex items-center whitespace-nowrap min-w-0">
            <li class="text-[0.813rem] ps-[0.5rem]">
                <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                    Inicio
                    <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                </a>
            </li>
        </ol>
    </div>
    <!-- Page Header Close -->

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Productos</h5>
                </div>
                <div class="box-body space-y-3">
                    <div class="flex justify-between">
                        <div>
                            <a href="{{ route('productos.create') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Agregar Nuevo Producto</a>
                        </div>
                        <div>
                            <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">Descargar</button>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('productos.index') }}">
                        <x-table :columns="$columns" route="productos.index" :paginated="$productos">
                            @foreach ($productos as $producto)
                                <tr>
                                    <!-- Columna Acciones al principio -->
                                    <td class="py-3 px-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('productos.show', $producto->id) }}" class="ti-btn ti-btn-outline-primary !py-1 !px-2 ti-btn-w-xs ti-btn-wave">
                                                Ver
                                            </a>
                                            <select class="action-select inline-flex items-center px-2 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" data-producto-id="{{ $producto->id }}">
                                                <option value="">Acción</option>
                                                <option value="codigos">Códigos de barras</option>
                                                <option value="print">PrintCards</option>
                                                <option value="editar">Editar</option>
                                                <option value="borrar">Borrar</option>
                                            </select>
                                        </div>
                                    </td>
                                    <!-- Otras columnas -->
                                    <td class="py-3 px-6 text-left">{{ $producto->id }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->sku }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->familia->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->producto }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->colores->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->tamanos->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->multiplos_master ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->cupo_tarima ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->proveedor->nombre ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </x-table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <!-- Tabulator JS -->
    <script src="{{ asset('build/assets/libs/tabulator-tables/js/tabulator.min.js') }}"></script>

    <!-- Choices JS -->
    <script src="{{ asset('build/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- XLXS JS -->
    <script src="{{ asset('build/assets/libs/xlsx/xlsx.full.min.js') }}"></script>

    <!-- JSPDF JS -->
    <script src="{{ asset('build/assets/libs/jspdf/jspdf.umd.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jspdf-autotable/jspdf.plugin.autotable.min.js') }}"></script>

    <!-- Tabulator Custom JS -->
    @vite('resources/assets/js/datatable.js')
@endsection