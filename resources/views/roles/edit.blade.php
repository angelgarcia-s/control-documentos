@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Rol</h3>
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

<form action="{{ route('roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Formulario de Edición de {{ $role->name }}</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label for="name" class="form-label">Nombre del Rol</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label for="permissions" class="form-label">Permisos</label>
                            <select name="permissions[]" id="permissions" class="form-control @error('permissions') is-invalid @enderror" multiple required>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('roles.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar Rol</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
