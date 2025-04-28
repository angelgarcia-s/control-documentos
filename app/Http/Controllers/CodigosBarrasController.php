<?php

namespace App\Http\Controllers;

use App\Models\CodigoBarra;
use App\Models\TipoEmpaque;
use App\Models\Empaque;
use App\Models\Color;
use App\Models\Tamano;
use Illuminate\Http\Request;

class CodigosBarrasController extends Controller
{
    public function index()
    {
        return view('codigos-barras.index');
    }

    public function create()
    {
        return view('codigos-barras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigos' => 'required|array',
            'codigos.*.tipo' => 'required|in:EAN13,ITF14',
            'codigos.*.codigo' => 'required|string|max:50|unique:codigos_barras,codigo',
            'codigos.*.consecutivo_codigo' => 'required|string|size:3',
            'codigos.*.nombre' => 'required|string|max:255',
            'codigos.*.tipo_empaque' => 'required|string|max:50|exists:tipos_empaque,nombre',
            'codigos.*.empaque' => 'required|string|max:50|exists:empaques,nombre',
            'codigos.*.contenido' => 'required|string|max:255',
            'codigos.*.color_id' => 'nullable|exists:colores,id',
            'codigos.*.tamano_id' => 'nullable|exists:tamanos,id',
        ]);

        // Las validaciones de longitud y duplicados ya se manejan en CrearCodigosBarras
        foreach ($validated['codigos'] as $codigoData) {
            // Generar nombre_corto
            $color = $codigoData['color_id'] ? Color::find($codigoData['color_id'])->nombre : '';
            $tamano = $codigoData['tamano_id'] ? Tamano::find($codigoData['tamano_id'])->nombre : '';
            $nombreCorto = trim(implode(' ', array_filter([$codigoData['nombre'], $color, $tamano])));

            CodigoBarra::create([
                'tipo' => $codigoData['tipo'],
                'codigo' => $codigoData['codigo'],
                'consecutivo_codigo' => $codigoData['consecutivo_codigo'],
                'nombre' => $codigoData['nombre'],
                'tipo_empaque' => $codigoData['tipo_empaque'],
                'empaque' => $codigoData['empaque'],
                'contenido' => $codigoData['contenido'],
                'color_id' => $codigoData['color_id'],
                'tamano_id' => $codigoData['tamano_id'],
                'nombre_corto' => $nombreCorto,
            ]);
        }

        return redirect()->route('codigos-barras.index')->with('success', 'Códigos de barra creados correctamente.');
    }

    public function show(CodigoBarra $codigoBarra)
    {
        $codigoBarra->load('color', 'tamano');
        return view('codigos-barras.show', compact('codigoBarra'));
    }

    public function edit(CodigoBarra $codigoBarra)
    {
        // Cargar los catálogos con ordenamiento específico
        $tiposEmpaque = TipoEmpaque::orderBy('orden', 'asc')->get();
        $empaques = Empaque::orderBy('nombre', 'asc')->get();
        $colores = Color::orderBy('nombre', 'asc')->get();
        $tamanos = Tamano::orderBy('nombre', 'asc')->get();

        return view('codigos-barras.edit', compact('codigoBarra', 'tiposEmpaque', 'empaques', 'colores', 'tamanos'));
    }

    public function update(Request $request, CodigoBarra $codigoBarra)
    {
        $validated = $request->validate([
            'tipo' => 'required|in:EAN13,ITF14',
            'codigo' => 'required|string|max:50|unique:codigos_barras,codigo,' . $codigoBarra->id,
            'nombre' => 'required|string|max:255',
            'tipo_empaque' => 'required|string|max:50|exists:tipos_empaque,nombre',
            'empaque' => 'nullable|string|max:50|exists:empaques,nombre',
            'contenido' => 'nullable|string|max:255',
            'color_id' => 'nullable|exists:colores,id',
            'tamano_id' => 'nullable|exists:tamanos,id',
        ]);

        // Validar longitud según tipo
        $longitud = strlen($validated['codigo']);
        if ($validated['tipo'] === 'EAN13' && $longitud !== 13) {
            return redirect()->back()->withErrors(['codigo' => "El código EAN13 debe tener exactamente 13 dígitos."]);
        } elseif ($validated['tipo'] === 'ITF14' && $longitud !== 14) {
            return redirect()->back()->withErrors(['codigo' => "El código ITF14 debe tener exactamente 14 dígitos."]);
        }

        // Extraer el consecutivo del código actualizado
        if ($longitud === 13) { // EAN13
            $consecutivo = substr($validated['codigo'], 9, 3);
        } elseif ($longitud === 14) { // ITF14
            $consecutivo = substr($validated['codigo'], 10, 3);
        }
        $validated['consecutivo_codigo'] = $consecutivo;

        // Generar nombre_corto
        $color = $validated['color_id'] ? Color::find($validated['color_id'])->nombre : '';
        $tamano = $validated['tamano_id'] ? Tamano::find($validated['tamano_id'])->nombre : '';
        $validated['nombre_corto'] = trim(implode(' ', array_filter([$validated['nombre'], $color, $tamano])));

        $codigoBarra->update($validated);

        return redirect()->route('codigos-barras.index')->with('success', 'Código de barras actualizado correctamente.');
    }

    public function destroy(CodigoBarra $codigoBarra)
    {
        if ($codigoBarra->productos()->exists()) {
            return redirect()->route('codigos-barras.index')->with('error', 'No se puede eliminar el código de barras porque está asignado a productos.');
        }

        $codigoBarra->delete();
        return redirect()->route('codigos-barras.index')->with('success', 'Código de barras eliminado correctamente.');
    }
}
