<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MaterialesController extends Controller
{
    public function index()
    {
        return view('materiales.index');
    }

    public function create()
    {
        return view('materiales.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:materiales,nombre',
        ]);

        try {
            Material::create($validated);
            return redirect()->route('materiales.index')->with('success', 'Material creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el material: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Material $material)
    {
        return view('materiales.show', compact('material'));
    }

    public function edit(Material $material)
    {
        return view('materiales.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:materiales,nombre,' . $material->id,
        ]);

        try {
            $material->update($validated);
            return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el material: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Material $material)
    {
        try {
            $material->delete();
            return redirect()->route('materiales.index')->with('success', 'Material eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('materiales.index')->with('error', 'Error al eliminar el material: ' . $e->getMessage());
        }
    }
}