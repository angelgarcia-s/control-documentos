<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\NombreVisualCategoriaPermiso;

class CategoriasPermisosController extends Controller
{
    public function edit()
    {
        // Obtener todas las categorías únicas de la tabla permissions, ordenadas alfabéticamente (ASC)
        $categorias = Permission::select('category')
            ->distinct()
            ->orderBy('category', 'asc')
            ->pluck('category');

        // Obtener los nombres de visualización existentes
        $nombresVisuales = NombreVisualCategoriaPermiso::whereIn('categoria', $categorias)
            ->pluck('nombre_visual', 'categoria')
            ->toArray();

        return view('permisos.categorias.edit', compact('categorias', 'nombresVisuales'));
    }

    public function update(Request $request)
    {
        $categorias = Permission::select('category')->distinct()->pluck('category')->toArray();
        $displayNamesEncoded = $request->input('display_names', []);

        // Decodificar las claves del arreglo display_names
        $displayNames = [];
        foreach ($displayNamesEncoded as $encodedCategoria => $nombreVisual) {
            $categoria = urldecode($encodedCategoria);
            $displayNames[$categoria] = $nombreVisual;
        }

        foreach ($categorias as $categoria) {
            $nombreVisual = $displayNames[$categoria] ?? null;
            if ($nombreVisual) {
                NombreVisualCategoriaPermiso::updateOrCreate(
                    ['categoria' => $categoria],
                    ['nombre_visual' => $nombreVisual]
                );
            }
        }

        return redirect()->route('permisos.index')
            ->with('success', 'Nombres de visualización de categorías actualizados correctamente.');
    }
}
