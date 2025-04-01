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
        $validated = $request->validate([
            'sku' => 'required|string|max:45|unique:productos,sku',
            'descripcion' => 'required|string|max:1000',
            'id_unidad_medida' => 'required|exists:unidades_medida,id',
            'id_categoria' => 'required|exists:categorias,id',
            'id_familia' => 'required|exists:familia_productos,id',
            'id_color' => 'required|exists:colores,id',
            'id_tamano' => 'required|exists:tamanos,id',
            'id_proveedor' => 'required|exists:proveedores,id',
            'multiplos_master' => 'required|integer|min:1',
            'cupo_tarima' => 'required|integer|min:1',
            'requiere_peso' => 'required|in:SI,NO',
            'peso' => 'nullable|numeric|min:0',
            'variacion_peso' => 'nullable|numeric|min:0',
            'codigo_barras_primario' => 'nullable|string|max:255',
            'codigo_barras_secundario' => 'nullable|string|max:255',
            'codigo_barras_terciario' => 'nullable|string|max:255',
            'codigo_barras_cuaternario' => 'nullable|string|max:255',
            'codigo_barras_master' => 'nullable|string|max:255',
        ]);

        try {
            // Generar nombre_corto manualmente antes de crear
            $nombre_corto = implode(' ', [
                \App\Models\FamiliaProducto::find($validated['id_familia'])->nombre ?? 'Sin Familia',
                \App\Models\Color::find($validated['id_color'])->nombre ?? 'Sin Color',
                \App\Models\Tamano::find($validated['id_tamano'])->nombre ?? 'Sin Tamaño',
            ]);
            $validated['nombre_corto'] = $nombre_corto;

            $producto = Producto::create($validated);
            return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el producto: ' . $e->getMessage()])->withInput();
        }
    }
    /**
     * Muestra un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::with(['familia', 'categoria', 'proveedor', 'tamano', 'color', 'printcards', 'codigosBarras'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::with(['familia', 'categoria', 'proveedor', 'tamano', 'color', 'printcards', 'codigosBarras'])->findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'sku' => 'required|max:45|unique:productos,sku,' . $producto->id,
            'descripcion' => 'required',
            'id_familia' => 'required|exists:familia_productos,id',
            'id_categoria' => 'required|exists:categorias,id',
            'id_tamano' => 'required|exists:tamanos,id',
            'id_color' => 'required|exists:colores,id',
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_unidad_medida' => 'required|exists:unidades_medida,id',
            'multiplos_master' => 'required|integer',
            'nombre_corto' => 'required|max:500',
            'cupo_tarima' => 'required|integer',
            'requiere_peso' => 'required|in:SI,NO',
            'peso' => 'nullable|numeric',
            'variacion_peso' => 'nullable|numeric'
        ]);

        try {
            // Actualizar el producto con los datos validados
            $producto->update($validated);

            return redirect()->route('productos.index', $producto)->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            // Si algo falla, redirigir con el error y los datos ingresados
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el producto: ' . $e->getMessage()])->withInput();
        }
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