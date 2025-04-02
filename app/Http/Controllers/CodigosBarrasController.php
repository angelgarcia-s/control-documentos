<?php

namespace App\Http\Controllers;

use App\Models\CodigoBarra;
use App\Models\Producto;
use App\Models\TipoEmpaque;
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
        $tiposEmpaque = TipoEmpaque::all();
        return view('codigos-barras.create', compact('tiposEmpaque'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:20',
            'id_tipo_empaque' => 'required|exists:tipos_empaque,id',
            'contenido' => 'nullable|numeric',
            'sku' => 'nullable|string|max:45',
            'nombre_corto' => 'nullable|string|max:255',
        ]);

        try {
            CodigoBarra::create($validated);
            return redirect()->route('codigos-barras.index')->with('success', 'Código de barras creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el código de barras: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(CodigoBarra $codigos_barra)
    {
        return view('codigos-barras.show', compact('codigos_barra'));
    }

    public function edit(CodigoBarra $codigos_barra)
    {
        $tiposEmpaque = TipoEmpaque::all();
        return view('codigos-barras.edit', compact('codigos_barra', 'tiposEmpaque'));
    }

    public function update(Request $request, CodigoBarra $codigos_barra)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:20',
            'id_tipo_empaque' => 'required|exists:tipos_empaque,id',
            'contenido' => 'nullable|numeric',
            'sku' => 'nullable|string|max:45',
            'nombre_corto' => 'nullable|string|max:255',
        ]);

        try {
            $codigos_barra->update($validated);
            return redirect()->route('codigos-barras.index')->with('success', 'Código de barras actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el código de barras: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(CodigoBarra $codigos_barra)
    {
        try {
            if ($codigos_barra->productos()->count() > 0) {
                return redirect()->route('codigos-barras.index')->with('error', 'No se puede eliminar el código de barras porque está asociado a productos.');
            }

            $codigos_barra->delete();
            return redirect()->route('codigos-barras.index')->with('success', 'Código de barras eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('codigos-barras.index')->with('error', 'No se puede eliminar el código de barras porque está asociado a productos.');
            }
            return redirect()->route('codigos-barras.index')->with('error', 'Error al eliminar el código de barras: ' . $e->getMessage());
        }
    }

    public function asignar(){

        return view('codigos-barras.asignar');
    }
}