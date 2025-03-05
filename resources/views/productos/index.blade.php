@extends('layouts.master')

@section('content')

<!-- Page Header -->
<div class="block justify-between page-header md:flex">
    <ol class="flex items-center whitespace-nowrap min-w-0">
        <li class="text-[0.813rem] ps-[0.5rem]">
          <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
            Inicio
            <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
          </a>
        </li>
    </ol>
</div>
<!-- Page Header Close -->

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
      <div class="box">
        <div class="box-header">
          <h5 class="box-title">Productos</h5>
        </div>
        <div class="box-body space-y-3">
          <div class="flex justify-between">
            <div>
                <a href="{{ route('productos.create') }}" class="ti-btn ti-btn-primary px-4 py-2 rounded mb-4 inline-block">Agregar Nuevo Producto</a>
            </div>
            <div>
                <button type="button" class="ti-btn ti-btn-primary" id="download-xlsx">Descargar</button>
            </div>
          </div>
          <div class="overflow-hidden table-bordered">
            <div class="ti-custom-table ti-striped-table ti-custom-table-hover">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 text-left">SKU</th>
                                <th class="py-3 px-6 text-left">Familia</th>
                                <th class="py-3 px-6 text-left">Producto</th>
                                <th class="py-3 px-6 text-left">Color</th>
                                <th class="py-3 px-6 text-left">Tamaño</th>
                                <th class="py-3 px-6 text-left">Múltiplos Master</th>
                                <th class="py-3 px-6 text-left">Cupo Tarima</th>
                                <th class="py-3 px-6 text-left">Proveedor</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td class="py-3 px-6 text-left">{{ $producto->sku }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->familia->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->producto }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->colores->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->tamanos->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->multiplos_master ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->cupo_tarima ?? '-' }}</td>
                                    <td class="py-3 px-6 text-left">{{ $producto->proveedor->nombre ?? '-' }}</td>
                                    <td class="py-3 px-6 text-center">
                                    <a href="{{ route('productos.show', $producto->id) }}" class="text-blue-500">Ver</a>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="text-yellow-500 ml-2">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  
@endsection