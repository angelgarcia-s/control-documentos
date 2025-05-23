@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex mb-4">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            Nueva Revisión para PrintCard: {{ $printCard->nombre }}
        </h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="bg-white dark:bg-bodybg rounded-md p-6 shadow-sm">
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif
    @if ($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form action="{{ route('print-card-revisiones.store', $printCard) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="print_card_id" value="{{ $printCard->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="revision" class="form-label">Número de Revisión <span class="text-red-500">*</span></label>
                <input type="number" name="revision" id="revision"
                    class="form-control @error('revision') is-invalid @enderror"
                    value="{{ old('revision', $revisionSugerida) }}" min="0" required>
                @error('revision')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="estado" class="form-label">Estado <span class="text-red-500">*</span></label>
                <select name="estado" id="estado"
                    class="form-control @error('estado') is-invalid @enderror" required>
                    <option value="En revisión" {{ old('estado') == 'En revisión' ? 'selected' : '' }}>En revisión</option>
                    <option value="Aprobado" {{ old('estado') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                    <option value="Rechazado" {{ old('estado') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                </select>
                @error('estado')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="pdf_path" class="form-label">Archivo PDF <span class="text-red-500">*</span></label>
            <input type="file" name="pdf_path" id="pdf_path"
                class="form-control @error('pdf_path') is-invalid @enderror"
                accept=".pdf" required>
            @error('pdf_path')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="notas" class="form-label">Notas</label>
            <textarea name="notas" id="notas" rows="4"
                class="form-control @error('notas') is-invalid @enderror">{{ old('notas') }}</textarea>
            @error('notas')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="historial_revision" class="form-label">Historial de la Revisión</label>
            <textarea name="historial_revision" id="historial_revision" rows="4"
                class="form-control @error('historial_revision') is-invalid @enderror">{{ old('historial_revision') }}</textarea>
            @error('historial_revision')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ url()->previous() }}" class="ti-btn ti-btn-secondary-full ml-2 !mb-0">Cancelar </a>
            <button type="submit" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Guardar Revisión</button>

        </div>
    </form>
</div>
@endsection
