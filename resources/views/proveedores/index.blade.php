@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <x-breadcrumbs />
    </div>
    <!-- Page Header Close -->
    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Proveedores</h5>
                </div>
                <div class="box-body space-y-3">
                    <div class="flex justify-between">
                        <div>
                            @can('proveedores-create')
                                <a href="{{ route('proveedores.create') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Agregar Nuevo Proveedor</a>
                            @endcan
                        </div>
                        <div class="space-x-2">
                            @can('proveedores-import')
                                <button type="button" class="ti-btn ti-btn-primary" id="import-xlsx">Importar</button>
                            @endcan
                            @can('proveedores-download')
                                <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">Descargar</button>
                            @endcan
                        </div>
                    </div>

                    <!-- Componente Livewire -->
                    @livewire('proveedores-table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- XLXS JS -->
    <script src="{{ asset('build/assets/libs/xlsx/xlsx.full.min.js') }}"></script>

    <!-- JSPDF JS -->
    <script src="{{ asset('build/assets/libs/jspdf/jspdf.umd.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jspdf-autotable/jspdf.plugin.autotable.min.js') }}"></script>
@endsection
