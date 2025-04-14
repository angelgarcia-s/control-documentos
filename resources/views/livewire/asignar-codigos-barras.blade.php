<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Asignar Códigos al Producto {{ $sku }}</h5>
            </div>
            <div class="box-body">
                @if (session('user_message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('user_message') }}
                    </div>
                @endif
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

                @foreach ($filas as $index => $fila)
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 codigo-row">
                        <div class="md:col-span-4 col-span-12 mb-4 relative">
                            <label class="form-label">Código</label>
                            <input type="text"
                                   wire:model="filas.{{ $index }}.codigo"
                                   class="form-control focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   readonly
                                   wire:focus="setFocus({{ $index }})">
                            <x-validation-error field="filas.{{ $index }}.codigo" />
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4 relative">
                            <label class="form-label">Contenido</label>
                            <input type="text" wire:model="filas.{{ $index }}.contenido" class="form-control">
                            <x-validation-error field="filas.{{ $index }}.contenido" />
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4 relative">
                            <label class="form-label">Tipo de Empaque</label>
                            <select wire:model="filas.{{ $index }}.tipo_empaque" class="form-control @error('filas.' . $index . '.tipo_empaque') is-invalid @enderror" required>
                                @foreach ($tiposEmpaque as $tipo)
                                    <option value="{{ $tipo->nombre }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            <x-validation-error field="filas.{{ $index }}.tipo_empaque" />
                        </div>
                        <div class="md:col-span-1 col-span-12 mb-4 flex items-end">
                            @if (count($filas) > 1)
                                <button type="button" wire:click="eliminarFila({{ $index }})" class="ti-btn ti-btn-danger">Eliminar</button>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between mb-4">
                    <button wire:click="agregarFila" class="ti-btn ti-btn-secondary" {{ count($filas) >= 5 ? 'disabled' : '' }}>Agregar otra fila</button>
                    <div class="flex space-x-2">
                        <button wire:click="asignar" class="ti-btn ti-btn-primary">Asignar</button>
                        <a href="{{ route('codigos-barras.create') }}" class="ti-btn ti-btn-secondary">Crear nuevo código</a>
                        <button wire:click="guardar" class="ti-btn ti-btn-primary-full">Guardar</button>
                    </div>
                </div>

                @livewire('codigos-barras-selector-table', ['selectedCode' => $selectedCode])
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    @if ($confirmingAssign)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white rounded-lg p-6 max-w-md w-full">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Confirmar asignación</h2>
                <p class="text-gray-700 mb-6">Los productos no coinciden: el nombre del producto ('{{ $producto->nombre_corto }}') no coincide con el nombre del código ('{{ CodigoBarra::find($selectedCode)->nombre ?? '' }}'). ¿Desea asignar de todos modos?</p>
                <div class="flex justify-end space-x-2">
                    <button wire:click="cancelarAsignacion" class="ti-btn ti-btn-secondary !py-1 !px-2 ti-btn-wave">Cancelar</button>
                    <button wire:click="confirmarAsignacion" class="ti-btn ti-btn-danger !py-1 !px-2 ti-btn-wave">Confirmar</button>
                </div>
            </div>
        </div>
    @endif
</div>
