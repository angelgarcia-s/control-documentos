@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex mb-4">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            Detalles de la Revisión #{{ $printCardRevision->revision }}
        </h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="bg-white dark:bg-bodybg rounded-md p-6 shadow-sm">
    <div class="border-b pb-4 mb-4">
        <h4 class="text-xl font-semibold mb-2">
            PrintCard: {{ $printCardRevision->printCard->nombre }}
        </h4>
        <div class="flex items-center gap-2 text-sm">
            <span class="px-2 py-1 rounded-full
                @if($printCardRevision->estado == 'Aprobado') bg-green-100 text-green-800
                @elseif($printCardRevision->estado == 'Rechazado') bg-red-100 text-red-800
                @else bg-yellow-100 text-yellow-800
                @endif">
                {{ $printCardRevision->estado }}
            </span>

            <span class="text-gray-500">
                Revisado por: {{ $printCardRevision->revisor->name ?? 'N/A' }}
            </span>

            <span class="text-gray-500">
                Fecha: {{ $printCardRevision->fecha_revision ? Carbon\Carbon::parse($printCardRevision->fecha_revision)->format('d/m/Y H:i') : 'N/A' }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <h5 class="font-semibold mb-2">Notas</h5>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-md min-h-[100px]">
                {{ $printCardRevision->notas ?? 'Sin notas' }}
            </div>
        </div>

        <div>
            <h5 class="font-semibold mb-2">Historial de la Revisión</h5>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-md min-h-[100px]">
                {{ $printCardRevision->historial_revision ?? 'Sin historial registrado' }}
            </div>
        </div>
    </div>

    @if($printCardRevision->pdf_path)
    <div class="mb-6">
        <h5 class="font-semibold mb-2">Documento PDF</h5>
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
        <h5 class="font-semibold mb-2">Documento PDF</h5>
        <p class="text-gray-500">No hay PDF asociado a esta revisión.</p>
    </div>
    @endif

    <div class="flex justify-between mt-6">
        <div>
            <a href="{{ route('print-cards.show', $printCardRevision->printCard) }}" class="ti-btn ti-btn-secondary">Volver a PrintCard</a>
        </div>

        <div class="flex gap-2">
            @can('print-card-revisiones-edit')
            <a href="{{ route('print-card-revisiones.edit', $printCardRevision) }}" class="ti-btn ti-btn-primary"> Editar</a>
            @endcan

            @can('print-card-revisiones-destroy')
            <form action="{{ route('print-card-revisiones.destroy', $printCardRevision) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta revisión?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="ti-btn ti-btn-danger"> Eliminar</button>
            </form>
            @endcan
        </div>
    </div>
</div>
@endsection
