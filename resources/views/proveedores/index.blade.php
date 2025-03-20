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
                    <h5 class="box-title">Proveedores</h5>
                </div>
                <div class="box-body space-y-3">
                    <div class="flex justify-between">
                        <div>
                            <a href="{{ route('proveedores.create') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Agregar Nuevo Proveedor</a>
                        </div>
                        <div>
                            <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">Descargar</button>
                        </div>
                    </div>
                    
                    
                    <!-- Componente Livewire que maneja la tabla -->
                    @livewire('proveedores-table')
                    
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