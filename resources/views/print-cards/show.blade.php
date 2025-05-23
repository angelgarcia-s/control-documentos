@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalle de Tarjeta de Impresión</h3>
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
                <div class="box-title">Datos de la Tarjeta</div>
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
                        <p class="form-control border border-slate-200 min-h-9">{{ $printCard->registro_sanitario }}</p>
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
                @if($printCard->revisiones->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full bg-white table-auto whitespace-nowrap border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="py-3 px-6 text-left border">Revisión</th>
                                <th class="py-3 px-6 text-left border">Estado</th>
                                <th class="py-3 px-6 text-left border">Revisor</th>
                                <th class="py-3 px-6 text-left border">Fecha</th>
                                <th class="py-3 px-6 text-left border">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($printCard->revisiones->sortByDesc('revision') as $revision)
                            <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="py-3 px-6 border">{{ $revision->revision }}</td>
                                <td class="py-3 px-6 border">
                                    <span class="px-2 py-1 rounded-full
                                        @if($revision->estado == 'Aprobado') bg-green-100 text-green-800
                                        @elseif($revision->estado == 'Rechazado') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ $revision->estado }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 border">{{ $revision->revisor->name ?? 'N/A' }}</td>
                                <td class="py-3 px-6 border">{{ $revision->fecha_revision ? \Carbon\Carbon::parse($revision->fecha_revision)->format('d/m/Y H:i') : 'N/A' }}</td>

                                <td class="py-3 px-6 border">
                                    <div class="flex items-center space-x-2">
                                        @can('print-card-revisiones-show')
                                            @if($revision->pdf_path)
                                            <a href="{{ asset('storage/' . $revision->pdf_path) }}" target="_blank" class="text-red-700">
                                                <i class="bi bi-file-pdf text-lg mr-1"></i>
                                            </a>
                                            @else
                                            -
                                            @endif
                                        @endcan
                                        @can('print-card-revisiones-show')
                                        <a href="{{ route('print-card-revisiones.show', $revision) }}" class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        @endcan
                                        @can('print-card-revisiones-edit')
                                        <a href="{{ route('print-card-revisiones.edit', $revision) }}" class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                        @endcan
                                        @can('print-card-revisiones-destroy')
                                        <form action="{{ route('print-card-revisiones.destroy', $revision) }}" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta revisión?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ti-btn text-lg text-rose-400 !py-1 !px-1 ti-btn-wave">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="p-4 text-center">
                    <p class="text-gray-500">No hay revisiones para esta tarjeta de impresión.</p>
                    @can('print-card-revisiones-create')
                    <a href="{{ route('print-card-revisiones.create', $printCard) }}" class="ti-btn ti-btn-primary mt-2">
                        <i class="ri-add-line mr-1"></i> Crear la primera revisión
                    </a>
                    @endcan
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
