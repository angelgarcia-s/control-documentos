@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Detalles del Producto</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p><strong>Código:</strong> {{ $producto->sku }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Unidad de Medida de Ventas:</strong> {{ $producto->unidad_medida_ventas }}</p>
            <p><strong>Múltiplos Master:</strong> {{ $producto->multiplos_master }}</p>
            <p><strong>Código de Barras Primario:</strong> {{ $producto->codigo_barras_primario }}</p>
            <p><strong>Código de Barras Secundario:</strong> {{ $producto->codigo_barras_secundario }}</p>
            <p><strong>Código de Barras Terciario:</strong> {{ $producto->codigo_barras_terciario }}</p>
            <p><strong>Código de Barras Cuaternario:</strong> {{ $producto->codigo_barras_cuaternario }}</p>
            <p><strong>Código de Barras Master:</strong> {{ $producto->codigo_barras_master }}</p>
            <p><strong>Nombre Corto:</strong> {{ $producto->nombre_corto }}</p>
            <p><strong>Familia del Producto:</strong> {{ $producto->familia_producto }}</p>
            <p><strong>Color:</strong> {{ $producto->color }}</p>
            <p><strong>Tamaño:</strong> {{ $producto->tamaño }}</p>
            <p><strong>Cupo de Tarima:</strong> {{ $producto->cupo_tarima }}</p>
            <p><strong>Requiere Peso:</strong> {{ $producto->requiere_peso ? 'Sí' : 'No' }}</p>
            <p><strong>Peso:</strong> {{ $producto->peso }}</p>
            <p><strong>Variación de Peso:</strong> {{ $producto->variacion_peso }}</p>
        </div>
        <a href="{{ route('productos.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Volver a la lista de productos</a>
    </div>
@endsection
