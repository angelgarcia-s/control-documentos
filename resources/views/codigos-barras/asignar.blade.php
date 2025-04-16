@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Asignar Códigos de Barras a un Producto</h3>
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

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">

            <div class="box-body space-y-3">
                @livewire('asignar-codigos-barras', ['sku' => $sku, 'Nombre_corto' => $producto])
            </div>

            <div class="box-header">
                <div class="box-title">Códigos Asignados</div>
            </div>
            <div class="box-body">
                @php
                    $producto = \App\Models\Producto::where('sku', $sku)->with('codigosBarras')->first();
                @endphp
                @if ($producto->codigosBarras->isEmpty())
                    <p>No hay códigos asignados a este producto.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo de Empaque</th>
                                <th>Contenido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto->codigosBarras as $asignacion)
                                <tr>
                                    <td>{{ $asignacion->codigo }}</td>
                                    <td>{{ $asignacion->pivot->tipo_empaque }}</td>
                                    <td>{{ $asignacion->pivot->contenido ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
