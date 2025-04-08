@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear Código de Barra</h3>
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

<form action="{{ route('codigos-barras.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Código de Barra</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Tipo</label>
                            <select name="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                <option value="EAN13" {{ old('tipo') == 'EAN13' ? 'selected' : '' }}>EAN13</option>
                                <option value="ITF14" {{ old('tipo') == 'ITF14' ? 'selected' : '' }}>ITF14</option>
                            </select>
                            @error('tipo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Código</label>
                            <input type="text" name="codigo" value="{{ old('codigo') }}" required class="form-control @error('codigo') is-invalid @enderror">
                            @error('codigo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Producto</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" required class="form-control @error('nombre') is-invalid @enderror" placeholder="Ej. Plus Azul Chico">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Tipo de Empaque</label>
                            <select name="tipo_empaque" class="form-control @error('tipo_empaque') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($tiposEmpaque as $tipo)
                                    <option value="{{ $tipo->nombre }}" {{ old('tipo_empaque') == $tipo->nombre ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('tipo_empaque') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Empaque</label>
                            <select name="empaque" class="form-control @error('empaque') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach ($empaques as $empaque)
                                    <option value="{{ $empaque->nombre }}" {{ old('empaque') == $empaque->nombre ? 'selected' : '' }}>{{ $empaque->nombre }}</option>
                                @endforeach
                            </select>
                            @error('empaque') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Contenido</label>
                            <input type="text" name="contenido" value="{{ old('contenido') }}" class="form-control @error('contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                            @error('contenido') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="flex justify-end md:col-span-12 col-span-12">
                            <a href="{{ route('codigos-barras.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                            <button type="submit" class="ti-btn ti-btn-primary-full">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
    @vite('resources/assets/js/modal.js')
@endsection