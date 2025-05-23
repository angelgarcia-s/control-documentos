@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/prismjs/themes/prism-coy.min.css') }}">
@endsection

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear Producto</h3>
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

<form action="{{ route('productos.store') }}" method="POST" id="crearProductoForm">
    @csrf
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
                            <input type="text" name="sku" value="{{ old('sku') }}" required class="form-control @error('sku') is-invalid @enderror">
                            @error('sku') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-7 col-span-12 mb-4">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" value="{{ old('descripcion') }}" required class="form-control @error('descripcion') is-invalid @enderror">
                            @error('descripcion') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Unidad de medida</label>
                            <select name="id_unidad_medida" class="form-control @error('id_unidad_medida') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($unidadesMedida as $unidad)
                                    <option value="{{ $unidad->id }}" {{ old('id_unidad_medida') == $unidad->id ? 'selected' : '' }}>{{ $unidad->nombre }}</option>
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
                                    <option value="{{ $categoria->id }}" {{ old('id_categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_categoria') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre Corto</label>
                            <input type="text" name="nombre_corto" value="{{ old('nombre_corto') }}" class="form-control @error('nombre_corto') is-invalid @enderror" readonly placeholder="Se generará automáticamente (Familia + Color + Tamaño)">
                            @error('nombre_corto') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Proveedor</label>
                            <select name="id_proveedor" class="form-control @error('id_proveedor') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" {{ old('id_proveedor') == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_proveedor') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4">
                            <label class="form-label">Familia de producto</label>
                            <select name="id_familia" class="form-control @error('id_familia') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($familias as $familia)
                                    <option value="{{ $familia->id }}" {{ old('id_familia') == $familia->id ? 'selected' : '' }}>{{ $familia->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_familia') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Color</label>
                            <select name="id_color" class="form-control @error('id_color') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($colores as $color)
                                    <option value="{{ $color->id }}" {{ old('id_color') == $color->id ? 'selected' : '' }}>{{ $color->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_color') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Tamaño</label>
                            <select name="id_tamano" class="form-control @error('id_tamano') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($tamanos as $tamano)
                                    <option value="{{ $tamano->id }}" {{ old('id_tamano') == $tamano->id ? 'selected' : '' }}>{{ $tamano->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_tamano') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-10"></div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 md:col-span-6 pr-4 border-r border-gray-100">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">Códigos de barras</div>
                                </div>
                                <div class="box-body">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-6 sm:col-span-6">
                                            <label class="form-label">Código de barras Primario</label>
                                            <input type="text" name="codigo_barras_primario" value="{{ old('codigo_barras_primario') }}" class="form-control opacity-50" disabled placeholder="Asignar después de guardar">
                                            @error('codigo_barras_primario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-6">
                                            <label class="form-label">Código de barras Secundario</label>
                                            <input type="text" name="codigo_barras_secundario" value="{{ old('codigo_barras_secundario') }}" class="form-control opacity-50" disabled placeholder="Asignar después de guardar">
                                            @error('codigo_barras_secundario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="md:col-span-6 col-span-12 mb-4">
                                            <label class="form-label">Código de barras Terciario</label>
                                            <input type="text" name="codigo_barras_terciario" value="{{ old('codigo_barras_terciario') }}" class="form-control opacity-50" disabled placeholder="Asignar después de guardar">
                                            @error('codigo_barras_terciario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="md:col-span-6 col-span-12 mb-4">
                                            <label class="form-label">Código de barras Cuaternario</label>
                                            <input type="text" name="codigo_barras_cuaternario" value="{{ old('codigo_barras_cuaternario') }}" class="form-control opacity-50" disabled placeholder="Asignar después de guardar">
                                            @error('codigo_barras_cuaternario') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="md:col-span-6 col-span-12 mb-4">
                                            <label class="form-label">Código de barras Master</label>
                                            <input type="text" name="codigo_barras_master" value="{{ old('codigo_barras_master') }}" class="form-control opacity-50" disabled placeholder="Asignar después de guardar">
                                            @error('codigo_barras_master') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">Otros datos</div>
                                </div>
                                <div class="box-body">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-12 sm:col-span-12">
                                            <label class="form-label">Múltiplos por Master</label>
                                            <input type="number" name="multiplos_master" value="{{ old('multiplos_master') }}" required class="form-control @error('multiplos_master') is-invalid @enderror">
                                            @error('multiplos_master') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-span-12 sm:col-span-12">
                                            <label class="form-label">Contenido de la Tarima</label>
                                            <input type="number" name="cupo_tarima" value="{{ old('cupo_tarima') }}" required class="form-control @error('cupo_tarima') is-invalid @enderror">
                                            @error('cupo_tarima') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-span-12 sm:col-span-12">
                                            <label class="form-label">Requiere peso</label>
                                            <select name="requiere_peso" id="requiere_peso" class="form-control @error('requiere_peso') is-invalid @enderror" required>
                                                <option value="NO" {{ old('requiere_peso', 'NO') == 'NO' ? 'selected' : '' }}>No</option>
                                                <option value="SI" {{ old('requiere_peso') == 'SI' ? 'selected' : '' }}>Sí</option>
                                            </select>
                                            @error('requiere_peso') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-span-12 sm:col-span-12">
                                            <label class="form-label">Peso</label>
                                            <input type="number" step="0.01" name="peso" value="{{ old('peso') }}" class="form-control @error('peso') is-invalid @enderror" id="peso" disabled>
                                            @error('peso') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-span-12 sm:col-span-12">
                                            <label class="form-label">Variación en el peso</label>
                                            <input type="number" step="0.01" name="variacion_peso" value="{{ old('variacion_peso') }}" class="form-control @error('variacion_peso') is-invalid @enderror" id="variacion_peso" disabled>
                                            @error('variacion_peso') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end md:col-span-12 col-span-12">
                        <a href="{{ route('productos.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal basado en Livewire puro -->
@if(isset($skuGuardado))
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full">
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Confirmar asignación</h2>
            <p class="text-gray-700 dark:text-gray-300 mb-6">El producto se ha guardado correctamente. ¿Estás seguro de que quieres asignar los códigos de barras ahora?</p>
            <div class="flex justify-end space-x-2">
                <button onclick="window.location.href='{{ route('productos.index') }}'"
                        class="ti-btn ti-btn-secondary !py-1 !px-2 ti-btn-wave">
                    Cancelar
                </button>
                <a href="{{ route('codigos-barras.asignar', $skuGuardado) }}"
                   class="ti-btn ti-btn-danger !py-1 !px-2 ti-btn-wave">
                    Confirmar
                </a>
            </div>
        </div>
    </div>
@endif

@endsection

@section('scripts')
    @vite('resources/assets/js/modal.js')
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
                    peso.value = '';
                    variacionPeso.value = '';
                }
            }

            // Estado inicial
            togglePesoFields();

            // Escuchar cambios en el select
            requierePeso.addEventListener('change', togglePesoFields);
        });
    </script>
@endsection
