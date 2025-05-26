<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoPrintCard;

class EstadoPrintCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estados-print-cards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estados-print-cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:estado_print_cards,nombre',
            'color' => 'nullable|string|max:32',
            'activo' => 'required|boolean',
        ]);
        EstadoPrintCard::create($validated);
        return redirect()->route('estados-print-cards.index')->with('success', 'Estado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EstadoPrintCard $estado)
    {
        return view('estados-print-cards.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadoPrintCard $estado)
    {
        return view('estados-print-cards.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstadoPrintCard $estado)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:estado_print_cards,nombre,' . $estado->id,
            'color' => 'nullable|string|max:32',
            'activo' => 'required|boolean',
        ]);
        $estado->update($validated);
        return redirect()->route('estados-print-cards.index')->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstadoPrintCard $estado)
    {
        if ($estado->printCards()->count() > 0) {
            return redirect()->route('estados-print-cards.index')->with('error', 'No se puede eliminar el estado porque está en uso por una o más PrintCards.');
        }
        $estado->delete();
        return redirect()->route('estados-print-cards.index')->with('success', 'Estado eliminado correctamente.');
    }
}
