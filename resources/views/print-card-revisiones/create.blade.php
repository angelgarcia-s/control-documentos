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
                <label for="revision" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Número de Revisión <span class="text-red-500">*</span>
                </label>
                <input type="number" name="revision" id="revision"
                    class="ti-form-input @error('revision') border-red-500 @enderror"
                    value="{{ old('revision', 1) }}" min="1" required>
                @error('revision')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Estado <span class="text-red-500">*</span>
                </label>
                <select name="estado" id="estado"
                    class="ti-form-select @error('estado') border-red-500 @enderror" required>
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
            <label for="pdf_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Archivo PDF <span class="text-red-500">*</span>
            </label>
            <input type="file" name="pdf_path" id="pdf_path"
                class="ti-form-input @error('pdf_path') border-red-500 @enderror"
                accept=".pdf" required>
            @error('pdf_path')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="notas" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Notas
            </label>
            <textarea name="notas" id="notas" rows="4"
                class="ti-form-input @error('notas') border-red-500 @enderror">{{ old('notas') }}</textarea>
            @error('notas')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="historial_revision" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Historial de la Revisión
            </label>
            <textarea name="historial_revision" id="historial_revision" rows="4"
                class="ti-form-input @error('historial_revision') border-red-500 @enderror">{{ old('historial_revision') }}</textarea>
            @error('historial_revision')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ url()->previous() }}" class="ti-btn ti-btn-secondary">
                <i class="ri-arrow-left-line mr-1"></i> Cancelar
            </a>
            <button type="submit" class="ti-btn ti-btn-primary">
                <i class="ri-save-line mr-1"></i> Guardar Revisión
            </button>
        </div>
    </form>
</div>
@endsection
