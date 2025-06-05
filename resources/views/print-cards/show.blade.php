@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalle de la PrintCard</h3>
    </div>
    <x-breadcrumbs />
</div>
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
                <div class="box-title">Datos de la PrintCard:   {{ $printCard->nombre }} </div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-1 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->id }}</p>
                    </div>
                    <div class="md:col-span-5 col-span-12 mb-4">
                        <label class="form-label">Producto</label>
                        <p class="form-control border border-slate-200 min-h-9">
                            {{ $printCard->productoCodigoBarra->producto->nombre_corto ?? $printCard->productoCodigoBarra->producto->nombre ?? '-' }}
                            ({{ $printCard->productoCodigoBarra->codigoBarra->codigo ?? '-' }})
                            - {{ $printCard->productoCodigoBarra->clasificacion_envase ?? '-' }}
                        </p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Nombre del PrintCard (código específico)</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->nombre }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Proveedor</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->proveedor->nombre ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Registro Sanitario</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->registro_sanitario ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Creado por</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->creador->name ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Fecha</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->fecha ? \Carbon\Carbon::parse($printCard->fecha)->format('d/m/Y') : '-' }}</p>
                    </div>
                    <div class="md:col-span-12 col-span-12 mb-4">
                        <label class="form-label">Notas</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->notas }}</p>
                    </div>
                </div>
                <div class="flex justify-end md:col-span-12 col-span-12">
                    @can('print-cards-edit')
                        <a href="{{ route('print-cards.edit', $printCard) }}" class="ti-btn ti-btn-info-full ml-2 !mb-0">Editar</a>
                    @endcan
                    <a href="{{ route('print-cards.index') }}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Revisiones -->
    <div class="col-span-12">
        <div class="box">
            <div class="box-header flex justify-between">
                <div class="box-title">Revisiones</div>
                @can('print-card-revisiones-create')
                <a href="{{ route('print-card-revisiones.create', $printCard) }}" class="ti-btn ti-btn-primary">
                    <i class="ri-add-line mr-1"></i> Nueva Revisión
                </a>
                @endcan
            </div>
            <div class="box-body">
                @livewire('print-card-revisiones-por-print-card', ['printCardId' => $printCard->id])
            </div>
        </div>
    </div>
</div>
@endsection
