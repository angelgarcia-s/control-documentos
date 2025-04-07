@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles de Asignación</h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Asignación</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->id }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">SKU Producto</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->producto->sku }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Producto</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->producto->descripcion }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->codigoBarra->codigo }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Nombre Código</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->codigoBarra->nombre }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Tipo de Empaque</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->tipo_empaque }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Contenido</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $asignacion->contenido ?? 'N/A' }}</p>
                    </div>
                </div>
                
                <div class="flex justify-end md:col-span-12 col-span-12">
                    <a href="{{ route('producto-codigos-barras.edit', $asignacion) }}" class="ti-btn ti-btn-info-full ml-2 !mb-0">Editar</a>
                    <a href="{{ route('producto-codigos-barras.index') }}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection