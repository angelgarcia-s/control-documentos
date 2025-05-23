@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear Nuevo Permiso</h3>
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

<form action="{{ route('permisos.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Formulario de Creación de Permiso</div>
                    <div>
                        <a href="{{ route('permisos.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Guardar Permiso</button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label for="name" class="form-label">Nombre del Permiso</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" required>
                            @error('description') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label for="category" class="form-label">Categoría</label>
                            <input type="text" name="category" id="category" value="{{ old('category') }}" class="form-control @error('category') is-invalid @enderror" required>
                            @error('category') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
