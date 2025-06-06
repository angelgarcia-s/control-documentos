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
                            <div id="advertencia-duplicados" class="mt-2" style="display: none;">
                                <div class="bg-yellow-50 border border-yellow-200 rounded-md p-3">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-alert-line text-yellow-400"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-yellow-700">
                                                Este nombre ya existe en otros productos.
                                                <button type="button" id="mostrar-modal-duplicados" class="font-medium text-yellow-800 underline hover:text-yellow-900">
                                                    Ver detalles
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<!-- Modal para mostrar duplicados -->
<div class="hs-overlay hidden ti-modal" id="modal-duplicados">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="ti-modal-content w-full">
            <div class="ti-modal-header">
                <h6 class="modal-title text-[1rem] font-semibold">Nombres Duplicados Encontrados</h6>
                <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#modal-duplicados">
                    <span class="sr-only">Close</span>
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="ti-modal-body px-4">
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-3">
                        El nombre "<span id="nombre-duplicado-display" class="font-semibold"></span>" ya está siendo utilizado en los siguientes productos:
                    </p>
                </div>
                <div class="space-y-3" id="lista-duplicados">
                    <!-- Lista de duplicados se llenará dinámicamente -->
                </div>
                <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-md">
                    <p class="text-sm text-blue-700">
                        <i class="ri-information-line mr-1"></i>
                        Puedes continuar usando este nombre ya que será único para el producto seleccionado.
                    </p>
                </div>
            </div>
            <div class="ti-modal-footer">
                <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full" data-hs-overlay="#modal-duplicados">
                    Entendido
                </button>
            </div>
        </div>
    </div>
</div>

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

            // Variables para almacenar duplicados
            let duplicadosActuales = [];
            let timeoutVerificacion;

            // Función para verificar duplicados
            function verificarDuplicados() {
                const nombre = $('#nombre').val().trim();
                const productoId = $('#producto_codigo_barra_id').val();

                if (nombre.length < 2) {
                    $('#advertencia-duplicados').hide();
                    return;
                }

                // Hacer petición AJAX
                $.ajax({
                    url: '{{ route("print-cards.verificar-duplicados-globales") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nombre: nombre,
                        producto_codigo_barra_id: productoId
                    },
                    success: function(response) {
                        if (response.cantidad > 0) {
                            duplicadosActuales = response.duplicados;
                            $('#advertencia-duplicados').show();
                        } else {
                            $('#advertencia-duplicados').hide();
                        }
                    },
                    error: function() {
                        $('#advertencia-duplicados').hide();
                    }
                });
            }

            // Event listeners
            $('#nombre').on('input', function() {
                clearTimeout(timeoutVerificacion);
                timeoutVerificacion = setTimeout(verificarDuplicados, 500); // Esperar 500ms después de que el usuario deje de escribir
            });

            $('#producto_codigo_barra_id').on('change', function() {
                if ($('#nombre').val().trim().length > 1) {
                    verificarDuplicados();
                }
            });

            // Mostrar modal con detalles
            $('#mostrar-modal-duplicados').on('click', function() {
                const nombreDisplay = $('#nombre').val();
                $('#nombre-duplicado-display').text(nombreDisplay);

                // Limpiar lista anterior
                const listaDuplicados = $('#lista-duplicados');
                listaDuplicados.empty();

                // Llenar lista de duplicados
                duplicadosActuales.forEach(function(duplicado) {
                    const itemDuplicado = $(`
                        <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h5 class="font-medium text-gray-900">${duplicado.producto_nombre}</h5>
                                    <p class="text-sm text-gray-600 mt-1">
                                        <span class="inline-flex items-center">
                                            <i class="ri-barcode-line mr-1"></i>
                                            Código: ${duplicado.codigo_barra}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <span class="inline-flex items-center">
                                            <i class="ri-package-line mr-1"></i>
                                            Envase: ${duplicado.clasificacion_envase}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <span class="inline-flex items-center">
                                            <i class="ri-building-line mr-1"></i>
                                            Proveedor: ${duplicado.proveedor}
                                        </span>
                                    </p>
                                </div>
                                <div class="text-xs text-gray-500">
                                    ID: ${duplicado.printcard_id}
                                </div>
                            </div>
                        </div>
                    `);
                    listaDuplicados.append(itemDuplicado);
                });

                // Mostrar modal
                HSOverlay.open(document.querySelector('#modal-duplicados'));
            });
        });
    </script>
@endsection
