<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public $items;

    public function __construct()
    {
        $currentRoute = Route::current()->getName();
        $this->items = $this->generateBreadcrumbs($currentRoute);
    }

    private function generateBreadcrumbs($routeName)
    {
        $items = [];
        $parts = explode('.', $routeName); // Ej. ['productos', 'index'] o ['productos', 'create']

        // Primer nivel: el módulo (ej. "Productos")
        if (isset($parts[0])) {
            $module = Str::ucfirst($parts[0]); // Capitalizamos el nombre del módulo
            $items[] = [
                'label' => $module,
                'url' => route("{$parts[0]}.index"),
                'active' => count($parts) === 1, // Activo si es la única parte (ej. productos.index)
            ];
        }

        // Segundo nivel: la acción (ej. "Crear", "Editar")
        if (isset($parts[1])) {
            $action = match ($parts[1]) {
                'index' => 'Lista', // Podemos personalizar esto
                'create' => 'Crear',
                'edit' => 'Editar',
                'show' => 'Ver',
                default => Str::ucfirst($parts[1]), // Capitalizar cualquier otra acción
            };
            $items[] = [
                'label' => $action,
                'url' => null, // Último elemento no tiene enlace
                'active' => true,
            ];
        }

        return $items;
    }

    public function render()
    {
        return view('components.breadcrumbs');
    }
}