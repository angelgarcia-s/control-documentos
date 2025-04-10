<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Códigos de Barra</div>
            </div>
            <div class="box-body">
                @foreach ($codigos as $index => $codigo)
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 codigo-row">
                        <div class="md:col-span-2 col-span-12 mb-4 relative">
                            <label class="form-label">Tipo</label>
                            <select wire:model="codigos.{{ $index }}.tipo" class="form-control @error('codigos.' . $index . '.tipo') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                <option value="EAN13">EAN13</option>
                                <option value="ITF14">ITF14</option>
                            </select>
                            <x-validation-error field="codigos.{{ $index }}.tipo" />
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4 relative">
                            <label class="form-label">Código</label>
                            <input type="text" wire:model="codigos.{{ $index }}.codigo" class="form-control @error('codigos.' . $index . '.codigo') is-invalid @enderror" required>
                            <x-validation-error field="codigos.{{ $index }}.codigo" />
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4 relative">
                            <label class="form-label">Producto</label>
                            <input type="text" wire:model="codigos.{{ $index }}.nombre" class="form-control @error('codigos.' . $index . '.nombre') is-invalid @enderror" placeholder="Ej. Plus Azul Chico" required>
                            <x-validation-error field="codigos.{{ $index }}.nombre" />
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4 relative">
                            <label class="form-label">Tipo de Empaque</label>
                            <select wire:model="codigos.{{ $index }}.tipo_empaque" class="form-control @error('codigos.' . $index . '.tipo_empaque') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                @foreach ($tiposEmpaque as $tipo)
                                    <option value="{{ $tipo->nombre }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            <x-validation-error field="codigos.{{ $index }}.tipo_empaque" />
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4 relative">
                            <label class="form-label">Empaque</label>
                            <select wire:model="codigos.{{ $index }}.empaque" class="form-control @error('codigos.' . $index . '.empaque') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach ($empaques as $empaque)
                                    <option value="{{ $empaque->nombre }}">{{ $empaque->nombre }}</option>
                                @endforeach
                            </select>
                            <x-validation-error field="codigos.{{ $index }}.empaque" />
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4 flex items-end relative">
                            <div class="flex-1">
                                <label class="form-label">Contenido</label>
                                <input type="text" wire:model="codigos.{{ $index }}.contenido" class="form-control @error('codigos.' . $index . '.contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                                <x-validation-error field="codigos.{{ $index }}.contenido" />
                            </div>
                            @if (count($codigos) > 1)
                                <button type="button" wire:click="eliminarFila({{ $index }})" class="ti-btn ti-btn-danger ml-2">Eliminar</button>
                            @endif
                        </div>
                    </div>
                @endforeach
                
                <button type="button" wire:click="agregarFila" class="ti-btn ti-btn-primary mb-4" {{ count($codigos) >= 5 ? 'disabled' : '' }}>Agregar otro código</button>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="flex justify-end md:col-span-12 col-span-12">
                        <a href="{{ route('codigos-barras.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                        <button wire:click="guardar" class="ti-btn ti-btn-primary-full">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>