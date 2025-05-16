<div class="grid grid-cols-12 gap-6">
    <!-- Box 1: Códigos Asignados -->
    <div class="col-span-12">
        <div class="box custom-box">
            <div class="box-header">
                <h5 class="box-title">Códigos Asignados al Producto: {{ $sku }} - {{$producto->nombre_corto}}</h5>
            </div>
            <div class="box-body p-4">
                <!-- Tabla de códigos asignados -->
                @if ($codigosAsignados->isEmpty())
                    <p>No hay códigos asignados a este producto.</p>
                @else
                    <div class="table-responsive">
                        <table class="table ti-striped-table min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">Código</th>
                                    <th scope="col" class="text-start">Nombre Corto</th>
                                    <th scope="col" class="text-start">Empaque</th>
                                    <th scope="col" class="text-start">Contenido</th>
                                    <th scope="col" class="text-start">Tipo de Empaque</th>
                                    <th scope="col" class="text-start">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($codigosAsignados as $codigo)
                                    <tr class="border-b border-defaultborder">
                                        <td class="text-start">{{ $codigo->codigo }}</td>
                                        <td class="text-start">{{ $codigo->nombre_corto ?? 'N/A' }}</td>
                                        <td class="text-start">{{ $codigo->empaque ?? 'N/A' }}</td>
                                        <td class="text-start">{{ $codigo->contenido ?? 'N/A' }}</td>
                                        <td class="text-start">{{ $codigo->tipo_empaque ?? '-' }}</td>
                                        <td>
                                            <button type="button" wire:click="confirmarDesasignacion({{ $codigo->id }})" class="ti-btn text-xl text-rose-400 !py-1 !px-1 ti-btn-wave">
                                                <i class="las la-unlink"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Box 2: Asignar Códigos -->
    <div class="col-span-12">
        <div class="box custom-box">
            <div class="box-header justify-between">
                <h5 class="box-title">Asignar Códigos</h5>
                <a href="{{ route('codigos-barras.create') }}" class="ti-btn ti-btn-primary">Crear nuevo código</a>
            </div>
            <div class="box-body p-4">
                <!-- Notificaciones -->
                @if ($userMessage)
                    <div class="alert alert-info" role="alert" style="position: relative; z-index: 0;">
                        {{ $userMessage }}
                    </div>
                @endif
                @if (session('success'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-danger mt-2" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-danger mt-2" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario de asignación -->
                @foreach ($filas as $index => $fila)
                    <div class="box grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 codigo-row pt-4 {{ !$loop->last ? 'border-b-2 border-slate-300 pb-2' : '' }}">
                        <div class="md:col-span-4 col-span-12 mb-4 relative">
                            <label class="form-label">Código</label>
                            <input type="text"
                                   id="codigo-input-{{ $index }}"
                                   wire:model="filas.{{ $index }}.codigo"
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm custom-input-focus {{ $focusedInputIndex === $index ? 'focused' : '' }} @error('filas.' . $index . '.codigo') is-invalid @enderror"
                                   readonly
                                   wire:focus="setFocus({{ $index }})">
                        </div>
                        <div class="md:col-span-4 col-span-12 mb-4 relative">
                            <label class="form-label">Contenido</label>
                            <input type="text"
                                   wire:model="filas.{{ $index }}.contenido"
                                   class="form-control @error('filas.' . $index . '.contenido') is-invalid @enderror"
                                   readonly>
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4 relative">
                            <label class="form-label">Tipo de Empaque</label>
                            <input type="text"
                                   wire:model="filas.{{ $index }}.tipo_empaque"
                                   class="form-control @error('filas.' . $index . '.tipo_empaque') is-invalid @enderror"
                                   readonly>
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
                        <button wire:click="guardar" class="ti-btn ti-btn-primary-full">Guardar</button>
                    </div>
                </div>

                <livewire:codigos-barras-selector-table
                    :selectedCode="$selectedCode"
                    :key="$selectorKey" />

                <!-- Modal de confirmación para asignar -->
                @if ($confirmingAssign)
                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
                        <div class="modal-content bg-white rounded-lg p-6 max-w-md w-full">
                            <div class="modal-header">
                                <h5 class="modal-title text-lg font-bold text-gray-900 dark:text-gray-100">Confirmar Asignación</h5>
                            </div>
                            <div class="modal-body">
                                <p class="text-gray-700 dark:text-gray-300">
                                    Los productos no coinciden: la familia del producto ('{{ $producto->familia ? $producto->familia->nombre : 'Desconocido' }}') no coincide con el nombre del código ('{{ $codigoNombre ?? '' }}'). ¿Desea asignar de todos modos?
                                </p>
                            </div>
                            <div class="modal-footer flex justify-end space-x-2">
                                <button type="button" wire:click="cancelarAsignacion" class="ti-btn ti-btn-secondary !py-1 !px-2">Cancelar</button>
                                <button type="button" wire:click="confirmarAsignacion" wire:loading.attr="disabled" class="ti-btn ti-btn-primary !py-1 !px-2">Confirmar</button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Modal de confirmación para desasignar -->
                @if ($confirmingUnassign !== null)
                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
                        <div class="modal-content bg-white rounded-lg p-6 max-w-md w-full">
                            <div class="modal-header">
                                <h5 class="modal-title text-lg font-bold text-gray-900 dark:text-gray-100">Confirmar Desasignación</h5>
                            </div>
                            <div class="modal-body">
                                <p class="text-gray-700 dark:text-gray-300">
                                    ¿Estás seguro de que deseas desasignar el código de barras '{{ isset($codigoDesasignar) ? $codigoDesasignar->codigo : 'N/A' }}' del producto '{{ $producto->nombre_corto }}'?
                                </p>
                            </div>
                            <div class="modal-footer flex justify-end space-x-2">
                                <button type="button" wire:click="cancelarDesasignacion" class="ti-btn ti-btn-secondary !py-1 !px-2">Cancelar</button>
                                <button type="button" wire:click="desasignar" wire:loading.attr="disabled" class="ti-btn ti-btn-danger !py-1 !px-2">Confirmar</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('clear-focus', () => {
                document.querySelectorAll('input.focused').forEach(input => {
                    input.classList.remove('focused');
                });
            });
        });
    </script>
@endpush
