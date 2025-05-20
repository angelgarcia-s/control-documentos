<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProducto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FamiliasController extends Controller
{
    public function index()
    {
        return view('familias.index');
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('familias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:familia_productos,nombre',
            'id_categoria' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('imagen')) {
                $validated['imagen'] = $request->file('imagen')->store('images/familias', 'public');
            }

            FamiliaProducto::create($validated);
            return redirect()->route('familias.index')->with('success', 'Familia creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la familia: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(FamiliaProducto $familia)
    {
        return view('familias.show', compact('familia'));
    }

    public function edit(FamiliaProducto $familia)
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('familias.edit', compact('familia', 'categorias'));
    }

    public function update(Request $request, FamiliaProducto $familia)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:familia_productos,nombre,' . $familia->id,
            'id_categoria' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Lógica para eliminar la imagen si se solicita
            if ($request->input('eliminar_imagen') == '1' && $familia->imagen) {
                $deleted = Storage::disk('public')->delete($familia->imagen);
                $validated['imagen'] = null;
            }

            // Lógica para actualizar la imagen si se sube una nueva
            if ($request->hasFile('imagen')) {
                if ($familia->imagen) {
                    Storage::disk('public')->delete($familia->imagen);
                }
                $validated['imagen'] = $request->file('imagen')->store('images/familias', 'public');
            }

            $familia->update($validated);
            return redirect()->route('familias.index')->with('success', 'Familia actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la familia: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(FamiliaProducto $familia)
    {
        try {
            if ($familia->productos()->count() > 0) {
                return redirect()->route('familias.index')->with('error', 'No se puede eliminar la familia porque tiene productos asociados.');
            }

            if ($familia->imagen) {
                Storage::disk('public')->delete($familia->imagen);
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

    public function productos(FamiliaProducto $familia)
    {
        return view('familias.productos', compact('familia'));
    }
}
