@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Asignar Códigos de Barras - {{ $producto->sku }}</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
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

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Asignar Nuevo Código</div>
            </div>
            <div class="box-body">
                <form action="{{ route('codigos-barras.asignar.store', $producto->sku) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Código</label>
                            <select name="codigo_barra_id" class="form-control @error('codigo_barra_id') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($codigosDisponibles as $codigo)
                                    <option value="{{ $codigo->id }}" {{ old('codigo_barra_id') == $codigo->id ? 'selected' : '' }}>{{ $codigo->codigo }} ({{ $codigo->nombre }})</option>
                                @endforeach
                            </select>
                            @error('codigo_barra_id') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
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
                            <label class="form-label">Contenido</label>
                            <input type="text" name="contenido" value="{{ old('contenido') }}" class="form-control @error('contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                            @error('contenido') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="flex justify-end md:col-span-12 col-span-12">
                            <a href="{{ route('producto-codigos-barras.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                            <button type="submit" class="ti-btn ti-btn-primary-full">Asignar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box-header">
                <div class="box-title">Códigos Asignados</div>
            </div>
            <div class="box-body">
                @if ($producto->codigosBarras->isEmpty())
                    <p>No hay códigos asignados a este producto.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo de Empaque</th>
                                <th>Contenido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto->codigosBarras as $asignacion)
                                <tr>
                                    <td>{{ $asignacion->codigo }}</td>
                                    <td>{{ $asignacion->pivot->tipo_empaque }}</td>
                                    <td>{{ $asignacion->pivot->contenido ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection