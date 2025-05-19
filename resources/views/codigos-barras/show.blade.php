@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles del Código de Barras</h3>
    </div>
    <x-breadcrumbs />
</div>
<!-- Page Header Close -->

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Código de Barras: {{ $codigoBarra->codigo }}</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-1 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->id }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Consecutivo</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->consecutivo_codigo }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->codigo }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Nombre</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->nombre }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Tipo de Empaque</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->clasificacion_envase ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Empaque</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->empaque ?? 'N/A' }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Contenido</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->contenido ?? 'N/A' }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Tipo</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $codigoBarra->tipo }}</p>
                    </div>
                </div>

                <div class="flex justify-end md:col-span-12 col-span-12">
                    @can('codigos-barras-edit')
                        <a href="{{ route('codigos-barras.edit', $codigoBarra) }}" class="ti-btn ti-btn-info-full ml-2 !mb-0">Editar</a>
                    @endcan
                    <a href="{{ route('codigos-barras.index') }}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
