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
        return view('print-card-revisiones.create', compact('printCard'));
    }

    public function store(Request $request, PrintCard $printCard)
    {
        $request->validate([
            'revision' => 'required|integer|min:1',
            'estado' => 'required|in:En revisión,Aprobado,Rechazado',
            'notas' => 'nullable|string',
            'pdf_path' => 'required|file|mimes:pdf|max:10240',
            'historial_revision' => 'nullable|string',
        ]);

        $pdf_path = null;
        if ($request->hasFile('pdf_path')) {
            $pdf_path = $request->file('pdf_path')->store('print-card-revisions', 'public');
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
            'revision' => 'required|integer|min:1',
            'estado' => 'required|in:En revisión,Aprobado,Rechazado',
            'notas' => 'nullable|string',
            'pdf_path' => 'nullable|file|mimes:pdf|max:10240',
            'historial_revision' => 'nullable|string',
        ]);

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

            // Almacenar el nuevo PDF
            $data['pdf_path'] = $request->file('pdf_path')->store('print-card-revisions', 'public');
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
