<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\View\Components\Route;

class Breadcrumbs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $currentRoute = Route::current()->getName();
        $this->items = $this->generateBreadcrumbs($currentRoute);
    }

    private function generateBreadcrumbs($routeName)
    {
        $items = [];

        // Siempre empezar con el inicio (Productos)
        $items[] = [
            'label' => 'Productos',
            'url' => route('productos.index'),
            'active' => false,
        ];

        // Añadir elementos según la ruta actual
        switch ($routeName) {
            case 'productos.create':
                $items[] = [
                    'label' => 'Crear',
                    'url' => null,
                    'active' => true,
                ];
                break;
            case 'productos.edit':
                $items[] = [
                    'label' => 'Editar',
                    'url' => null,
                    'active' => true,
                ];
                break;
            case 'productos.show':
                $items[] = [
                    'label' => 'Ver',
                    'url' => null,
                    'active' => true,
                ];
                break;
            case 'productos.index':
                // Solo "Productos" ya está, no añadir más
                $items[0]['active'] = true;
                break;
        }

        return $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumbs');
    }
}
