<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        return view('unidades.index');
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:unidades_medida,nombre',
        ]);

        try {
            UnidadMedida::create($validated);
            return redirect()->route('unidades.index')->with('success', 'Unidad de medida creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la unidad de medida: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(UnidadMedida $unidad)
    {
        $unidad->load('productos');
        return view('unidades.show', compact('unidad'));
    }

    public function edit(UnidadMedida $unidad)
    {
        return view('unidades.edit', compact('unidad'));
    }

    public function update(Request $request, UnidadMedida $unidad)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:unidades_medida,nombre,' . $unidad->id,
        ]);

        try {
            $unidad->update($validated);
            return redirect()->route('unidades.index')->with('success', 'Unidad de medida actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la unidad de medida: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(UnidadMedida $unidad)
    {
        try {
            if ($unidad->productos()->count() > 0) {
                return redirect()->route('unidades.index')->with('error', 'No se puede eliminar la unidad de medida porque tiene productos asociados.');
            }

            $unidad->delete();
            return redirect()->route('unidades.index')->with('success', 'Unidad de medida eliminada correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('unidades.index')->with('error', 'No se puede eliminar la unidad de medida porque tiene productos asociados.');
            }
            return redirect()->route('unidades.index')->with('error', 'Error al eliminar la unidad de medida: ' . $e->getMessage());
        }
    }
}