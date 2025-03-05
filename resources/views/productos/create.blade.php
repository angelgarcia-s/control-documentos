@extends('layouts.master')

@section('styles')

        <!-- Choices Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">

@endsection

@section('content') 

                    <!-- Page Header -->
                    <div class="block justify-between page-header md:flex">
                        <div>
                            <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">Crear un nuevo producto</h3>
                        </div>
                        <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[0.813rem] ps-[0.5rem]">
                              <a href="{{ route('productos.index') }}" class="flex items-center text-primary hover:text-primary dark:text-primary truncate">
                                Productos
                                <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                              </a>
                            </li>
                            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                                Crear
                            </li>
                        </ol>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start:: form -->
                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12">
                                <div class="box">
                                    <div class="box-header">
                                        <div class="box-title">
                                            Datos SAP
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                                            <div class="md:col-span-2 col-span-12 mb-4">
                                                <label for="codigo" class="form-label">Código (SKU)</label>
                                                <input type="text" id="codigo" name="codigo" required class="form-control" placeholder="Código"
                                                    aria-label="Código">
                                            </div>
                                            <div class="md:col-span-7 col-span-12 mb-4">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <input type="text" id="descripcion" name="descripcion" required class="form-control" placeholder="Descripción"
                                                    aria-label="Descripción">
                                            </div>
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="unidad_medida_ventas" class="form-label">Unidad de medida de ventas</label>
                                                <input type="text" id="unidad_medida_ventas" name="unidad_medida_ventas" required class="form-control" placeholder="Unidad de medida SAT"
                                                    aria-label="Unidad de medida SAT">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-header justify-between">
                                        <div class="box-title">
                                            Información del producto
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                                            <div class="md:col-span-4 col-span-12 mb-4">
                                                <label for="familia_producto" class="form-label">Familia de producto</label>
                                                <input type="text" id="familia_producto" name="familia_producto" required class="form-control" placeholder="Plus, Confort"
                                                    aria-label="Plus, Confort">
                                            </div>
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="color" class="form-label">Color</label>
                                                <input type="text" id="color" name="color" required class="form-control" placeholder="Color"
                                                    aria-label="Color">
                                            </div>
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="tamaño" class="form-label">Tamaño</label>
                                                <input type="text" id="tamaño" name="tamaño" required class="form-control" placeholder="Tamaño o talla"
                                                    aria-label="Tamaño o talla">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-header justify-between">
                                        <div class="box-title">
                                            Códigos de barras y Contenidos
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="codigo_barras_primario" class="form-label">Código de barras Primario</label>
                                                <input type="text" id="codigo_barras_primario" name="codigo_barras_primario" required class="form-control" placeholder="EAN-13"
                                                aria-label="Código de barras Primario">
                                            </div>
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="codigo_barras_secundario" class="form-label">Código de barras secundario</label>
                                                <input type="text" id="codigo_barras_secundario" name="codigo_barras_secundario"  class="form-control" placeholder="ITF-14"
                                                aria-label="Código de barras secundario">
                                            </div>
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="codigo_barras_terciario" class="form-label">Código de barras terciario</label>
                                                <input type="text" id="codigo_barras_terciario" name="codigo_barras_terciario"  class="form-control" placeholder="ITF-14"
                                                    aria-label="Código de barras terciario">
                                            </div>
                                            <div class="md:col-span-3 col-span-12 mb-4">
                                                <label for="codigo_barras_cuaternario" class="form-label">Código de barras cuaternario</label>
                                                <input type="text" id="codigo_barras_cuaternario" name="codigo_barras_cuaternario"  class="form-control" placeholder="ITF-14"
                                                    aria-label="Código de barras cuaternario">
                                            </div>
                                            <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                                                <label for="codigo_barras_master" class="form-label">Código de barras master</label>
                                                <input type="text" id="codigo_barras_master" name="codigo_barras_master" required class="form-control" placeholder="ITF-14"
                                                    aria-label="Código de barras master">
                                            </div>
                                            <div class="lg:col-span-2 md:col-span-4 col-span-12 mb-4">
                                                <label for="multiplos_master" class="form-label">Multiplos por Master</label>
                                                <input type="number" id="multiplos_master" name="multiplos_master" required class="form-control" placeholder="Piezas por cartón"
                                                    aria-label="Multiplos por Master">
                                            </div>
                                            <div class="lg:col-span-2 md:col-span-4 col-span-12  mb-4">
                                                <label for="cupo_tarima" class="form-label">Contenido de la Tarima</label>
                                                <input type="number" id="cupo_tarima" name="cupo_tarima" required class="form-control" placeholder="Cartones por tarima"
                                                    aria-label="Contenido de la Tarima">
                                            </div>
                                            <div class="lg:col-span-2 md:col-span-4 col-span-12 flex items-start justify-end">
                                                <label for="requiere_peso" class="text-sm form-label dark:text-[#8c9097] dark:text-white/50">Requiere peso</label>
                                                <!-- Input oculto que envía 0 cuando el checkbox no está seleccionado -->
                                                <input type="hidden" name="requiere_peso" value="0">
                                                <!-- Checkbox que envía 1 cuando está seleccionado -->
                                                <input type="checkbox" id="requiere_peso" name="requiere_peso" value="1" class="ti-switch ml-2" unchecked>
                                                
                                            </div>
                                            <div class="lg:col-span-2 md:col-span-4 col-span-12  mb-4">
                                                <label for="peso" class="form-label">Peso</label>
                                                <input type="text" id="peso" name="peso"  class="form-control" placeholder="Peso del cartón"
                                                    aria-label="Peso">
                                            </div>
                                            <div class="lg:col-span-2 md:col-span-4 col-span-12  mb-4">
                                                <label for="variacion_peso" class="form-label">Variación en el peso</label>
                                                <input type="text" id="variacion_peso" name="variacion_peso"  class="form-control" placeholder="Variacion permitida en gramos"
                                                    aria-label="Variación en el peso">
                                            </div>
                                            <div class="md:col-span-12 col-span-12">
                                                <button type="submit" class="ti-btn ti-btn-primary-full !mb-0">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </form>

   

    <!-- Modal -->
    <div id="barcodeModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    {{-- <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div> --}}
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Código de Barras Duplicado
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                El código de barras ingresado pertenece a los siguientes productos:
                            </p>
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2">Código</th>
                                        <th class="py-2">Nombre Corto</th>
                                    </tr>
                                </thead>
                                <tbody id="modal-body">
                                    <!-- El contenido se actualizará dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="btn-assign w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Asignar
                </button>
                <button type="button" class="btn-cancel mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const barcodeFields = document.querySelectorAll('input[name^="codigo_barras"]');
    
            barcodeFields.forEach(field => {
                field.addEventListener('blur', function() {
                    const barcode = this.value;
                    const fieldName = this.name;
    
                    if (barcode.length === 13 || barcode.length === 14) {
                        fetch('{{ route("productos.checkBarcode") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ barcode: barcode }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                const modal = document.getElementById('barcodeModal');
                                const modalBody = document.getElementById('modal-body');
                                const modalTitle = document.getElementById('modal-title');
                                modalBody.innerHTML = '';
    
                                data.productos.forEach(producto => {
                                    const row = document.createElement('tr');
                                    row.innerHTML = `
                                        <td class="py-2">${producto.codigo}</td>
                                        <td class="py-2">${producto.nombre_corto}</td>
                                    `;
                                    modalBody.appendChild(row);
                                });
    
                                let titleText = 'Código de Barras Duplicado';
                                if (fieldName === 'codigo_barras_primario') {
                                    titleText = 'Código de Barras Primario Duplicado';
                                } else if (fieldName === 'codigo_barras_secundario') {
                                    titleText = 'Código de Barras Secundario Duplicado';
                                } else if (fieldName === 'codigo_barras_terciario') {
                                    titleText = 'Código de Barras Terciario Duplicado';
                                } else if (fieldName === 'codigo_barras_cuaternario') {
                                    titleText = 'Código de Barras Cuaternario Duplicado';
                                } else if (fieldName === 'codigo_barras_master') {
                                    titleText = 'Código de Barras Master Duplicado';
                                }
    
                                modalTitle.innerText = titleText;
                                modal.querySelector('.btn-assign').dataset.barcode = barcode;
                                modal.classList.remove('hidden');
                            }
                        });
                    }
                });
            });
    
            document.querySelector('.btn-assign').addEventListener('click', function() {
                const barcode = this.dataset.barcode;
                const field = document.querySelector(`input[value="${barcode}"]`);
                if (field) {
                    field.dataset.ignoreValidation = true;
                }
                document.getElementById('barcodeModal').classList.add('hidden');
            });
    
            document.querySelector('.btn-cancel').addEventListener('click', function() {
                document.getElementById('barcodeModal').classList.add('hidden');
            });
        });
    </script>
    
    
    
    
  
        
@endsection

@section('scripts')

        <!-- Modal JS -->
        @vite('resources/assets/js/modal.js')

@endsection