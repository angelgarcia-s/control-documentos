<?php

namespace App\Http\Controllers;

use App\Models\Barniz;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class BarnicesController extends Controller
{
    public function index()
    {
        return view('barnices.index');
    }

    public function create()
    {
        return view('barnices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:barnices,nombre',
        ]);

        try {
            Barniz::create($validated);
            return redirect()->route('barnices.index')->with('success', 'Barniz creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el barniz: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(Barniz $barniz)
    {
        return view('barnices.show', compact('barniz'));
    }

    public function edit(Barniz $barniz)
    {
        return view('barnices.edit', compact('barniz'));
    }

    public function update(Request $request, Barniz $barniz)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:barnices,nombre,' . $barniz->id,
        ]);

        try {
            $barniz->update($validated);
            return redirect()->route('barnices.index')->with('success', 'Barniz actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el barniz: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Barniz $barniz)
    {
        try {
            $barniz->delete();
            return redirect()->route('barnices.index')->with('success', 'Barniz eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('barnices.index')->with('error', 'Error al eliminar el barniz: ' . $e->getMessage());
        }
    }
}