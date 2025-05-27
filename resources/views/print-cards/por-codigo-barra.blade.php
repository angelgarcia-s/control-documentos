@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            PrintCards asociados al producto y empaque:
    </div>
    <x-breadcrumbs />
</div>
@if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif
@if (session('error'))
    <x-alert type="danger" :message="session('error')" />
@endif
<div class="box mb-6">
    <div class="box-header">
        <div class="box-title">SKU: <span class="text-lg">{{ $productoCodigoBarra->producto->sku ?? '-' }}</span></div>
        <div class="box-title">Producto: <span class="text-lg">{{ $productoCodigoBarra->producto->nombre_corto ?? '-' }}</span></div>
        <div class="box-title">Código de barras: <span class="text-lg">{{ $productoCodigoBarra->codigoBarra->codigo ?? '-' }}</span></div>
        <div class="box-title">Clasificación envase: <span class="text-lg">{{ $productoCodigoBarra->clasificacion_envase ?? '-' }}</span></div>
    </div>
</div>
<div class="box">
    <div class="box-header flex justify-between">
        <div class="box-title">PrintCards asociados</div>
        @can('print-cards-create')
        <a href="{{ route('print-cards.create') }}" class="ti-btn ti-btn-primary">
            <i class="ri-add-line mr-1"></i> Nuevo PrintCard
        </a>
        @endcan
    </div>
    <div class="box-body">
        @livewire('print-cards-table', [
            'productoCodigoBarra' => $productoCodigoBarra,
            'columnasPersonalizadas' => [
                'id', 'nombre', 'revision', 'estado', 'proveedor', 'registro_sanitario', 'fecha'
            ]
        ])
        <div class="flex justify-end md:col-span-12 col-span-12">
            <a href="{{ url()->previous() }}" class="ti-btn ti-btn-primary-full mt-6">Regresar</a>
        </div>
    </div>
</div>
@endsection
