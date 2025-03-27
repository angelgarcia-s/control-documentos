<?php

namespace App\Http\Controllers;

use App\Models\TipoSello;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TiposSelloController extends Controller
{
    public function index()
    {
        return view('tipos-sello.index');
    }

    public function create()
    {
        return view('tipos-sello.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos_sello,nombre',
        ]);

        try {
            TipoSello::create($validated);
            return redirect()->route('tipos-sello.index')->with('success', 'Tipo de sello creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el tipo de sello: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(TipoSello $tipo_sello)
    {
        return view('tipos-sello.show', compact('tipo_sello'));
    }

    public function edit(TipoSello $tipo_sello)
    {
        return view('tipos-sello.edit', compact('tipo_sello'));
    }

    public function update(Request $request, TipoSello $tipo_sello)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos_sello,nombre,' . $tipo_sello->id,
        ]);

        try {
            $tipo_sello->update($validated);
            return redirect()->route('tipos-sello.index')->with('success', 'Tipo de sello actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el tipo de sello: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(TipoSello $tipo_sello)
    {
        try {
            $tipo_sello->delete();
            return redirect()->route('tipos-sello.index')->with('success', 'Tipo de sello eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('tipos-sello.index')->with('error', 'Error al eliminar el tipo de sello: ' . $e->getMessage());
        }
    }
}