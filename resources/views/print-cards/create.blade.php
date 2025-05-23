@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear PrintCard</h3>
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
<form action="{{ route('print-cards.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">PrintCard</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Producto</label>
                            <select class="form-control js-example-basic-single w-full text-xl @error('producto_codigo_barra_id') border-red-500 @enderror" name="producto_codigo_barra_id" id="producto_codigo_barra_id" required>
                                <option value="">Seleccione...</option>
                                @foreach($productosCodigosBarras as $producto)
                                    <option value="{{ $producto->id }}" {{ old('producto_codigo_barra_id') == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->producto->nombre_corto ?? $producto->producto->nombre }}
                                        ({{ $producto->codigoBarra->codigo ?? 'SIN CÓDIGO' }})
                                        - {{ $producto->clasificacion_envase }}
                                    </option>
                                @endforeach
                            </select>
                            @error('producto_codigo_barra_id') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id" class="form-control @error('proveedor_id') border-red-500 @enderror" required>
                                <option value="">Seleccione...</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proveedor_id') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required maxlength="255">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Notas</label>
                            <textarea name="notas" id="notas" class="form-control @error('notas') is-invalid @enderror">{{ old('notas') }}</textarea>
                            @error('notas') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Registro Sanitario</label>
                            <input type="text" name="registro_sanitario" id="registro_sanitario" class="form-control @error('registro_sanitario') is-invalid @enderror" value="{{ old('registro_sanitario') }}" maxlength="255">
                            @error('registro_sanitario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}">
                            @error('fecha') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="flex justify-end md:col-span-12 col-span-12">
                        <a href="{{ route('print-cards.index') }}" class="ti-btn ti-btn-secondary-full ml-2 !mb-0">Cancelar</a>
                        <button type="submit" class="ti-btn ti-btn-primary-full ml-2 !mb-0">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
@vite('resources/assets/js/select2.js')
<script>
    $(document).ready(function() {
        $('#producto_codigo_barra_id').select2({
            placeholder: 'Buscar producto...',
            allowClear: true,
            width: '100%'
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.querySelector('select[data-choices]');
        if (select) {
            new Choices(select, {
                searchEnabled: true,
                itemSelectText: '',
            });
        }
    });
</script>
@endsection
