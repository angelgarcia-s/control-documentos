@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/prismjs/themes/prism-coy.min.css') }}">
@endsection

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Producto {{ $producto->nombre_corto }}</h3>
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

<form action="{{ route('productos.update', $producto) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Datos SAP</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Código (SKU)</label>
                            <input type="text" name="sku" value="{{ old('sku', $producto->sku) }}" required class="form-control @error('sku') is-invalid @enderror">
                            @error('sku') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-7 col-span-12 mb-4">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" required class="form-control @error('descripcion') is-invalid @enderror">
                            @error('descripcion') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Unidad de medida</label>
                            <select name="id_unidad_medida" class="form-control @error('id_unidad_medida') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($unidadesMedida as $unidad)
                                    <option value="{{ $unidad->id }}" {{ old('id_unidad_medida', $producto->id_unidad_medida) == $unidad->id ? 'selected' : '' }}>{{ $unidad->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_unidad_medida') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="box-header justify-between">
                    <div class="box-title">Información del producto</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Categoría</label>
                            <select name="id_categoria" class="form-control @error('id_categoria') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('id_categoria', $producto->id_categoria) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_categoria') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre Corto</label>
                            <input type="text" name="nombre_corto" value="{{ old('nombre_corto', $producto->nombre_corto) }}" class="form-control @error('nombre_corto') is-invalid @enderror" readonly placeholder="Se generará automáticamente (Familia + Color + Tamaño)">
                            @error('nombre_corto') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Proveedor</label>
                            <select name="id_proveedor" class="form-control @error('id_proveedor') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ old('id_proveedor', $producto->id_proveedor) == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_proveedor') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Familia de producto</label>
                            <select name="id_familia" class="form-control @error('id_familia') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($familias as $familia)
                                    <option value="{{ $familia->id }}" {{ old('id_familia', $producto->id_familia) == $familia->id ? 'selected' : '' }}>{{ $familia->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_familia') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Color</label>
                            <select name="id_color" class="form-control @error('id_color') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($colores as $color)
                                    <option value="{{ $color->id }}" {{ old('id_color', $producto->id_color) == $color->id ? 'selected' : '' }}>{{ $color->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_color') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Tamaño</label>
                            <select name="id_tamano" class="form-control @error('id_tamano') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($tamanos as $tamano)
                                    <option value="{{ $tamano->id }}" {{ old('id_tamano', $producto->id_tamano) == $tamano->id ? 'selected' : '' }}>{{ $tamano->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_tamano') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="box-header justify-between">
                    <div class="box-title">Códigos de barras y Contenidos</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Código de barras Primario</label>
                            <input type="text" name="codigo_barras_primario" value="{{ old('codigo_barras_primario', $producto->codigosBarras->where('pivot.tipo_empaque', 'Primario')->first()->codigo ?? '-') }}" class="form-control opacity-50" disabled >
                            @error('codigo_barras_primario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Código de barras Secundario</label>
                            <input type="text" name="codigo_barras_secundario" value="{{ old('codigo_barras_secundario', $producto->codigosBarras->where('pivot.tipo_empaque', 'Secundario')->first()->codigo ?? '-') }}" class="form-control opacity-50" disabled >
                            @error('codigo_barras_secundario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Código de barras Terciario</label>
                            <input type="text" name="codigo_barras_terciario" value="{{ old('codigo_barras_terciario', $producto->codigosBarras->where('pivot.tipo_empaque', 'Terciario')->first()->codigo ?? '-') }}" class="form-control opacity-50" disabled >
                            @error('codigo_barras_terciario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Código de barras Cuaternario</label>
                            <input type="text" name="codigo_barras_cuaternario" value="{{ old('codigo_barras_cuaternario', $producto->codigosBarras->where('pivot.tipo_empaque', 'Cuaternario')->first()->codigo ?? '-') }}" class="form-control opacity-50" disabled >
                            @error('codigo_barras_cuaternario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Código de barras Master</label>
                            <input type="text" name="codigo_barras_master" value="{{ old('codigo_barras_master', $producto->codigosBarras->where('pivot.tipo_empaque', 'Master')->first()->codigo ?? '-') }}" class="form-control opacity-50" disabled >
                            @error('codigo_barras_master') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Múltiplos por Master</label>
                            <input type="number" name="multiplos_master" value="{{ old('multiplos_master', $producto->multiplos_master) }}" required class="form-control @error('multiplos_master') is-invalid @enderror">
                            @error('multiplos_master') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Contenido de la Tarima</label>
                            <input type="number" name="cupo_tarima" value="{{ old('cupo_tarima', $producto->cupo_tarima) }}" required class="form-control @error('cupo_tarima') is-invalid @enderror">
                            @error('cupo_tarima') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Requiere peso</label>
                            <select name="requiere_peso" id="requiere_peso" class="form-control @error('requiere_peso') is-invalid @enderror" required>
                                <option value="NO" {{ old('requiere_peso', $producto->requiere_peso) == 'NO' ? 'selected' : '' }}>No</option>
                                <option value="SI" {{ old('requiere_peso', $producto->requiere_peso) == 'SI' ? 'selected' : '' }}>Sí</option>
                            </select>
                            @error('requiere_peso') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Peso</label>
                            <input type="number" step="0.01" name="peso" value="{{ old('peso', $producto->peso) }}" class="form-control @error('peso') is-invalid @enderror" id="peso" {{ $producto->requiere_peso == 'NO' ? 'disabled' : '' }}>
                            @error('peso') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Variación en el peso</label>
                            <input type="number" step="0.01" name="variacion_peso" value="{{ old('variacion_peso', $producto->variacion_peso) }}" class="form-control @error('variacion_peso') is-invalid @enderror" id="variacion_peso" {{ $producto->requiere_peso == 'NO' ? 'disabled' : '' }}>
                            @error('variacion_peso') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="flex justify-between md:col-span-12 col-span-12">
                            <div>
                                @can('asignar-codigos-barras')
                                <a href="{{ route('codigos-barras.asignar', $producto->sku) }}" class="ti-btn ti-btn-primary">Asignar codigos</a>
                            @endcan
                            </div>
                            <div>
                                <a href="{{ route('productos.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                                <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const requierePeso = document.getElementById('requiere_peso');
            const peso = document.getElementById('peso');
            const variacionPeso = document.getElementById('variacion_peso');

            // Función para habilitar/deshabilitar campos
            function togglePesoFields() {
                if (requierePeso.value === 'SI') {
                    peso.disabled = false;
                    variacionPeso.disabled = false;
                    peso.required = true;
                    variacionPeso.required = true;
                } else {
                    peso.disabled = true;
                    variacionPeso.disabled = true;
                    peso.required = false;
                    variacionPeso.required = false;
                }
            }

            // Estado inicial
            togglePesoFields();

            // Escuchar cambios en el select
            requierePeso.addEventListener('change', togglePesoFields);
        });
    </script>
@endsection
