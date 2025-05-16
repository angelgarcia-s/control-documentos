@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles de la Familia: {{ $familia->nombre }}</h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Información de la Familia</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">ID</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $familia->id }}</p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Nombre</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $familia->nombre }}</p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Categoría</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $familia->categoria->nombre ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-4 col-span-12 mb-4">
                        <label class="form-label">Imagen</label>
                        <div class="border border-slate-200 rounded-lg p-2">
                            @if($familia->imagen)
                                <img src="{{ asset('storage/' . $familia->imagen) }}" alt="{{ $familia->nombre }}" class="w-32 h-32 object-cover rounded">
                            @else
                                <p class="text-gray-500">Sin imagen</p>
                            @endif
                        </div>
                    </div>
                    <div class="md:col-span-8 col-span-12 mb-4">
                        <label class="form-label">Descripción</label>
                        <p class="form-control border border-slate-200 min-h-9">{{ $familia->descripcion ?? '-' }}</p>
                    </div>

                </div>
            </div>
            <div class="box-footer">
                <div class="flex justify-end">
                    <a href="{{ route('familias.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
