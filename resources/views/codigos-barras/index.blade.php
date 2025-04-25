@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Códigos de Barra</h5>
            </div>
            <div class="box-body space-y-3">
                <div class="flex justify-between">
                    <div>
                        <a href="{{ route('codigos-barras.create') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Agregar Nuevo Código</a>
                    </div>
                    <div>
                        <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">Descargar</button>
                    </div>
                </div>

                @livewire('codigos-barras-table')
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('build/assets/libs/tabulator-tables/js/tabulator.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/xlsx/xlsx.full.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jspdf/jspdf.umd.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jspdf-autotable/jspdf.plugin.autotable.min.js') }}"></script>
    @vite('resources/assets/js/datatable.js')
@endsection
