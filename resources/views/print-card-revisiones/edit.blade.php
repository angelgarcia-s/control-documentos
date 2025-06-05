@extends('layouts.master')

@section('styles')

        <!-- Dropzone File Upload  Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/dropzone/dropzone.css')}}">

        <!-- filepond File Upload  Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/filepond/filepond.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">

@endsection

@section('content')
<div class="block justify-between page-header md:flex mb-4">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            Editar Revisión #{{ $printCardRevision->revision }} - PrintCard: {{ $printCardRevision->printCard->nombre }}
        </h3>
    </div>
    <x-breadcrumbs />
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 md:col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Editar Revisión</div>
            </div>
            <div class="box-body">
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
                <form action="{{ route('print-card-revisiones.update', $printCardRevision) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-6 mb-4">
                        <div class="col-span-12 md:col-span-2">
                            <label for="revision" class="form-label">Número de Revisión <span class="text-red-500">*</span></label>
                            <input type="number" name="revision" id="revision"
                                class="form-control @error('revision') is-invalid @enderror"
                                value="{{ old('revision', $printCardRevision->revision) }}" min="0" required>
                            @error('revision')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-12 md:col-span-3">
                            <label for="estado_printcard_id" class="form-label">Estado <span class="text-red-500">*</span></label>
                            <select name="estado_printcard_id" id="estado_printcard_id"
                                class="form-control @error('estado_printcard_id') is-invalid @enderror" required>
                                <option value="">Seleccione un estado</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}" {{ old('estado_printcard_id', $printCardRevision->estado_printcard_id) == $estado->id ? 'selected' : '' }}>
                                        {{ $estado->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estado_printcard_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-12 md:col-span-5">
                            <label for="pdf_path" class="form-label">Archivo PDF</label>
                            <input type="file" name="pdf_path" class="filepond basic-filepond" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1" @error('pdf_path') is-invalid @enderror accept=".pdf">


                            @error('pdf_path')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="historial_revision" class="form-label">Historial de cambios</label>
                            <textarea name="historial_revision" id="historial_revision" rows="4"
                                class="form-control @error('historial_revision') is-invalid @enderror">{{ old('historial_revision', $printCardRevision->historial_revision) }}</textarea>
                            @error('historial_revision')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="notas" class="form-label">Notas</label>
                            <textarea name="notas" id="notas" rows="4"
                                class="form-control @error('notas') is-invalid @enderror">{{ old('notas', $printCardRevision->notas) }}</textarea>
                            @error('notas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <a href="{{ url()->previous() }}" class="ti-btn ti-btn-secondary">
                            <i class="ri-arrow-left-line mr-1"></i> Cancelar
                        </a>
                        <button type="submit" class="ti-btn ti-btn-primary">
                            <i class="ri-save-line mr-1"></i> Actualizar Revisión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

        <!-- DropZone File Upload JS -->
        <script src="{{asset('build/assets/libs/dropzone/dropzone-min.js')}}"></script>

        <!-- Filepond File Upload JS -->
        <script src="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond/filepond.min.js')}}"></script>
        @vite('resources/assets/js/fileupload.js')


@endsection
