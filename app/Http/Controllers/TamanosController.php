<?php

namespace App\Http\Controllers;

use App\Models\Tamano;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TamanosController extends Controller
{
    public function index()
    {
        return view('tamanos.index');
    }

    public function create()
    {
        return view('tamanos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:tamanos,nombre',
        ]);

        try {
            Tamano::create($validated);
            return redirect()->route('tamanos.index')->with('success', 'Tamaño creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el tamaño: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Tamano $tamano)
    {
        $tamano->load('productos');
        return view('tamanos.show', compact('tamano'));
    }

    public function edit(Tamano $tamano)
    {
        return view('tamanos.edit', compact('tamano'));
    }

    public function update(Request $request, Tamano $tamano)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:tamanos,nombre,' . $tamano->id,
        ]);

        try {
            $tamano->update($validated);
            return redirect()->route('tamanos.index')->with('success', 'Tamaño actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el tamaño: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Tamano $tamano)
    {
        try {
            if ($tamano->productos()->count() > 0) {
                return redirect()->route('tamanos.index')->with('error', 'No se puede eliminar el tamaño porque tiene productos asociados.');
            }

            $tamano->delete();
            return redirect()->route('tamanos.index')->with('success', 'Tamaño eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('tamanos.index')->with('error', 'No se puede eliminar el tamaño porque tiene productos asociados.');
            }
            return redirect()->route('tamanos.index')->with('error', 'Error al eliminar el tamaño: ' . $e->getMessage());
        }
    }
}