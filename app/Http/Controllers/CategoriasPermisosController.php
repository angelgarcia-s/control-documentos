<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\NombreVisualCategoriaPermiso;

class CategoriasPermisosController extends Controller
{
    public function edit()
    {
        // Obtener todas las categorías únicas de la tabla permissions
        $categoriasOriginales = Permission::select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Obtener las categorías con su orden y nombre visual
        $categoriasConOrden = NombreVisualCategoriaPermiso::whereIn('categoria', $categoriasOriginales)
            ->orderBy('orden', 'asc')
            ->orderBy('categoria', 'asc')
            ->get()
            ->pluck('categoria')
            ->toArray();

        // Asegurarnos de incluir todas las categorías, incluso las que no tienen nombre visual
        $categorias = array_unique(array_merge($categoriasConOrden, $categoriasOriginales));

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
        // Decodificar el orden de categorías desde JSON a un arreglo
        $ordenCategorias = json_decode($request->input('orden_categorias', '[]'), true);

        // Decodificar las claves del arreglo display_names
        $displayNames = [];
        foreach ($displayNamesEncoded as $encodedCategoria => $nombreVisual) {
            // No necesitamos urldecode porque las categorías ahora tienen guiones
            $categoria = $encodedCategoria;
            // Si el nombre visual está vacío, usar el nombre transformado de la categoría
            $nombreVisual = trim($nombreVisual) ?: ucwords(str_replace('-', ' ', $categoria));
            $nombreVisual = str_replace('Codigos', 'Códigos', $nombreVisual);
            $displayNames[$categoria] = $nombreVisual;
        }

        // Guardar un registro para todas las categorías
        foreach ($categorias as $categoria) {
            $nombreVisual = $displayNames[$categoria] ?? ucwords(str_replace('-', ' ', $categoria));
            $nombreVisual = str_replace('Codigos', 'Códigos', $nombreVisual);
            $orden = array_search($categoria, $ordenCategorias) !== false ? array_search($categoria, $ordenCategorias) + 1 : null;

            NombreVisualCategoriaPermiso::updateOrCreate(
                ['categoria' => $categoria],
                [
                    'nombre_visual' => $nombreVisual,
                    'orden' => $orden,
                ]
            );
        }

        return redirect()->route('permisos.index')
            ->with('success', 'Nombres de visualización y orden de categorías actualizados correctamente.');
    }
}
