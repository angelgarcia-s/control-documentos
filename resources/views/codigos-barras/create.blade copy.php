@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Crear Códigos de Barras</h3>
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

<form action="{{ route('codigos-barras.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Códigos de Barra</div>
                </div>
                <div class="box-body">
                    <div id="codigos-container">
                        <!-- Fila inicial -->
                        <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 codigo-row">
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Tipo</label>
                                <select name="codigos[0][tipo]" class="form-control @error('codigos.0.tipo') is-invalid @enderror" required>
                                    <option value="">Seleccione</option>
                                    <option value="EAN13" {{ old('codigos.0.tipo') == 'EAN13' ? 'selected' : '' }}>EAN13</option>
                                    <option value="ITF14" {{ old('codigos.0.tipo') == 'ITF14' ? 'selected' : '' }}>ITF14</option>
                                </select>
                                @error('codigos.0.tipo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Código</label>
                                <input type="text" name="codigos[0][codigo]" value="{{ old('codigos.0.codigo') }}" required class="form-control @error('codigos.0.codigo') is-invalid @enderror">
                                @error('codigos.0.codigo') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Producto</label>
                                <input type="text" name="codigos[0][nombre]" value="{{ old('codigos.0.nombre') }}" required class="form-control @error('codigos.0.nombre') is-invalid @enderror" placeholder="Ej. Plus Azul Chico">
                                @error('codigos.0.nombre') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Tipo de Empaque</label>
                                <select name="codigos[0][tipo_empaque]" class="form-control @error('codigos.0.tipo_empaque') is-invalid @enderror" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($tiposEmpaque as $tipo)
                                        <option value="{{ $tipo->nombre }}" {{ old('codigos.0.tipo_empaque') == $tipo->nombre ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('codigos.0.tipo_empaque') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Empaque</label>
                                <select name="codigos[0][empaque]" class="form-control @error('codigos.0.empaque') is-invalid @enderror">
                                    <option value="">Seleccione</option>
                                    @foreach ($empaques as $empaque)
                                        <option value="{{ $empaque->nombre }}" {{ old('codigos.0.empaque') == $empaque->nombre ? 'selected' : '' }}>{{ $empaque->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('codigos.0.empaque') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Contenido</label>
                                <input type="text" name="codigos[0][contenido]" value="{{ old('codigos.0.contenido') }}" class="form-control @error('codigos.0.contenido') is-invalid @enderror" placeholder="Ej. 10 unidades">
                                @error('codigos.0.contenido') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <button type="button" id="agregar-codigo" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Agregar otro código</button>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="flex justify-end md:col-span-12 col-span-12">
                            <a href="{{ route('codigos-barras.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                            <button type="submit" class="ti-btn ti-btn-primary-full">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
    @vite('resources/assets/js/modal.js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('codigos-container');
            const agregarBoton = document.getElementById('agregar-codigo');
            let contador = 1;

            agregarBoton.addEventListener('click', function () {
                if (contador < 5) {
                    const nuevaFila = `
                        <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4 codigo-row">
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Tipo</label>
                                <select name="codigos[${contador}][tipo]" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="EAN13">EAN13</option>
                                    <option value="ITF14">ITF14</option>
                                </select>
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Código</label>
                                <input type="text" name="codigos[${contador}][codigo]" class="form-control" required>
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Producto</label>
                                <input type="text" name="codigos[${contador}][nombre]" class="form-control" placeholder="Ej. Plus Azul Chico" required>
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Tipo de Empaque</label>
                                <select name="codigos[${contador}][tipo_empaque]" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($tiposEmpaque as $tipo)
                                        <option value="{{ $tipo->nombre }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Empaque</label>
                                <select name="codigos[${contador}][empaque]" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach ($empaques as $empaque)
                                        <option value="{{ $empaque->nombre }}">{{ $empaque->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2 col-span-12 mb-4">
                                <label class="form-label">Contenido</label>
                                <input type="text" name="codigos[${contador}][contenido]" class="form-control" placeholder="Ej. 10 unidades">
                            </div>
                        </div>`;
                    container.insertAdjacentHTML('beforeend', nuevaFila);
                    contador++;
                    if (contador === 5) {
                        agregarBoton.disabled = true;
                    }
                }
            });
        });
    </script>
@endsection