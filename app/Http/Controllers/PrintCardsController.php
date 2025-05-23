<?php

namespace App\Http\Controllers;

use App\Models\PrintCard;
use App\Models\ProductoCodigosBarras;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;

class PrintCardsController extends Controller
{
    public function index()
    {
        $printCards = PrintCard::with(['productoCodigoBarra', 'proveedor', 'creador'])->paginate(15);
        return view('print-cards.index', compact('printCards'));
    }

    public function create()
    {
        $productosCodigosBarras = ProductoCodigosBarras::with('producto')->get();
        $proveedores = Proveedor::all();
        // Obtener todas las clasificaciones de envase únicas disponibles
        $clasificacionesEnvase = ProductoCodigosBarras::select('clasificacion_envase')->distinct()->pluck('clasificacion_envase');
        return view('print-cards.create', compact('productosCodigosBarras', 'proveedores', 'clasificacionesEnvase'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_codigo_barra_id' => 'required|exists:producto_codigos_barras,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'nombre' => 'required|string|max:255|unique:print_cards,nombre,NULL,id,producto_codigo_barra_id,' . $request->producto_codigo_barra_id,
            'notas' => 'nullable|string',
            'registro_sanitario' => 'nullable|string|max:255',
            'fecha' => 'nullable|date',
        ]);
        try {
            $validated['created_by'] = auth()->id();
            PrintCard::create($validated);
            return redirect()->route('print-cards.index')->with('success', 'PrintCard creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el PrintCard: ' . $e->getMessage()])->withInput();
        }
    }

    public function show(PrintCard $printCard)
    {
        $printCard->load(['productoCodigoBarra', 'proveedor', 'creador']);
        return view('print-cards.show', compact('printCard'));
    }

    public function edit(PrintCard $printCard)
    {
        $productosCodigosBarras = ProductoCodigosBarras::all();
        $proveedores = Proveedor::all();
        return view('print-cards.edit', compact('printCard', 'productosCodigosBarras', 'proveedores'));
    }

    public function update(Request $request, PrintCard $printCard)
    {
        $validated = $request->validate([
            'producto_codigo_barra_id' => 'required|exists:producto_codigos_barras,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'nombre' => 'required|string|max:255|unique:print_cards,nombre,' . $printCard->id . ',id,producto_codigo_barra_id,' . $request->producto_codigo_barra_id,
            'notas' => 'nullable|string',
            'registro_sanitario' => 'nullable|string|max:255',
            'fecha' => 'nullable|date',
        ]);
        try {
            $printCard->update($validated);
            return redirect()->route('print-cards.index')->with('success', 'PrintCard actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el PrintCard: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(PrintCard $printCard)
    {
        try {
            $printCard->delete();
            return redirect()->route('print-cards.index')->with('success', 'PrintCard eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('print-cards.index')->with('error', 'Error al eliminar el PrintCard: ' . $e->getMessage());
        }
    }

    public function printCardsPorCodigoBarra($productoCodigoBarraId)
    {
        $productoCodigoBarra = ProductoCodigosBarras::with(['producto', 'codigoBarra', 'printcards.proveedor', 'printcards.creador', 'printcards.revisiones'])->findOrFail($productoCodigoBarraId);
        $printCards = $productoCodigoBarra->printcards;
        return view('print-cards.por-codigo-barra', compact('productoCodigoBarra', 'printCards'));
    }
}
