@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Lista de Permisos</h3>
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
                <div class="box-title">Permisos</div>
                @can('permisos-create')
                    <a href="{{ route('permisos.create') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Crear Nuevo Permiso</a>
                @endcan
            </div>
            <div class="box-body">
                @livewire('permisos-table')
            </div>
        </div>
    </div>
</div>
@endsection
