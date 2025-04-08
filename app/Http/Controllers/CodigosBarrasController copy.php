<?php

namespace App\Http\Controllers;

use App\Models\CodigoBarra;
use App\Models\TipoEmpaque;
use App\Models\Empaque;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CodigosBarrasController extends Controller
{
    public function index()
    {
        return view('codigos-barras.index');
    }

    public function create()
    {
        $tiposEmpaque = TipoEmpaque::all(['id', 'nombre']);
        $empaques = Empaque::all(['id', 'nombre']);
        return view('codigos-barras.create', compact('tiposEmpaque', 'empaques'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:codigos_barras,codigo',
            'nombre' => 'required|string|max:255',
            'tipo_empaque' => 'required|string|max:50',
            'empaque' => 'nullable|string|max:50',
            'contenido' => 'nullable|string|max:255',
            'tipo' => 'required|in:EAN13,ITF14',
        ]);

        try {
            CodigoBarra::create($validated);
            return redirect()->route('codigos-barras.index')->with('success', 'Código de barra creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el código de barra: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(CodigoBarra $codigoBarra)
    {
        $codigoBarra->load('productos');
        return view('codigos-barras.show', compact('codigoBarra'));
    }

    public function edit(CodigoBarra $codigoBarra)
    {
        $tiposEmpaque = TipoEmpaque::all(['id', 'nombre']);
        $empaques = Empaque::all(['id', 'nombre']);
        return view('codigos-barras.edit', compact('codigoBarra', 'tiposEmpaque', 'empaques'));
    }

    public function update(Request $request, CodigoBarra $codigoBarra)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:codigos_barras,codigo,' . $codigoBarra->id,
            'nombre' => 'required|string|max:255',
            'tipo_empaque' => 'required|string|max:50',
            'empaque' => 'nullable|string|max:50',
            'contenido' => 'nullable|string|max:255',
            'tipo' => 'required|in:EAN13,ITF14',
        ]);

        try {
            $codigoBarra->update($validated);
            return redirect()->route('codigos-barras.index')->with('success', 'Código de barra actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el código de barra: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(CodigoBarra $codigoBarra)
    {
        try {
            if ($codigoBarra->productos()->count() > 0) {
                return redirect()->route('codigos-barras.index')->with('error', 'No se puede eliminar el código de barra porque tiene productos asociados.');
            }

            $codigoBarra->delete();
            return redirect()->route('codigos-barras.index')->with('success', 'Código de barra eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('codigos-barras.index')->with('error', 'No se puede eliminar el código de barra porque tiene productos asociados.');
            }
            return redirect()->route('codigos-barras.index')->with('error', 'Error al eliminar el código de barra: ' . $e->getMessage());
        }
    }
}