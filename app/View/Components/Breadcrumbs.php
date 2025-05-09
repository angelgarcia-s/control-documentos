<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

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
        $parts = explode('.', $routeName); // Ej. ['permisos', 'index']

        // Siempre agregar "Inicio" como el primer nivel, enlazando a "/"
        $items[] = [
            'label' => 'Inicio',
            'url' => '/',
            'active' => false,
        ];

        // Obtener el prefijo de la URL (ej. 'permisos/categorias')
        $uri = Request::path(); // Ej. 'permisos/categorias/edit'
        $uriParts = explode('/', $uri); // Ej. ['permisos', 'categorias', 'edit']
        $prefixParts = array_slice($uriParts, 0, -1); // Excluir la última parte ('edit') -> ['permisos', 'categorias']

        // Generar el nivel del módulo (ej. "Permisos")
        if (!empty($prefixParts)) {
            $currentPrefix = '';
            $indexRoute = null;

            // Construir niveles superiores basados en la jerarquía de la URL
            for ($i = 0; $i < count($prefixParts); $i++) {
                $currentPrefix = implode('-', array_slice($prefixParts, 0, $i + 1)); // Ej. 'permisos', luego 'permisos-categorias'
                $possibleIndexRoute = "{$currentPrefix}.index";
                if (Route::has($possibleIndexRoute)) {
                    $indexRoute = $possibleIndexRoute;
                    break;
                }
            }

            // Si encontramos una ruta .index, generamos el enlace
            if ($indexRoute) {
                $moduleLabel = Str::ucfirst(str_replace('-', ' ', $currentPrefix));
                $items[] = [
                    'label' => $moduleLabel,
                    'url' => route($indexRoute),
                    'active' => count($parts) === 1, // Activo si es la única parte
                ];
            } else {
                // Si no encontramos ninguna ruta .index, mostramos el nombre del módulo sin enlace
                $moduleLabel = Str::ucfirst(str_replace('-', ' ', $prefixParts[0]));
                $items[] = [
                    'label' => $moduleLabel,
                    'url' => null,
                    'active' => count($parts) === 1,
                ];
            }
        } else {
            // Si no hay prefijo (ruta como '/permisos'), usamos el nombre de la ruta para el módulo
            if (isset($parts[0])) {
                $moduleLabel = Str::ucfirst(str_replace('-', ' ', $parts[0]));
                $indexRoute = "{$parts[0]}.index";
                $url = Route::has($indexRoute) ? route($indexRoute) : null;
                $items[] = [
                    'label' => $moduleLabel,
                    'url' => $url,
                    'active' => count($parts) === 1,
                ];
            }
        }

        // Segundo nivel: la acción (ej. "Crear", "Editar", "Lista")
        if (isset($parts[1])) {
            $action = match ($parts[1]) {
                'index' => 'Lista',
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
