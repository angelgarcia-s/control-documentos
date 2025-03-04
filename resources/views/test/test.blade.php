@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-4">Prueba de Tailwind CSS</h1>
        
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-lg text-gray-700 mb-4">Este es un párrafo con texto gris y márgenes.</p>
            
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Botón Azul
            </button>
            
            <div class="mt-6 flex space-x-4">
                <div class="w-1/3 bg-red-200 p-4 rounded">Caja Roja</div>
                <div class="w-1/3 bg-green-200 p-4 rounded">Caja Verde</div>
                <div class="w-1/3 bg-yellow-200 p-4 rounded">Caja Amarilla</div>
            </div>
            
            <ul class="mt-6 list-disc list-inside text-gray-600">
                <li>Elemento 1</li>
                <li>Elemento 2</li>
                <li>Elemento 3</li>
            </ul>
        </div>
    </div>
@endsection