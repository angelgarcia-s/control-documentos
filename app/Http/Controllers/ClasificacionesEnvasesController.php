<?php

namespace App\Http\Controllers;

use App\Models\ClasificacionEnvase;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ClasificacionesEnvasesController extends Controller
{
    public function index()
    {
        return view('clasificaciones-envases.index');
    }

    public function create()
    {
        return view('clasificaciones-envases.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'orden' => 'required|integer|min:0',
            'nombre' => 'required|string|max:255|unique:clasificaciones_envases,nombre',
        ]);

        try {
            ClasificacionEnvase::create($validated);
            return redirect()->route('clasificaciones-envases.index')->with('success', 'Clasificación de envase creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la clasificación del envase: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(ClasificacionEnvase $clasificacionEnvase)
    {
        return view('clasificaciones-envases.show', compact('clasificacionEnvase'));
    }

    public function edit(ClasificacionEnvase $clasificacionEnvase)
    {
        return view('clasificaciones-envases.edit', compact('clasificacionEnvase'));
    }

    public function update(Request $request, ClasificacionEnvase $clasificacionEnvase)
    {
        $validated = $request->validate([
            'orden' => 'required|integer|min:0',
            'nombre' => 'required|string|max:255|unique:clasificaciones_envases,nombre,' . $clasificacionEnvase->id,
        ]);

        try {
            $clasificacionEnvase->update($validated);
            return redirect()->route('clasificaciones-envases.index')->with('success', 'Clasificación de envase actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la clasificación del envase: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(ClasificacionEnvase $clasificacionEnvase)
    {
        try {


            $clasificacionEnvase->delete();
            return redirect()->route('clasificaciones-envases.index')->with('success', 'la clasificación del envase eliminada correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('clasificaciones-envases.index')->with('error', 'No se puede eliminar la clasificación del envase porque tiene productos asociados.');
            }
            return redirect()->route('clasificaciones-envases.index')->with('error', 'Error al eliminar la clasificación del envase: ' . $e->getMessage());
        }
    }
}
