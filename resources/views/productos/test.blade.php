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
                    <thead class="bg-blue-400 dark:bg-gray-700">
                        <tr>
                            <th class="py-3 px-6 text-center">SKU</th>
                                <th class="py-3 px-6 text-center">Familia</th>
                                <th class="py-3 px-6 text-center">Producto</th>
                                <th class="py-3 px-6 text-center">Color</th>
                                <th class="py-3 px-6 text-center">Tamaño</th>
                                <th class="py-3 px-6 text-center">Múltiplos Master</th>
                                <th class="py-3 px-6 text-center">Cupo Tarima</th>
                                <th class="py-3 px-6 text-center">Proveedor</th>
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
  <div class="bg-blue-500 text-white p-4">
    Si ves este fondo azul, Tailwind está funcionando correctamente.
</div>
  
@endsection

@section('scripts')

        <!-- Tabulator JS -->
        <script src="{{asset('build/assets/libs/tabulator-tables/js/tabulator.min.js')}}"></script>

        <!-- Choices JS -->
        <script src="{{asset('build/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

        <!-- XLXS JS -->
        <script src="{{asset('build/assets/libs/xlsx/xlsx.full.min.js')}}"></script>

        <!-- JSPDF JS -->
        <script src="{{asset('build/assets/libs/jspdf/jspdf.umd.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/jspdf-autotable/jspdf.plugin.autotable.min.js')}}"></script>

        <!-- Tabulator Custom JS -->
        @vite('resources/assets/js/datatable.js')
        

@endsection
