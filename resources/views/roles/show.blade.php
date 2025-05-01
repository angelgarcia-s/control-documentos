@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles del Rol</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Información del Rol {{ $role->name }}</div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Nombre</label>
                        <input type="text" value="{{ $role->name }}" class="form-control" disabled>
                    </div>
                    <div class="md:col-span-12 col-span-12 mb-4">
                        <label class="form-label">Permisos</label>
                        <input type="text" value="{{ $permissions->pluck('name')->implode(', ') ?: '-' }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="box-footer text-right">
                <a href="{{ route('roles.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Volver</a>
                @can('editar-roles')
                    <a href="{{ route('roles.edit', $role) }}" class="ti-btn ti-btn-primary-full">Editar</a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
