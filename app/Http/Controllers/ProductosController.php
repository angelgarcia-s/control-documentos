<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\UnidadMedida;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\FamiliaProducto;
use App\Models\Color;
use App\Models\Tamano;
use Illuminate\Database\QueryException;

class ProductosController extends Controller
{
    /**
     * Muestra la vista de productos con Livewire.
     */
    public function index(Request $request)
{
    $user = auth()->user();
    $hasPermission = $user->hasPermissionTo('productos-list');
    //dd($user->name, $user->roles->pluck('name'), $user->getAllPermissions()->pluck('name'), $hasPermission);
    return view('productos.index');
}

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create(Request $request)
    {
        $skuGuardado = $request->query('skuGuardado');

        // Cargar los catálogos con ordenamiento alfabético por nombre
        $unidadesMedida = UnidadMedida::orderBy('nombre', 'asc')->get();
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        $proveedores = Proveedor::orderBy('nombre', 'asc')->get();
        $familias = FamiliaProducto::orderBy('nombre', 'asc')->get();
        $colores = Color::orderBy('nombre', 'asc')->get();
        $tamanos = Tamano::orderBy('nombre', 'asc')->get();

        return view('productos.create', compact(
            'skuGuardado',
            'unidadesMedida',
            'categorias',
            'proveedores',
            'familias',
            'colores',
            'tamanos'
        ));
    }

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
        ]);

        // Generar nombre_corto automáticamente ya que no se envía desde el formulario
        $familia = \App\Models\FamiliaProducto::find($validated['id_familia'])->nombre;
        $color = \App\Models\Color::find($validated['id_color'])->nombre;
        $tamano = \App\Models\Tamano::find($validated['id_tamano'])->nombre;
        $validated['nombre_corto'] = "$familia $color $tamano";

        $producto = Producto::create($validated);

        return response()->json([
            'success' => true,
            'sku' => $producto->sku,
            'message' => 'Producto creado correctamente.'
        ]);
    }

    /**
     * Muestra un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::with(['familia', 'categoria', 'proveedor', 'tamano', 'color', 'printcards', 'codigosBarras', 'productoCodigosBarras.codigoBarra'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::with(['familia', 'categoria', 'proveedor', 'tamano', 'color', 'printcards', 'codigosBarras'])->findOrFail($id);

        // Cargar los catálogos con ordenamiento alfabético por nombre
        $unidadesMedida = UnidadMedida::orderBy('nombre', 'asc')->get();
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        $proveedores = Proveedor::orderBy('nombre', 'asc')->get();
        $familias = FamiliaProducto::orderBy('nombre', 'asc')->get();
        $colores = Color::orderBy('nombre', 'asc')->get();
        $tamanos = Tamano::orderBy('nombre', 'asc')->get();

        return view('productos.edit', compact(
            'producto',
            'unidadesMedida',
            'categorias',
            'proveedores',
            'familias',
            'colores',
            'tamanos'
        ));
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
