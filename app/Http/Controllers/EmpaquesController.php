<?php

namespace App\Http\Controllers;

use App\Models\Empaque;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EmpaquesController extends Controller
{
    public function index()
    {
        return view('empaques.index');
    }

    public function create()
    {
        return view('empaques.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:empaques,nombre',
        ]);

        try {
            Empaque::create($validated);
            return redirect()->route('empaques.index')->with('success', 'Empaque creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el empaque: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Empaque $empaque)
    {
        return view('empaques.show', compact('empaque'));
    }

    public function edit(Empaque $empaque)
    {
        return view('empaques.edit', compact('empaque'));
    }

    public function update(Request $request, Empaque $empaque)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:empaques,nombre,' . $empaque->id,
        ]);

        try {
            $empaque->update($validated);
            return redirect()->route('empaques.index')->with('success', 'Empaque actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el empaque: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Empaque $empaque)
    {
        try {
            $empaque->delete();
            return redirect()->route('empaques.index')->with('success', 'Empaque eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('empaques.index')->with('error', 'No se puede eliminar el empaque porque está en uso.');
            }
            return redirect()->route('empaques.index')->with('error', 'Error al eliminar el empaque: ' . $e->getMessage());
        }
    }
}