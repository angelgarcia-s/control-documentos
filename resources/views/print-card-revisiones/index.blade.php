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
                    <h5 class="box-title">Revisiones de PrintCards</h5>
                </div>
                <div class="box-body space-y-3">
                    <div class="flex justify-between">
                        <div>
                            @can('print-card-revisiones-create')
                                <a href="{{ route('print-cards.index') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Ver PrintCards</a>
                            @endcan
                        </div>
                        <div class="space-x-2">
                            @can('print-card-revisiones-import')
                                <button type="button" class="ti-btn ti-btn-primary" id="import-xlsx">Importar</button>
                            @endcan
                            @can('print-card-revisiones-download')
                                <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">Descargar</button>
                            @endcan
                        </div>
                    </div>
                    <!-- Componente Livewire -->
                    <livewire:print-card-revisiones-table />
                </div>
            </div>
        </div>
    </div>
@endsection
