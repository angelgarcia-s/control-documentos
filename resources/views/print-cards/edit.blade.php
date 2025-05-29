@extends('layouts.master')

@section('styles')

        <!-- FlatPickr CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">

@endsection

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar PrintCard </h3>
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
                    <div class="box-title">Datos del PrintCard</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-1 col-span-12 mb-4">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" value="{{ $printCard->id }}" disabled>
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label" for="producto_codigo_barra_id">Producto</label>
                            <select class="form-control js-example-basic-single w-full text-xl @error('producto_codigo_barra_id') is-invalid @enderror" name="producto_codigo_barra_id" id="producto_codigo_barra_id" required>
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
                        <div class="md:col-span-5 col-span-12 mb-4">
                            <label class="form-label" for="nombre">Nombre del PrintCard (código específico)</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $printCard->nombre) }}" required maxlength="255">
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label" for="fecha">Fecha de creación</label>
                            {{-- <input type="date" name="fecha" id="date" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $printCard->fecha ? \Carbon\Carbon::parse($printCard->fecha)->format('d-m-Y') : null) }}"> --}}
                            <div class="input-group">
                                <div class="input-group-text text-[#8c9097] dark:text-white/50"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" name="fecha" id="date" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $printCard->fecha)  }}">
                                @error('fecha') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>

                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label" for="proveedor_id">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id" class="form-control @error('proveedor_id') is-invalid @enderror" required>
                                <option value="">Seleccione...</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ (old('proveedor_id', $printCard->proveedor_id) == $proveedor->id) ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label" for="registro_sanitario">Registro Sanitario</label>
                            <input type="text" name="registro_sanitario" id="registro_sanitario" class="form-control @error('registro_sanitario') is-invalid @enderror" value="{{ old('registro_sanitario', $printCard->registro_sanitario) }}" maxlength="255">
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Creado por</label>
                            <input type="text" class="form-control" value="{{ $printCard->creador->name ?? '-' }}" disabled>
                        </div>

                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label class="form-label" for="notas">Notas</label>
                            <textarea name="notas" id="notas" class="form-control @error('notas') is-invalid @enderror">{{ old('notas', $printCard->notas) }}</textarea>
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

@section('scripts')
    <!-- Date & Time Picker JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        @vite('resources/assets/js/date-time_pickers.js')
    <script>
        $(document).ready(function() {
            $('#producto_codigo_barra_id').select2({
                placeholder: 'Buscar producto...',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection
