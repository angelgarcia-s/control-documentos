@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear Familia</h3>
    </div>
    <x-breadcrumbs />
</div>

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

<form action="{{ route('familias.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Nueva Familia</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" required class="form-control @error('nombre') is-invalid @enderror">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Categoría</label>
                            <select name="id_categoria" class="form-control @error('id_categoria') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('id_categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_categoria') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Imagen</label>
                            <input type="file" name="imagen" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-lg text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/50 file:border-0 file:bg-light file:me-4 file:py-3 file:px-4 dark:file:bg-black/20 dark:file:text-white/50 @error('imagen') is-invalid @enderror">
                            @error('imagen') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion') }}</textarea>
                            @error('descripcion') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="flex justify-end">
                        <a href="{{ route('familias.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
