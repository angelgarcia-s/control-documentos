<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProducto;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class FamiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('familias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:familia_productos,nombre',
        ]);

        try {
            FamiliaProducto::create($validated);
            return redirect()->route('familias.index')->with('success', 'Familia creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la familia: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FamiliaProducto $familia)
    {
        $familia->load('productos');
        return view('familias.show', compact('familia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamiliaProducto $familia)
    {
        return view('familias.edit', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FamiliaProducto $familia)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:familia_productos,nombre,' . $familia->id,
        ]);

        try {
            $familia->update($validated);
            return redirect()->route('familias.index')->with('success', 'Familia actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la familia: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamiliaProducto $familia)
    {
        try {
            // Validar si tiene productos asociados
            if ($familia->productos()->count() > 0) {
                return redirect()->route('familias.index')->with('error', 'No se puede eliminar la familia porque tiene productos asociados.');
            }

            $familia->delete();
            return redirect()->route('familias.index')->with('success', 'Familia eliminada correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('familias.index')->with('error', 'No se puede eliminar la familia porque tiene productos asociados.');
            }
            return redirect()->route('familias.index')->with('error', 'Error al eliminar la familia: ' . $e->getMessage());
        }
    }
}
