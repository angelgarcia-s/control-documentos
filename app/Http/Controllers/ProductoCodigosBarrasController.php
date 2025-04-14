<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CodigoBarra;
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
        $tiposEmpaque = \App\Models\TipoEmpaque::all(['id', 'nombre']);
        return view('codigos-barras.asignar', compact('producto', 'codigosDisponibles', 'tiposEmpaque', 'sku')); // Añadimos 'sku'
    }

    public function store(Request $request, $sku)
    {
        $producto = Producto::where('sku', $sku)->firstOrFail();

        $validated = $request->validate([
            'filas' => 'required|array',
            'filas.*.codigo' => 'required|string|exists:codigos_barras,codigo',
            'filas.*.tipo_empaque' => 'required|string|max:50',
            'filas.*.contenido' => 'nullable|string|max:255',
        ]);

        try {
            foreach ($validated['filas'] as $fila) {
                // Verificar si el tipo de empaque ya está asignado para este producto
                if ($producto->codigosBarras()->wherePivot('tipo_empaque', $fila['tipo_empaque'])->exists()) {
                    return redirect()->back()->withErrors(['error' => "El tipo de empaque '{$fila['tipo_empaque']}' ya está asignado a otro código para este producto."]);
                }

                // Buscar el código de barras por su código
                $codigoBarra = CodigoBarra::where('codigo', $fila['codigo'])->first();
                if ($codigoBarra) {
                    $producto->codigosBarras()->attach($codigoBarra->id, [
                        'tipo_empaque' => $fila['tipo_empaque'],
                        'contenido' => $fila['contenido'],
                    ]);
                }
            }

            return redirect()->route('codigos-barras.asignar', $sku)->with('success', 'Códigos asignados correctamente.');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Error al asignar los códigos: ' . $e->getMessage()]);
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
        $tiposEmpaque = \App\Models\TipoEmpaque::all(['id', 'nombre']);
        return view('producto-codigos-barras.edit', compact('asignacion', 'tiposEmpaque'));
    }

    public function update(Request $request, $id)
    {
        $asignacion = ProductoCodigosBarras::findOrFail($id);
        $producto = $asignacion->producto;

        $validated = $request->validate([
            'tipo_empaque' => 'required|string|max:50',
            'contenido' => 'nullable|string|max:255',
        ]);

        try {
            if ($producto->codigosBarras()->wherePivot('tipo_empaque', $validated['tipo_empaque'])->where('codigo_barra_id', '!=', $asignacion->codigo_barra_id)->exists()) {
                return redirect()->back()->withErrors(['tipo_empaque' => 'Este tipo de empaque ya está asignado a otro código para este producto.'])->withInput();
            }

            $producto->codigosBarras()->updateExistingPivot($asignacion->codigo_barra_id, [
                'tipo_empaque' => $validated['tipo_empaque'],
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