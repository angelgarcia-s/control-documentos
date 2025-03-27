<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ColoresController extends Controller
{
    public function index()
    {
        return view('colores.index');
    }

    public function create()
    {
        return view('colores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:colores,nombre',
        ]);

        try {
            Color::create($validated);
            return redirect()->route('colores.index')->with('success', 'Color creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el color: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Color $color)
    {
        $color->load('productos');
        return view('colores.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('colores.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:colores,nombre,' . $color->id,
        ]);

        try {
            $color->update($validated);
            return redirect()->route('colores.index')->with('success', 'Color actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el color: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Color $color)
    {
        try {
            if ($color->productos()->count() > 0) {
                return redirect()->route('colores.index')->with('error', 'No se puede eliminar el color porque tiene productos asociados.');
            }

            $color->delete();
            return redirect()->route('colores.index')->with('success', 'Color eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('colores.index')->with('error', 'No se puede eliminar el color porque tiene productos asociados.');
            }
            return redirect()->route('colores.index')->with('error', 'Error al eliminar el color: ' . $e->getMessage());
        }
    }
}