<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CodigoBarra;
use App\Models\ClasificacionEnvase;
use App\Models\ProductoCodigosBarras;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductoCodigosBarrasController extends Controller
{
    public function index()
    {
        return view('producto-codigos-barras.index');
    }

    public function create($sku)
    {
        $producto = Producto::where('sku', $sku)->firstOrFail();
        $codigosDisponibles = CodigoBarra::all(['id', 'codigo', 'nombre']);
        $clasificacionesEnvases = ClasificacionEnvase::all(['id', 'nombre']);
        return view('codigos-barras.asignar', compact('producto', 'codigosDisponibles', 'clasificacionesEnvases', 'sku')); // Añadimos 'sku'
    }

    public function store(Request $request, $sku)
    {
        try {
            // Validar los datos de entrada
            $validated = $request->validate([
                'filas' => 'required|array',
                'filas.*.codigo' => 'required|string|exists:codigos_barras,codigo',
                'filas.*.clasificacion_envase' => 'required|string|max:50',
                'filas.*.contenido' => 'nullable|string|max:255',
            ]);

            // Obtener el producto por SKU
            $producto = Producto::where('sku', $sku)->firstOrFail();

            // Obtener los códigos de barras existentes en una sola consulta
            $codigos = CodigoBarra::whereIn('codigo', array_column($validated['filas'], 'codigo'))->pluck('id', 'codigo');

            // Obtener las clasificaciones de envase ya asignados al producto en una sola consulta
            $clasificacionEnvaseExistentes = $producto->codigosBarras()
                ->wherePivotIn('clasificacion_envase', array_column($validated['filas'], 'clasificacion_envase'))
                ->pluck('producto_codigos_barras.clasificacion_envase')
                ->toArray();

            // Validar las clasificaciones de envase duplicados
            foreach ($validated['filas'] as $fila) {
                if (in_array($fila['clasificacion_envase'], $clasificacionEnvaseExistentes)) {
                    return response()->json([
                        'success' => false,
                        'message' => "La clasificacion de envase '{$fila['clasificacion_envase']}' ya está asignado a otro código para este producto."
                    ], 422);
                }
            }

            // Preparar datos para una inserción masiva
            $pivotData = [];
            foreach ($validated['filas'] as $fila) {
                $codigoId = $codigos[$fila['codigo']] ?? null;
                if ($codigoId) {
                    $pivotData[$codigoId] = [
                        'clasificacion_envase' => $fila['clasificacion_envase'],
                        'contenido' => $fila['contenido'],
                    ];
                }
            }

            // Insertar todas las relaciones de una sola vez
            if (!empty($pivotData)) {
                $producto->codigosBarras()->syncWithoutDetaching($pivotData);
            }

            return response()->json([
                'success' => true,
                'message' => 'Códigos asignados correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al asignar los códigos: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $asignacion = ProductoCodigosBarras::with(['producto', 'codigoBarra'])->findOrFail($id);
        return view('producto-codigos-barras.show', compact('asignacion'));
    }

    public function edit($id)
    {
        $asignacion = ProductoCodigosBarras::with(['producto', 'codigoBarra'])->findOrFail($id);
        $clasificacionesEnvases = ClasificacionEnvase::all(['id', 'nombre']);
        return view('producto-codigos-barras.edit', compact('asignacion', 'clasificacionesEnvases'));
    }

    public function update(Request $request, $id)
    {
        $asignacion = ProductoCodigosBarras::findOrFail($id);
        $producto = $asignacion->producto;

        $validated = $request->validate([
            'clasificacion_envase' => 'required|string|max:50',
            'contenido' => 'nullable|string|max:255',
        ]);

        try {
            if ($producto->codigosBarras()->wherePivot('clasificacion_envase', $validated['clasificacion_envase'])->where('codigo_barra_id', '!=', $asignacion->codigo_barra_id)->exists()) {
                return redirect()->back()->withErrors(['clasificacion_envase' => 'Esta clasificación de envase ya está asignado a otro código para este producto.'])->withInput();
            }

            $producto->codigosBarras()->updateExistingPivot($asignacion->codigo_barra_id, [
                'clasificacion_envase' => $validated['clasificacion_envase'],
                'contenido' => $validated['contenido'],
            ]);

            return redirect()->route('producto-codigos-barras.index')->with('success', 'Asignación actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la asignación: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        $asignacion = ProductoCodigosBarras::findOrFail($id);

        try {
            $asignacion->delete();
            return redirect()->route('producto-codigos-barras.index')->with('success', 'Asignación eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('producto-codigos-barras.index')->with('error', 'Error al eliminar la asignación: ' . $e->getMessage());
        }
    }
}
