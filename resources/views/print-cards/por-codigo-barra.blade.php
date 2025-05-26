@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">
            PrintCards asociados a Código de Barras
        </h3>
    </div>
    <x-breadcrumbs />
</div>
@if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif
@if (session('error'))
    <x-alert type="danger" :message="session('error')" />
@endif
<div class="box mb-6">
    <div class="box-header">
        <div class="box-title">Producto: <span>{{ $productoCodigoBarra->producto->nombre_corto ?? '-' }}</span></div>
        <div class="box-title">Código de barras: <span>{{ $productoCodigoBarra->codigoBarra->codigo ?? '-' }}</span></div>
        <div class="box-title">Clasificación envase: <span>{{ $productoCodigoBarra->clasificacion_envase ?? '-' }}</span></div>
    </div>
</div>
<div class="box">
    <div class="box-header flex justify-between">
        <div class="box-title">PrintCards asociados</div>
        @can('print-cards-create')
        <a href="{{ route('print-cards.create') }}" class="ti-btn ti-btn-primary">
            <i class="ri-add-line mr-1"></i> Nuevo PrintCard
        </a>
        @endcan
    </div>
    <div class="box-body">
        @if($printCards->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full bg-white table-auto whitespace-nowrap border border-gray-300 rounded-lg">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left border">ID</th>
                        <th class="py-3 px-6 text-left border">Nombre</th>
                        <th class="py-3 px-6 text-left border">Proveedor</th>
                        <th class="py-3 px-6 text-left border">Registro Sanitario</th>
                        <th class="py-3 px-6 text-left border">Creado por</th>
                        <th class="py-3 px-6 text-left border">Fecha</th>
                        <th class="py-3 px-6 text-left border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($printCards as $printCard)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-800">
                        <td class="py-3 px-6 border">{{ $printCard->id }}</td>
                        <td class="py-3 px-6 border">{{ $printCard->nombre }}</td>
                        <td class="py-3 px-6 border">{{ $printCard->proveedor->nombre ?? '-' }}</td>
                        <td class="py-3 px-6 border">{{ $printCard->registro_sanitario }}</td>
                        <td class="py-3 px-6 border">{{ $printCard->creador->name ?? '-' }}</td>
                        <td class="py-3 px-6 border">{{ $printCard->fecha ? \Carbon\Carbon::parse($printCard->fecha)->format('d/m/Y') : '-' }}</td>
                        <td class="py-3 px-6 border">
                            <div class="flex items-center space-x-2">
                                @can('print-cards-show')
                                <a href="{{ route('print-cards.show', $printCard) }}" class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave">
                                    <i class="ri-eye-line"></i>
                                </a>
                                @endcan
                                @can('print-cards-edit')
                                <a href="{{ route('print-cards.edit', $printCard) }}" class="ti-btn text-lg text-slate-400 !py-1 !px-1 ti-btn-wave">
                                    <i class="ri-pencil-line"></i>
                                </a>
                                @endcan
                                @can('print-cards-destroy')
                                <form action="{{ route('print-cards.destroy', $printCard) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este PrintCard?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ti-btn text-lg text-rose-400 !py-1 !px-1 ti-btn-wave">
                                        <i class="ri-delete-bin-2-line"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-4 text-center">
            <p class="text-gray-500">No hay PrintCards asociados a este código de barras.</p>
            @can('print-cards-create')
            <a href="{{ route('print-cards.create') }}" class="ti-btn ti-btn-primary mt-2">
                <i class="ri-add-line mr-1"></i> Crear el primer PrintCard
            </a>
            @endcan
        </div>
        @endif
        <div class="flex justify-end md:col-span-12 col-span-12">
            <a href="{{ url()->previous() }}" class="ti-btn ti-btn-primary-full mt-6">Regresar</a>
        </div>
    </div>
</div>
@endsection
