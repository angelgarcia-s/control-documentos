@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Código de Barra</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif
@if (session('error'))
    <x-alert type="danger" :message="session('error')" />
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

<form action="{{ route('codigos-barras.update', $codigoBarra) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Editar Código de Barra</div>
                </div>
                <div class="box-body">
                    <div class="box grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 pt-4">
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Tipo</label>
                            <select name="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                                <option value="">Selecciona</option>
                                <option value="EAN13" {{ old('tipo', $codigoBarra->tipo) == 'EAN13' ? 'selected' : '' }}>EAN13</option>
                                <option value="ITF14" {{ old('tipo', $codigoBarra->tipo) == 'ITF14' ? 'selected' : '' }}>ITF14</option>
                            </select>
                            @error('tipo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Código</label>
                            <input type="text" name="codigo" value="{{ old('codigo', $codigoBarra->codigo) }}" required class="form-control @error('codigo') is-invalid @enderror">
                            @error('codigo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-3 col-span-12 mb-4">
                            <label class="form-label">Producto</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $codigoBarra->nombre) }}" required class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre del producto">
                            @error('nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Color</label>
                            <select name="color_id" class="form-control @error('color_id') is-invalid @enderror">
                                <option value="">Selecciona</option>
                                @foreach ($colores as $color)
                                    <option value="{{ $color->id }}" {{ old('color_id', $codigoBarra->color_id) == $color->id ? 'selected' : '' }}>{{ $color->nombre }}</option>
                                @endforeach
                            </select>
                            @error('color_id') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Tamaño</label>
                            <select name="tamano_id" class="form-control @error('tamano_id') is-invalid @enderror">
                                <option value="">Selecciona</option>
                                @foreach ($tamanos as $tamano)
                                    <option value="{{ $tamano->id }}" {{ old('tamano_id', $codigoBarra->tamano_id) == $tamano->id ? 'selected' : '' }}>{{ $tamano->nombre }}</option>
                                @endforeach
                            </select>
                            @error('tamano_id') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Tipo de Empaque</label>
                            <select name="clasificacion_envase" class="form-control @error('clasificacion_envase') is-invalid @enderror" required>
                                <option value="">Selecciona</option>
                                @foreach ($clasificacionesEnvases as $clasificacionEnvase)
                                    <option value="{{ $clasificacionEnvase->nombre }}" {{ old('clasificacion_envase', $codigoBarra->clasificacion_envase) == $clasificacionEnvase->nombre ? 'selected' : '' }}>{{ $clasificacionEnvase->nombre }}</option>
                                @endforeach
                            </select>
                            @error('clasificacion_envase') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Empaque</label>
                            <select name="empaque" class="form-control @error('empaque') is-invalid @enderror">
                                <option value="">Selecciona</option>
                                @foreach ($empaques as $empaque)
                                    <option value="{{ $empaque->nombre }}" {{ old('empaque', $codigoBarra->empaque) == $empaque->nombre ? 'selected' : '' }}>{{ $empaque->nombre }}</option>
                                @endforeach
                            </select>
                            @error('empaque') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-2 col-span-12 mb-4">
                            <label class="form-label">Contenido</label>
                            <input type="text" name="contenido" value="{{ old('contenido', $codigoBarra->contenido) }}" class="form-control @error('contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                            @error('contenido') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('codigos-barras.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
