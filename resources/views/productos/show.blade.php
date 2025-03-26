@extends('layouts.master')

@section('styles')

        <!-- Choices Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">

@endsection

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">Detalles del Producto</h3>
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
                    <div class="md:col-span-2 col-span-12 mb-4">
                        <label class="form-label">Código (SKU)</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->sku }}</p>
                    </div>
                    <div class="md:col-span-7 col-span-12 mb-4">
                        <label class="form-label">Descripción</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->descripcion }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Unidad de medida de ventas</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->unidadMedida->nombre }}</p>
                    </div>
                </div>
            </div>

            <div class="box-header justify-between">
                <div class="box-title">Información del producto</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Categoria</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->categoria->nombre }}</p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Nombre Corto</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->nombre_corto }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Proveedor</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->proveedor->nombre }}</p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Familia de producto</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->familia->nombre }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Color</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->color->nombre }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Tamaño</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->tamano->nombre }}</p>
                    </div>

                    
                </div>
            </div>

            <div class="box-header justify-between">
                <div class="box-title">Códigos de barras y Contenidos</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Código de barras Primario</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->codigo_barras_primario }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Código de barras secundario</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->codigo_barras_secundario }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Código de barras terciario</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->codigo_barras_terciario }}</p>
                    </div>
                    <div class="md:col-span-3 col-span-12 mb-4">
                        <label class="form-label">Código de barras cuaternario</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->codigo_barras_cuaternario }}</p>
                    </div>
                    <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Código de barras master</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->codigo_barras_master }}</p>
                    </div>
                    <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Multiplos por Master</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->multiplos_master }}</p>
                    </div>
                    <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Contenido de la Tarima</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->cupo_tarima }}</p>
                    </div>
                    <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Requiere peso</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->requiere_peso ? 'Sí' : 'No'  }}</p>
                    </div>
                    <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Peso</label>
                        <p class="form-control border border-slate-200  min-h-9">{{ $producto->peso  }}</p>
                    </div>
                    <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Variación en el peso</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $producto->variacion_peso  }}</p>
                    </div>
                    
                    <div class="flex justify-end md:col-span-12 col-span-12">
                        <a href="{{route('productos.index')}}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('scripts')

<!-- Modal JS -->
@vite('resources/assets/js/modal.js')

@endsection
