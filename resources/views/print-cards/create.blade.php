@extends('layouts.master')

@section('styles')

        <!-- FlatPickr CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">

@endsection

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
                        <div class="md:col-span-5 col-span-12 mb-4">
                            <label class="form-label" for="producto_codigo_barra_id">Producto</label>
                            <select class="form-control js-example-basic-single w-full @error('producto_codigo_barra_id') is-invalid @enderror" name="producto_codigo_barra_id" id="producto_codigo_barra_id" required>
                                <option value=""></option>
                                @foreach($productosCodigosBarras as $producto)
                                    <option value="{{ $producto->id }}" {{ old('producto_codigo_barra_id', $productoCodigoBarraId ?? null) == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->producto->nombre_corto ?? $producto->producto->nombre }}
                                        ({{ $producto->codigoBarra->codigo ?? 'SIN CÓDIGO' }})
                                        - {{ $producto->clasificacion_envase }}
                                    </option>
                                @endforeach
                            </select>
                            @error('producto_codigo_barra_id') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-5 col-span-12 mb-4">
                            <label class="form-label" for="nombre">Nombre del PrintCard (código específico)</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required maxlength="255">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label" for="fecha">Fecha de creación</label>
                            <div class="input-group">
                                <div class="input-group-text text-[#8c9097] dark:text-white/50"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" name="fecha" id="date" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" placeholder="Choose date">
                                {{-- <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}"> --}}
                                @error('fecha') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label" for="proveedor_id">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id" class="form-control @error('proveedor_id') is-invalid @enderror" required>
                                <option value="">Seleccione...</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proveedor_id') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label" for="registro_sanitario">Registro Sanitario</label>
                            <input type="text" name="registro_sanitario" id="registro_sanitario" class="form-control @error('registro_sanitario') is-invalid @enderror" value="{{ old('registro_sanitario') }}" maxlength="255">
                            @error('registro_sanitario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label class="form-label" for="notas">Notas</label>
                            <textarea name="notas" id="notas" class="form-control">{{ old('notas') }}</textarea>
                            @error('notas') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
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
    <!-- Date & Time Picker JS -->
    <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    @vite('resources/assets/js/date-time_pickers.js')
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
@endsection
