<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoriasController extends Controller
{
    public function index()
    {
        return view('categorias.index');
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
        ]);

        try {
            Categoria::create($validated);
            return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la categoría: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Categoria $categoria)
    {
        $categoria->load('productos');
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoria->id,
        ]);

        try {
            $categoria->update($validated);
            return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la categoría: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Categoria $categoria)
    {
        try {
            if ($categoria->productos()->count() > 0) {
                return redirect()->route('categorias.index')->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
            }

            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('categorias.index')->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
            }
            return redirect()->route('categorias.index')->with('error', 'Error al eliminar la categoría: ' . $e->getMessage());
        }
    }
}