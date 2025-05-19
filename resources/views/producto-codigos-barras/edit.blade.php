@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Asignación</h3>
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

<form action="{{ route('producto-codigos-barras.update', $asignacion) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Editar Asignación</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Tipo de Empaque</label>
                            <select name="clasificacion_envase" class="form-control @error('clasificacion_envase') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($tiposEmpaque as $tipo)
                                    <option value="{{ $tipo->nombre }}" {{ old('clasificacion_envase', $asignacion->clasificacion_envase) == $tipo->nombre ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('clasificacion_envase') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Contenido</label>
                            <input type="text" name="contenido" value="{{ old('contenido', $asignacion->contenido) }}" class="form-control @error('contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                            @error('contenido') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('producto-codigos-barras.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
