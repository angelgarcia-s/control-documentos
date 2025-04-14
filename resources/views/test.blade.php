<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Tailwind CSS</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="p-6">
    <h1 class="text-2xl font-bold mb-4">Prueba de Tailwind CSS</h1>
    <div class="mb-4">
        <label for="test-input" class="block text-sm font-medium text-gray-700">Input de prueba:</label>
        <input id="test-input"
               type="text"
               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
               placeholder="Haz clic aquí para dar foco">
    </div>
</body>
</html>
