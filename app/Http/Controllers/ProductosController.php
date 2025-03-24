<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Database\QueryException;

class ProductosController extends Controller
{
    /**
     * Muestra la vista de productos con Livewire.
     */
    public function index()
    {
        return view('productos.index');
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:productos,sku|max:45',
            'descripcion' => 'required',
            'id_familia' => 'required|exists:familia_productos,id',
            'id_tamano' => 'nullable|exists:tamanos,id',
            'id_color' => 'nullable|exists:colores,id',
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_unidad_medida' => 'nullable|exists:unidad_medida,id',
            'multiplos_master' => 'nullable|integer',
            'producto' => 'required|max:500',
            'nombre_corto' => 'required|max:500',
            'cupo_tarima' => 'nullable|integer',
            'requiere_peso' => 'required|in:SI,NO',
            'peso_gramos' => 'nullable|numeric'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Muestra un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::with(['familia', 'proveedor', 'tamano', 'color', 'printcards', 'codigosBarras'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::with(['familia', 'proveedor', 'tamano', 'color', 'printcards', 'codigosBarras'])->findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sku' => 'required|max:45|unique:productos,sku,' . $id,
            'descripcion' => 'required',
            'id_familia' => 'required|exists:familia_productos,id',
            'id_tamano' => 'nullable|exists:tamanos,id',
            'id_color' => 'nullable|exists:colores,id',
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_unidad_medida' => 'nullable|exists:unidad_medida,id',
            'multiplos_master' => 'nullable|integer',
            'producto' => 'required|max:500',
            'nombre_corto' => 'required|max:500',
            'cupo_tarima' => 'nullable|integer',
            'requiere_peso' => 'required|in:SI,NO',
            'peso_gramos' => 'nullable|numeric'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') { // Violación de integridad (foreign key constraint)
                if (str_contains($e->getMessage(), 'print_cards')) {
                    return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto porque tiene PrintCards asociados.');
                } elseif (str_contains($e->getMessage(), 'codigos_barras')) {
                    return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto porque tiene códigos de barras asociados.');
                }
            }
            return redirect()->route('productos.index')->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }
}