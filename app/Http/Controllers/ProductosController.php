<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use App\Traits\SortableSearchable;

class ProductosController extends Controller
{
    use SortableSearchable;

    public function index()
    {
        $query = Producto::query();

        // Aplicar filtros de búsqueda solo para campos con valores
        $searchParams = array_filter(request()->input('search', []), fn($value) => !empty($value));
        if (!empty($searchParams)) {
            foreach ($searchParams as $field => $value) {
                if ($field === 'id_familia') {
                    $query->whereHas('familia', function ($q) use ($value) {
                        $q->where('nombre', 'like', "%{$value}%");
                    });
                } elseif ($field === 'id_color') {
                    $query->whereHas('colores', function ($q) use ($value) {
                        $q->where('nombre', 'like', "%{$value}%");
                    });
                } elseif ($field === 'id_tamano') {
                    $query->whereHas('tamanos', function ($q) use ($value) {
                        $q->where('nombre', 'like', "%{$value}%");
                    });
                } elseif ($field === 'id_proveedor') {
                    $query->whereHas('proveedor', function ($q) use ($value) {
                        $q->where('nombre', 'like', "%{$value}%");
                    });
                } else {
                    $query->where($field, 'like', "%{$value}%");
                }
            }
        }

        // Aplicar ordenamiento
        if (request()->has('sort') && request()->has('direction')) {
            $sortField = request('sort');
            $direction = request('direction');

            if ($sortField === 'id_familia') {
                $query->join('familias', 'productos.id_familia', '=', 'familias.id')
                      ->orderBy('familias.nombre', $direction)
                      ->select('productos.*');
            } elseif ($sortField === 'id_color') {
                $query->join('colores', 'productos.id_color', '=', 'colores.id')
                      ->orderBy('colores.nombre', $direction)
                      ->select('productos.*');
            } elseif ($sortField === 'id_tamano') {
                $query->join('tamanos', 'productos.id_tamano', '=', 'tamanos.id')
                      ->orderBy('tamanos.nombre', $direction)
                      ->select('productos.*');
            } elseif ($sortField === 'id_proveedor') {
                $query->join('proveedores', 'productos.id_proveedor', '=', 'proveedores.id')
                      ->orderBy('proveedores.nombre', $direction)
                      ->select('productos.*');
            } else {
                $query->orderBy($sortField, $direction);
            }
        }

        // Paginar los resultados y preservar parámetros
        $productos = $query->paginate(10);
        $productos->appends($searchParams);
        if (request()->has('sort') && request()->has('direction')) {
            $productos->appends(['sort' => request('sort'), 'direction' => request('direction')]);
        }

        // Definir las columnas para la vista
        $columns = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true],
            ['name' => 'id_familia', 'label' => 'Familia', 'sortable' => true, 'searchable' => true],
            ['name' => 'producto', 'label' => 'Producto', 'sortable' => true, 'searchable' => true],
            ['name' => 'id_color', 'label' => 'Color', 'sortable' => true, 'searchable' => true],
            ['name' => 'id_tamano', 'label' => 'Tamaño', 'sortable' => true, 'searchable' => true],
            ['name' => 'multiplos_master', 'label' => 'Múltiplos Master', 'sortable' => true, 'searchable' => true],
            ['name' => 'cupo_tarima', 'label' => 'Cupo Tarima', 'sortable' => true, 'searchable' => true],
            ['name' => 'id_proveedor', 'label' => 'Proveedor', 'sortable' => true, 'searchable' => true],
        ];

        return view('productos.index', compact('productos', 'columns'));
    }

    public function test()
    {
        $productos = Producto::with(['familia', 'proveedor', 'tamanos', 'colores','printcards','codigosBarras'])->get();
        return view('productos.test', compact('productos'));
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
        $producto = Producto::with(['familia', 'proveedor', 'tamanos', 'colores','printcards','codigosBarras'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::with(['familia', 'proveedor', 'tamanos', 'colores','printcards','codigosBarras'])->findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sku' => 'required|max:45|unique:productos,sku,'.$id,
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
