<?php

namespace App\Http\Controllers;

use App\Models\TipoEmpaque;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TiposEmpaqueController extends Controller
{
    public function index()
    {
        return view('tipos-empaque.index');
    }

    public function create()
    {
        return view('tipos-empaque.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos_empaque,nombre',
        ]);

        try {
            TipoEmpaque::create($validated);
            return redirect()->route('tipos-empaque.index')->with('success', 'Tipo de empaque creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el tipo de empaque: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(TipoEmpaque $tipo_empaque)
    {
        return view('tipos-empaque.show', compact('tipo_empaque'));
    }

    public function edit(TipoEmpaque $tipo_empaque)
    {
        return view('tipos-empaque.edit', compact('tipo_empaque'));
    }

    public function update(Request $request, TipoEmpaque $tipo_empaque)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos_empaque,nombre,' . $tipo_empaque->id,
        ]);

        try {
            $tipo_empaque->update($validated);
            return redirect()->route('tipos-empaque.index')->with('success', 'Tipo de empaque actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el tipo de empaque: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(TipoEmpaque $tipo_empaque)
    {
        try {
           

            $tipo_empaque->delete();
            return redirect()->route('tipos-empaque.index')->with('success', 'Tipo de empaque eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('tipos-empaque.index')->with('error', 'No se puede eliminar el tipo de empaque porque tiene productos asociados.');
            }
            return redirect()->route('tipos-empaque.index')->with('error', 'Error al eliminar el tipo de empaque: ' . $e->getMessage());
        }
    }
}