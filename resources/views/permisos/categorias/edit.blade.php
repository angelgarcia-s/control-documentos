@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Nombres de Visualización de Categorías</h3>
    </div>
    <x-breadcrumbs />
</div>

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

<form id="categorias-permisos-form" action="{{ route('categorias-permisos.update') }}" method="POST">
    @csrf
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Categorías de Permisos</div>
                </div>
                <div class="box-body">
                    <table class="w-full bg-white table-auto whitespace-nowrap border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="py-3 px-6 text-left border">Categoría Original</th>
                                <th class="py-3 px-6 text-left border">Nombre de Visualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                @php
                                    $encodedCategoria = urlencode($categoria);
                                    $displayName = $nombresVisuales[$categoria] ?? ucwords(str_replace('-', ' ', $categoria));
                                    $displayName = str_replace('Codigos', 'Códigos', $displayName);
                                @endphp
                                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="py-3 px-6 border">{{ $categoria }}</td>
                                    <td class="py-3 px-6 border">
                                        <input type="text" name="display_names[{{ $encodedCategoria }}]" value="{{ $displayName }}" class="form-control">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('permisos.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
