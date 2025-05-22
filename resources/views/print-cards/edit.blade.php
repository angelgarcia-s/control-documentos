@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Tarjeta de Impresión</h3>
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
<form action="{{ route('print-cards.update', $printCard) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Datos de la Tarjeta</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-1 col-span-12 mb-4">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" value="{{ $printCard->id }}" disabled>
                        </div>
                        <div class="md:col-span-5 col-span-12 mb-4">
                            <label class="form-label">Producto</label>
                            <select name="producto_codigo_barra_id" id="producto_codigo_barra_id" class="form-control" required>
                                <option value="">Seleccione...</option>
                                @foreach($productosCodigosBarras as $producto)
                                    <option value="{{ $producto->id }}" {{ (old('producto_codigo_barra_id', $printCard->producto_codigo_barra_id) == $producto->id) ? 'selected' : '' }}>
                                        {{ $producto->producto->nombre_corto ?? $producto->producto->nombre }}
                                        ({{ $producto->codigoBarra->codigo ?? 'SIN CÓDIGO' }})
                                        - {{ $producto->clasificacion_envase }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Nombre del PrintCard (código específico)</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $printCard->nombre) }}" required maxlength="255">
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Estado</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="En proyecto" {{ (old('status', $printCard->status) == 'En proyecto') ? 'selected' : '' }}>En proyecto</option>
                                <option value="Activo" {{ (old('status', $printCard->status) == 'Activo') ? 'selected' : '' }}>Activo</option>
                                <option value="Discontinuado" {{ (old('status', $printCard->status) == 'Discontinuado') ? 'selected' : '' }}>Discontinuado</option>
                            </select>
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                                <option value="">Seleccione...</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ (old('proveedor_id', $printCard->proveedor_id) == $proveedor->id) ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Registro Sanitario</label>
                            <input type="text" name="registro_sanitario" id="registro_sanitario" class="form-control" value="{{ old('registro_sanitario', $printCard->registro_sanitario) }}" maxlength="255">
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Creado por</label>
                            <input type="text" class="form-control" value="{{ $printCard->creador->name ?? '-' }}" disabled>
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $printCard->fecha ? \Carbon\Carbon::parse($printCard->fecha)->format('Y-m-d') : null) }}">
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label class="form-label">Notas</label>
                            <textarea name="notas" id="notas" class="form-control">{{ old('notas', $printCard->notas) }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <a href="{{ route('print-cards.index') }}" class="ti-btn ti-btn-secondary-full">Cancelar</a>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
