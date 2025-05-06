@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Permiso: {{ $permission->name }}</h3>
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

<form action="{{ route('permisos.update', $permission) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Edición de Permiso</div>
                </div>
                <div class="box-body">
                    <div class="text-sm text-gray-500 font-light pb-3">
                        <p>Solo se pueden editar la Descripción y la Categoría</p>
                    </div>
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label for="name" class="form-label">Nombre del Permiso</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $permission->name) }}" class="form-control" readonly disabled>
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" name="description" id="description" value="{{ old('description', $permission->description) }}" class="form-control @error('description') is-invalid @enderror" required>
                            @error('description') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label for="category" class="form-label">Categoría</label>
                            <input type="text" name="category" id="category" value="{{ old('category', $permission->category) }}" class="form-control @error('category') is-invalid @enderror" required>
                            @error('category') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('permisos.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
