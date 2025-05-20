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
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Familia: {{ $familia->nombre }}</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('familias.update', $familia) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Editar Familia</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $familia->nombre) }}" required class="form-control @error('nombre') is-invalid @enderror">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Categoría</label>
                            <select name="id_categoria" class="form-control @error('id_categoria') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('id_categoria', $familia->id_categoria) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_categoria') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-5 col-span-12 mb-4">
                            <label class="form-label">Descripción</label>
                            <input name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $familia->descripcion) }}</input>
                            @error('descripcion') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Imagen</label>
                            <input type="file" name="imagen" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-lg text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/50 file:border-0 file:bg-light file:me-4 file:py-3 file:px-4 dark:file:bg-black/20 dark:file:text-white/50 @error('imagen') is-invalid @enderror">
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">

                            <input type="hidden" name="eliminar_imagen" id="eliminar_imagen" value="0">
                            @if($familia->imagen)
                                <div id="imagen-preview" class="inline-block ml-3 relative">
                                    <img src="{{ asset('storage/' . $familia->imagen) }}" alt="{{ $familia->nombre }}" class="w-32 h-32 object-cover rounded">
                                    <button type="button"
                                        class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs shadow-lg hover:bg-red-700"
                                        title="Eliminar imagen"
                                        onclick="eliminarImagenPreview()">
                                        &times;
                                    </button>
                                </div>
                            @endif
                            @error('imagen') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="flex justify-end">
                        <a href="{{ route('familias.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')

        <!-- DropZone File Upload JS -->
        <script src="{{asset('build/assets/libs/dropzone/dropzone-min.js')}}"></script>

        <!-- Filepond File Upload JS -->
        <script src="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
        {{-- <script src="{{asset('build/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script> --}}
        <script src="{{asset('build/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond/filepond.min.js')}}"></script>
        @vite('resources/assets/js/fileupload.js')

<script>
    function eliminarImagenPreview() {
        document.getElementById('eliminar_imagen').value = 1;
        const preview = document.getElementById('imagen-preview');
        if (preview) {
            preview.style.display = 'none';
        }
    }
</script>
@endsection
