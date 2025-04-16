@extends('layouts.master')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Prueba de Tailwind CSS</h1>
        <div class="mb-4">
            <label for="test-input" class="block text-sm font-medium text-gray-700">Input de prueba:</label>
            <input id="test-input"
                   type="text"
                   class="form-control custom-input-focus"
                   placeholder="Haz clic aquí para dar foco" />
        </div>


    </div>
@endsection
