@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles del Tipo de Empaque</h3>
    </div>
    <x-breadcrumbs />
</div>
<!-- Page Header Close -->

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Tipo de Empaque: {{ $clasificacionEnvase->nombre }}</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-1 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $clasificacionEnvase->id }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Orden</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $clasificacionEnvase->orden }}</p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Nombre</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $clasificacionEnvase->nombre }}</p>
                    </div>
                </div>

                <div class="flex justify-end md:col-span-12 col-span-12">
                    @can('clasificaciones-envases-edit')
                        <a href="{{ route('clasificaciones-envases.edit', $clasificacionEnvase) }}" class="ti-btn ti-btn-info-full ml-2 !mb-0">Editar</a>
                    @endcan
                    <a href="{{ route('clasificaciones-envases.index') }}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
