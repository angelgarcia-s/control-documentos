@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex mb-4">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            Detalles de la Revisión
        </h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 md:col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">PrintCard: {{ $printCardRevision->printCard->nombre }} Versión {{ $printCardRevision->revision }}</div>
            </div>
            <div class="box-body">
                <div class="flex items-center gap-2 text-sm mb-4">
                    <span class="inline-block px-3 py-1 rounded-full text-xs bg-{{ $printCardRevision->estadoPrintCard->color ?? '#f3f4f6' }}-500 text-white">
                        {{ $printCardRevision->estadoPrintCard->nombre ?? 'Sin estado' }}
                    </span>
                    <span class="text-gray-500">
                        Revisado por: {{ $printCardRevision->revisor->name ?? 'N/A' }}
                    </span>
                    <span class="text-gray-500">
                        Fecha: {{ $printCardRevision->fecha_revision ? Carbon\Carbon::parse($printCardRevision->fecha_revision)->format('d/M/Y') : 'N/A' }}
                    </span>
                </div>
                <div class="grid grid-cols-12 gap-6 mb-6">
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label mb-2">Historial de la Revisión</label>
                        <p class="form-control border border-slate-200 min-h-9"> {{ $printCardRevision->historial_revision ?? 'Sin historial registrado' }}</p>
                    </div>
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label mb-2">Notas</label>
                        <p class="form-control border border-slate-200 min-h-9"> {{ $printCardRevision->notas ?? 'Sin notas' }}</p>
                    </div>
                </div>
                @if($printCardRevision->pdf_path)
                <div class="mb-6">
                    <label class="form-label mb-2">Documento PDF</label>
                    <div class="flex items-center gap-2">
                        <a href="{{ asset('storage/' . $printCardRevision->pdf_path) }}" target="_blank"
                           class="ti-btn ti-btn-primary flex items-center">
                            <i class="bi bi-file-pdf text-lg mr-1"></i> Ver PDF
                        </a>
                        <a href="{{ asset('storage/' . $printCardRevision->pdf_path) }}" download
                           class="ti-btn ti-btn-outline-primary flex items-center">
                            <i class="ri-download-line text-lg mr-1"></i> Descargar PDF
                        </a>
                    </div>
                </div>
                @else
                <div class="mb-6">
                    <h5 class="form-label mb-2">Documento PDF</h5>
                    <p class="text-gray-500">No hay PDF asociado a esta revisión.</p>
                </div>
                @endif
                <div class="flex justify-end mt-6">
                    <div class="flex gap-2">
                        @can('print-card-revisiones-edit')
                        <a href="{{ route('print-card-revisiones.edit', $printCardRevision) }}" class="ti-btn ti-btn-info-full ml-2 !mb-0"> Editar</a>
                        @endcan

                    </div>
                    <div>
                        <a href="{{ route('print-cards.show', $printCardRevision->printCard) }}" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
