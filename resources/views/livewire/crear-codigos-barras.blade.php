<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Nuevo código de barras</h5>
            </div>
            <div class="box-body">
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

                @foreach ($codigos as $index => $codigo)
                    <div class="box grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 codigo-row pt-4 {{ !$loop->last ? 'border-b-2 border-slate-300 pb-2' : '' }}">
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Tipo</label>
                            <select wire:model="codigos.{{ $index }}.tipo" class="form-control @error('codigos.' . $index . '.tipo') is-invalid @enderror">
                                <option value="">Selecciona</option>
                                <option value="EAN13">EAN13</option>
                                <option value="ITF14">ITF14</option>
                            </select>
                            @error('codigos.' . $index . '.tipo')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Código</label>
                            <input type="text" wire:model="codigos.{{ $index }}.codigo" class="form-control @error('codigos.' . $index . '.codigo') is-invalid @enderror">
                            @error('codigos.' . $index . '.codigo')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Producto</label>
                            <input type="text" wire:model="codigos.{{ $index }}.nombre" class="form-control @error('codigos.' . $index . '.nombre') is-invalid @enderror" placeholder="Nombre del producto">
                            @error('codigos.' . $index . '.nombre')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Color</label>
                            <select wire:model="codigos.{{ $index }}.color_id" class="form-control @error('codigos.' . $index . '.color_id') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach ($colores as $color)
                                    <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                                @endforeach
                            </select>
                            @error('codigos.' . $index . '.color_id')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Tamaño</label>
                            <select wire:model="codigos.{{ $index }}.tamano_id" class="form-control @error('codigos.' . $index . '.tamano_id') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach ($tamanos as $tamano)
                                    <option value="{{ $tamano->id }}">{{ $tamano->nombre }}</option>
                                @endforeach
                            </select>
                            @error('codigos.' . $index . '.tamano_id')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Clasificacion de envase</label>
                            <select wire:model="codigos.{{ $index }}.clasificacion_envase" class="form-control @error('codigos.' . $index . '.clasificacion_envase') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach ($clasificacionesEnvases as $clasificacion)
                                    <option value="{{ $clasificacion->nombre }}">{{ $clasificacion->nombre }}</option>
                                @endforeach
                            </select>
                            @error('codigos.' . $index . '.clasificacion_envase')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Empaque</label>
                            <select wire:model="codigos.{{ $index }}.empaque" class="form-control @error('codigos.' . $index . '.empaque') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach ($empaques as $empaque)
                                    <option value="{{ $empaque->nombre }}">{{ $empaque->nombre }}</option>
                                @endforeach
                            </select>
                            @error('codigos.' . $index . '.empaque')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Contenido</label>
                            <input type="text" wire:model="codigos.{{ $index }}.contenido" class="form-control @error('codigos.' . $index . '.contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                            @error('codigos.' . $index . '.contenido')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="md:col-span-1 col-span-12 mb-4 flex items-end">
                            @if (count($codigos) > 1)
                                <button type="button" wire:click="eliminarFila({{ $index }})" class="ti-btn ti-btn-danger">Eliminar</button>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between mb-4">
                    <button wire:click="agregarFila" class="ti-btn ti-btn-secondary" {{ count($codigos) >= 5 ? 'disabled' : '' }}>Agregar otra fila</button>
                    <button wire:click="guardar" class="ti-btn ti-btn-primary-full">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
