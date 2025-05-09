@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Lista de Permisos</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif

@if (session('error'))
    <x-alert type="danger" :message="session('error')" />
@endif

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Permisos</div>
                @can('permisos-edit')
                    <a href="{{ route('categorias-permisos.edit') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Editar Nombres de Categorías</a>
                @endcan
            </div>
            <div class="box-body">
                @livewire('permisos-table')
            </div>
        </div>
    </div>
</div>
@endsection
