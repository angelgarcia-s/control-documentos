@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código</label>
                <input type="text" id="codigo" name="codigo" value="{{ $producto->codigo }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="unidad_medida_ventas" class="block text-gray-700 text-sm font-bold mb-2">Unidad de Medida de Ventas</label>
                <input type="text" id="unidad_medida_ventas" name="unidad_medida_ventas" value="{{ $producto->unidad_medida_ventas }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="multiplos_master" class="block text-gray-700 text-sm font-bold mb-2">Múltiplos Master</label>
                <input type="number" id="multiplos_master" name="multiplos_master" value="{{ $producto->multiplos_master }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="codigo_barras_primario" class="block text-gray-700 text-sm font-bold mb-2">Código de Barras Primario</label>
                <input type="text" id="codigo_barras_primario" name="codigo_barras_primario" value="{{ $producto->codigo_barras_primario }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="codigo_barras_secundario" class="block text-gray-700 text-sm font-bold mb-2">Código de Barras Secundario</label>
                <input type="text" id="codigo_barras_secundario" name="codigo_barras_secundario" value="{{ $producto->codigo_barras_secundario }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="codigo_barras_terciario" class="block text-gray-700 text-sm font-bold mb-2">Código de Barras Terciario</label>
                <input type="text" id="codigo_barras_terciario" name="codigo_barras_terciario" value="{{ $producto->codigo_barras_terciario }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="codigo_barras_cuaternario" class="block text-gray-700 text-sm font-bold mb-2">Código de Barras Cuaternario</label>
                <input type="text" id="codigo_barras_cuaternario" name="codigo_barras_cuaternario" value="{{ $producto->codigo_barras_cuaternario }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="codigo_barras_master" class="block text-gray-700 text-sm font-bold mb-2">Código de Barras Master</label>
                <input type="text" id="codigo_barras_master" name="codigo_barras_master" value="{{ $producto->codigo_barras_master }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="familia_producto" class="block text-gray-700 text-sm font-bold mb-2">Familia del Producto</label>
                <input type="text" id="familia_producto" name="familia_producto" value="{{ $producto->familia_producto }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                <input type="text" id="color" name="color" value="{{ $producto->color }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="tamaño" class="block text-gray-700 text-sm font-bold mb-2">Tamaño</label>
                <input type="text" id="tamaño" name="tamaño" value="{{ $producto->tamaño }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="cupo_tarima" class="block text-gray-700 text-sm font-bold mb-2">Cupo de Tarima</label>
                <input type="number" id="cupo_tarima" name="cupo_tarima" value="{{ $producto->cupo_tarima }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="requiere_peso" class="block text-gray-700 text-sm font-bold mb-2">Requiere Peso</label>
                <select id="requiere_peso" name="requiere_peso" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="1" {{ $producto->requiere_peso ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$producto->requiere_peso ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="peso" class="block text-gray-700 text-sm font-bold mb-2">Peso</label>
                <input type="text" id="peso" name="peso" value="{{ $producto->peso }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="variacion_peso" class="block text-gray-700 text-sm font-bold mb-2">Variación de Peso</label>
                <input type="text" id="variacion_peso" name="variacion_peso" value="{{ $producto->variacion_peso }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
