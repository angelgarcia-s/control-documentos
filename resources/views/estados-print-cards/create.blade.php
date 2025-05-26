@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear Estado de PrintCard</h3>
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

@can('estados-print-cards-create')
<form action="{{ route('estados-print-cards.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Nuevo Estado</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" required class="form-control @error('nombre') is-invalid @enderror">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Color (Tailwind, ej: red, green, blue)</label>
                            <input type="text" name="color" value="{{ old('color') }}" class="form-control @error('color') is-invalid @enderror">
                            @error('color') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Activo</label>
                            <select name="activo" class="form-control @error('activo') is-invalid @enderror">
                                <option value="1" {{ old('activo', 1) == 1 ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('activo', 1) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                            @error('activo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer flex justify-end">
                    <a href="{{ route('estados-print-cards.index') }}" class="ti-btn ti-btn-secondary mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endcan
@endsection
