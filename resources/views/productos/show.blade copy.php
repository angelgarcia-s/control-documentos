@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/prismjs/themes/prism-coy.min.css') }}">
@endsection

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles del Producto {{ $producto->nombre_corto }}</h3>
    </div>
    <x-breadcrumbs />
</div>
<!-- Page Header Close -->

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Datos SAP</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-1 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->id }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código (SKU)</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->sku }}</p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Descripción</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->descripcion }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Unidad de medida</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->id_unidad_medida ? $producto->unidadMedida->nombre : '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="box-header justify-between">
                <div class="box-title">Información del producto</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Categoría</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->id_categoria ? $producto->categoria->nombre : '-' }}</p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Nombre Corto</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->nombre_corto }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Proveedor</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->id_proveedor ? $producto->proveedor->nombre : '-' }}</p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Familia de producto</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->familia ? $producto->familia->nombre : '-' }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Color</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->color ? $producto->color->nombre : '-' }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Tamaño</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->tamano ? $producto->tamano->nombre : '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="box-header justify-between">
                <div class="box-title">Códigos de barras y Contenidos</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código de barras Primario</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código de barras Secundario</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código de barras Terciario</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Código de barras Cuaternario</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código de barras Master</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Múltiplos Master</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Contenido de la Tarima</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->cupo_tarima }}</p>
                    </div>
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Peso</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->peso }}</p>
                    </div>
                </div>

                <div class="flex justify-end md:col-span-12 col-span-12">
                    @can('productos-edit')
                        <a href="{{ route('productos.edit', $producto) }}" class="ti-btn ti-btn-info-full ml-2 !mb-0">Editar</a>
                    @endcan
                    <a href="{{ route('productos.index') }}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
