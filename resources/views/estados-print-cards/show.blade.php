@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalle de Estado de PrintCard: {{ $estado->nombre }}</h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Información del Estado</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $estado->id }}</p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Nombre</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $estado->nombre }}</p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Color</label>
                        <p class="form-control border border-slate-200 min-h-9">
                            @if($estado->color)
                                <span class="inline-block px-2 py-1 rounded text-white bg-{{ $estado->color }}-500">{{ $estado->color }}</span>
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Activo</label>
                        <p class="form-control border border-slate-200 min-h-9">
                            @if($estado->activo)
                                <span class="text-green-600 font-bold">Sí</span>
                            @else
                                <span class="text-red-600 font-bold">No</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="box-footer flex justify-end">
                @can('estados-print-cards-edit')
                    <a href="{{ route('estados-print-cards.edit', $estado) }}" class="ti-btn ti-btn-primary mr-2">Editar</a>
                @endcan
                <a href="{{ route('estados-print-cards.index') }}" class="ti-btn ti-btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
