<?php

namespace App\Http\Controllers;

use App\Models\Acabado;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AcabadosController extends Controller
{
    public function index()
    {
        return view('acabados.index');
    }

    public function create()
    {
        return view('acabados.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:acabados,nombre',
        ]);

        try {
            Acabado::create($validated);
            return redirect()->route('acabados.index')->with('success', 'Acabado creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el acabado: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Acabado $acabado)
    {
        return view('acabados.show', compact('acabado'));
    }

    public function edit(Acabado $acabado)
    {
        return view('acabados.edit', compact('acabado'));
    }

    public function update(Request $request, Acabado $acabado)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:acabados,nombre,' . $acabado->id,
        ]);

        try {
            $acabado->update($validated);
            return redirect()->route('acabados.index')->with('success', 'Acabado actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el acabado: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Acabado $acabado)
    {
        try {
            $acabado->delete();
            return redirect()->route('acabados.index')->with('success', 'Acabado eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('acabados.index')->with('error', 'Error al eliminar el acabado: ' . $e->getMessage());
        }
    }
}