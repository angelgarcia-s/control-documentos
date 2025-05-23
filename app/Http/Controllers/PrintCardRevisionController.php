<?php

namespace App\Http\Controllers;

use App\Models\PrintCardRevision;
use App\Models\PrintCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PrintCardRevisionController extends Controller
{
    public function index()
    {
        return view('print-card-revisiones.index');
    }

    public function create(PrintCard $printCard)
    {
        // Sugerir número de revisión: 0 si no existe, si existe 0, sugerir el siguiente disponible
        $revisiones = $printCard->revisiones()->pluck('revision')->toArray();
        if (!in_array(0, $revisiones)) {
            $revisionSugerida = 0;
        } else {
            $revisionSugerida = empty($revisiones) ? 0 : (max($revisiones) + 1);
        }
        return view('print-card-revisiones.create', compact('printCard', 'revisionSugerida'));
    }

    public function store(Request $request, PrintCard $printCard)
    {
        $request->validate([
            'revision' => 'required|integer|min:0',
            'estado' => 'required|in:En revisión,Aprobado,Rechazado',
            'notas' => 'nullable|string',
            'pdf_path' => 'required|file|mimes:pdf|max:10240',
            'historial_revision' => 'nullable|string',
        ]);

        // Validar que no exista otra revisión con el mismo número para este PrintCard
        if ($printCard->revisiones()->where('revision', $request->revision)->exists()) {
            return redirect()->back()
                ->withErrors(['revision' => 'Ya existe una revisión con ese número para este PrintCard.'])
                ->withInput();
        }

        $pdf_path = null;
        if ($request->hasFile('pdf_path')) {
            // Obtener datos para la ruta
            $producto = $printCard->productoCodigoBarra->producto;
            $familia = $producto->familia->nombre ?? 'SinFamilia';
            $categoria = $producto->familia->categoria->nombre ?? 'SinCategoria';
            // Limpiar nombres para evitar espacios y caracteres problemáticos
            $nombreCorto = preg_replace('/[^A-Za-z0-9_-]/', '', str_replace(' ', '_', strtolower($producto->nombre_corto ?? 'SinNombreCorto')));
            $nombrePrintCard = preg_replace('/[^A-Za-z0-9_-]/', '', str_replace(' ', '_', strtolower($printCard->nombre)));
            $revisionNum = $request->revision;
            $nombreArchivo = $nombreCorto . '-' . $nombrePrintCard . '-' . $revisionNum . '.pdf';
            $ruta = 'PrintCards/' . $categoria . '/' . $familia;
            $pdf_path = $request->file('pdf_path')->storeAs($ruta, $nombreArchivo, 'public');
        }

        $revision = PrintCardRevision::create([
            'print_card_id' => $printCard->id,
            'revision' => $request->revision,
            'estado' => $request->estado,
            'notas' => $request->notas,
            'revisado_por' => Auth::id(),
            'fecha_revision' => Carbon::now(),
            'pdf_path' => $pdf_path,
            'historial_revision' => $request->historial_revision,
        ]);

        return redirect()->route('print-cards.show', $printCard)
            ->with('success', 'Revisión creada correctamente.');
    }

    public function show(PrintCardRevision $printCardRevision)
    {
        return view('print-card-revisiones.show', compact('printCardRevision'));
    }

    public function edit(PrintCardRevision $printCardRevision)
    {
        return view('print-card-revisiones.edit', compact('printCardRevision'));
    }

    public function update(Request $request, PrintCardRevision $printCardRevision)
    {
        $request->validate([
            'revision' => 'required|integer|min:0',
            'estado' => 'required|in:En revisión,Aprobado,Rechazado',
            'notas' => 'nullable|string',
            'pdf_path' => 'nullable|file|mimes:pdf|max:10240',
            'historial_revision' => 'nullable|string',
        ]);

        // Validar que no exista otra revisión con el mismo número para este PrintCard, excepto la actual
        if ($printCardRevision->printCard->revisiones()->where('revision', $request->revision)->where('id', '!=', $printCardRevision->id)->exists()) {
            return redirect()->back()
                ->withErrors(['revision' => 'Ya existe una revisión con ese número para este PrintCard.'])
                ->withInput();
        }

        $data = [
            'revision' => $request->revision,
            'estado' => $request->estado,
            'notas' => $request->notas,
            'historial_revision' => $request->historial_revision,
            'revisado_por' => Auth::id(),
            'fecha_revision' => Carbon::now(),
        ];

        // Actualizar el PDF si se proporciona uno nuevo
        if ($request->hasFile('pdf_path')) {
            // Eliminar el PDF antiguo si existe
            if ($printCardRevision->pdf_path) {
                Storage::disk('public')->delete($printCardRevision->pdf_path);
            }

            // Obtener datos para la ruta
            $producto = $printCardRevision->printCard->productoCodigoBarra->producto;
            $familia = $producto->familia->nombre ?? 'SinFamilia';
            $categoria = $producto->familia->categoria->nombre ?? 'SinCategoria';
            $nombreCorto = preg_replace('/[^A-Za-z0-9_-]/', '', str_replace(' ', '_', strtolower($producto->nombre_corto ?? 'SinNombreCorto')));
            $nombrePrintCard = preg_replace('/[^A-Za-z0-9_-]/', '', str_replace(' ', '_', strtolower($printCardRevision->printCard->nombre)));
            $revisionNum = $request->revision;
            $nombreArchivo = $nombreCorto . '-' . $nombrePrintCard . '-' . $revisionNum . '.pdf';
            $ruta = 'PrintCards/' . $categoria . '/' . $familia;
            $data['pdf_path'] = $request->file('pdf_path')->storeAs($ruta, $nombreArchivo, 'public');
        }

        $printCardRevision->update($data);

        return redirect()->route('print-cards.show', $printCardRevision->printCard)
            ->with('success', 'Revisión actualizada correctamente.');
    }

    public function destroy(PrintCardRevision $printCardRevision)
    {
        $printCard = $printCardRevision->printCard;

        // Eliminar el archivo PDF si existe
        if ($printCardRevision->pdf_path) {
            Storage::disk('public')->delete($printCardRevision->pdf_path);
        }

        $printCardRevision->delete();

        return redirect()->route('print-cards.show', $printCard)
            ->with('success', 'Revisión eliminada correctamente.');
    }
}
