@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Tipo de Sello</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif
@if (session('error'))
    <x-alert type="danger" :message="session('error')" />
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

<form action="{{ route('tipos-sello.update', $tipo_sello) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Editar Tipo de Sello</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $tipo_sello->nombre) }}" required class="form-control @error('nombre') is-invalid @enderror">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('tipos-sello.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
